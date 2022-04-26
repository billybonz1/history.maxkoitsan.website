const calendarJsonLifetime = 60000;


const monthLis = document.querySelector("#calendar .months");


// current month
let now = new Date();
const year = now.getFullYear()
const currentDay = now.getDate()
const currentMonth = now.getMonth()
let monthStartDay = new Date(year, currentMonth, 1).getDay()
// current month

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}


$(function () {
    const viewEvent = $(".viewEvent")
    $(".viewEvent .close").on('click', function (e) {
        viewEvent.hide()
    })
    const montH = $("#calendar > .month")
    const days = montH.find(">ul.days")
    const monthsWidth = monthLis.offsetWidth


    // build initial (current) month
    handleCalendarJson(function () {
        constructMonth(currentMonth, monthStartDay, currentDay)
        positionActiveMonth()
    })



    function constructYear(year) {
        let cDay = currentDay;
        console.log(currentMonth)
        days.empty()

        let i = 0;
        while (i < 12) {
            let startDay = new Date(year, i, 1).getDay()
            let monthName = new Date(year, i).toLocaleString('ru', { month: 'long' })
            constructMonth(i, startDay, cDay, true, monthName, i, currentMonth)
            i++

        }
        montH.hide()
        viewEvent.hide()
        $("#calendar").addClass('twelve')
        $(".monthName").on('click', function () {
            $("#calendar .months > li").eq($(this).data('i')).trigger('click')
        })
    }

    function constructMonth(month, startDay, cDay, twelveMonths, mName, i12, cm) {
        const calData = JSON.parse(localStorage.getItem('calendarJson'));


        startDay == 0 ? startDay = 7 : startDay = startDay

        if (monthLis.querySelector("li.active")) {
            monthLis.querySelector("li.active").classList.remove('active')
        }
        if (!i12) monthLis.querySelectorAll("li")[month].classList.add('active')

        const numberOfDays = daysInMonth(month, year);
        const numberOfCells = numberOfDays + startDay;
        let fragment = document.createDocumentFragment()
        let cellStoAdd = 35 - numberOfCells;
        if (numberOfCells > 36) {
            cellStoAdd = 42 - numberOfCells;
        }
        cellStoAdd++


        if (startDay > 1) {
            while (startDay > 1) {
                let li = document.createElement('li')
                fragment.append(li)
                startDay--
            }
        }

        for (let i = 1; i < numberOfDays + 1; i++) {
            let li = document.createElement('li')
            let dayName = new Date(year, month, i).toLocaleString('en', { weekday: 'long' })
            li.classList.add(dayName)
            li.setAttribute('data-date', i)
            if (!cm) {

                if (cDay && i == cDay) li.classList.add('current')
            } else {
                if (month == cm) {
                    if (cDay && i == cDay) li.classList.add('current')
                }
            }

            let spanNum = document.createElement('span')
            spanNum.classList.add('dateNum')
            spanNum.textContent = i

            li.append(spanNum)
            fragment.append(li)

        }
        if (cellStoAdd) {
            while (cellStoAdd) {
                let li = document.createElement('li')
                fragment.append(li)
                cellStoAdd--
            }
        }
        Object.entries(calData.events[year]).forEach(function ([k, v], i) {
            if (i == month) {
                Object.entries(v).forEach(([k, v]) => {

                    let eventsContainer = document.createElement('div')
                    eventsContainer.classList.add('eventsContainer')
                    let many = Object.entries(v).length - 1;
                    Object.entries(v).forEach(function ([k2, v], i) {
                        if (v.span) {

                            let vlength = v.span.length;
                            let ii = 0
                            while (vlength > ii) {
                                let ec = document.createElement('div')
                                ec.classList.add('eventsContainer')
                                repeatable(v.span[ii], v, ec, ii, vlength)
                                ii++
                            }
                        } else {

                            repeatable(k, v, eventsContainer)
                        }

                        function repeatable(kd, v, ec, multi, max) {
                            let image = document.createElement('img')
                            image.src = v.image
                            // if (multi) multi = multi - 1
                            let spanName = document.createElement('span')
                            spanName.classList.add('dateEvent')

                            spanName.textContent = v.name
                            ec.append(spanName)
                            let empty = 'nc';
                            if (multi && multi >= 1) {
                                empty = 'crop'
                                spanName.textContent = '...'
                            } else if (multi === 0) {
                                empty = 'preCrop'
                            }
                            if (multi && max - 1 == multi) {
                                empty = 'afterCrop'
                                spanName.textContent = '...'
                            }
                            fragment.querySelector("[data-date='" + kd + "']").classList.add('event', empty)
                            fragment.querySelector("[data-date='" + kd + "']").append(ec)


                            fragment.querySelector("[data-date='" + kd + "']").addEventListener('click', efunction)

                        }

                        function efunction() {
                            card(v)

                        }
                    })
                })
            }
        })
        if (twelveMonths) {
            montH.clone().appendTo("#twelve");
            $("#twelve > .month").eq(i12).find(".days").append(fragment)
            $("#twelve > .month").eq(i12).find(".monthName").text(mName).attr('data-i', i12).show()


        } else {
            days.append(fragment)
            $("#calendar").removeClass('twelve')
        }

        $("#calendar .days > li.event").each(function (e) {
            $(this).on('click', function (e) {
                viewEvent.show()
            });
            let date = $(this).attr('data-date')
            let ec = $(this).find(".eventsContainer >.dateEvent")
            if (ec.length < 2 && !twelveMonths && !$(this).find(".eventsContainer").is(':visible')) {
                $(this).on('click', function (e) {
                    viewEvent.show()
                });
            } else if (!twelveMonths && $(this).find(".eventsContainer").is(':visible')) {
                ec.each(function (u) {
                    $(this).on('click', function (e) {
                        handleCalendarJson(function () {
                            Object.entries(calData.events[year]).forEach(function ([k, v], i) {
                                if (i == month) {
                                    Object.entries(v).forEach(([k, v], uu) => {
                                        if (k == date) {
                                            console.log(v);
                                            card(v[u])
                                            viewEvent.show()
                                        }
                                    })
                                }

                            })

                        })
                    })
                })
            } else {
                $(this).on('click', function (e) {
                    viewEvent.show()
                });
            }

        })

        viewEvent.hide()
    }

    $("#calendar .months > li").on('click', function (e) {
        $("#calendar > .month .days").empty()
        $("#twelve").empty()
        let cDay = false
        if ($(this).index() == currentMonth) {
            cDay = currentDay
        }
        if ($("#calendar").hasClass('twelve')) {
            $(".monthOrYear li").each(function () {
                $(this).toggleClass('active')
            })
        }
        constructMonth($(this).index(), new Date(year, $(this).index(), 1).getDay(), cDay)
        $("#calendar > .month ").show()
        positionActiveMonth()
    })
    $("#calendar .monthOrYear > li").on('click', function (e) {
        if (!$(this).hasClass('active')) {
            const change = $(this).data().change;
            if (change == 'year') {
                constructYear(2022)
            } else {
                constructMonth(currentMonth, monthStartDay, currentDay)
                $("#twelve").empty();
                montH.show()
                positionActiveMonth()
            }
            $(this).addClass('active')
            $(this).siblings().eq(0).removeClass('active')
        }

    });
});
var html_entity_decode = (function() {
    var cache = {},
        character,
        e = document.createElement('div');

    return function(html) {
        return html.replace(/([&][^&; ]+[;])/g, function(entity) {
            character = cache[entity];
            if (!character) {
                e.innerHTML = entity;
                if (e.childNodes[0])
                    character = cache[entity] = e.childNodes[0].nodeValue;
                else
                    character = '';
            }
            return character;
        });
    };
})();
function card(v) {
    if (v.name)
        $(".viewEvent h4").html(v.name)
    else
        $(".viewEvent h4").html("")

    if (v.description)
        $(".viewEvent .desc")[0].innerHTML = html_entity_decode(v.description)
    else
        $(".viewEvent .desc")[0].innerHTML = ""

    if (v.image)
        $(".viewEvent .image").html($("<img src='" + v.image + "' />"))
    else
        $(".viewEvent .image").html("")

    if (v.phone)
        $(".viewEvent .contacts").html(v.phone)
    else
        $(".viewEvent .contacts").html("")

    if (v.street)
        $(".viewEvent .street").html(v.street)
    else
        $(".viewEvent .street").html("")

    if (v.date)
        $(".viewEvent .date").html(v.date)
    else
        $(".viewEvent .date").html("")


    if (v.time)
        $(".viewEvent .time").html(v.time)
    else
        $(".viewEvent .time").html("")

    let insta = $(".sIcons .insta");
    let tg = $(".sIcons .tg");
    let yt = $(".sIcons .yt");
    if(v.social && v.social.instagram){
        insta.attr("href", v.social.instagram.url);
        insta.attr("target", v.social.instagram.target);
        insta.show();
    }else{
        insta.hide();
    }
    if(v.social && v.social.tel){
        tg.attr("href", v.social.tel.url);
        tg.attr("target", v.social.tel.target);
        tg.show();
    }else{
        tg.hide();
    }
    if(v.social && v.social.youtube){
        yt.attr("href", v.social.youtube.url);
        yt.attr("target", v.social.youtube.target);
        yt.show();
    }else{
        yt.hide();
    }

    if(v.url){
        $(".viewEvent .moreButton").attr("href", v.url);
        $(".viewEvent .moreButton").show();
    }else{
        $(".viewEvent .moreButton").hide();
    }
}

function positionActiveMonth() {
    let activeMonth = monthLis.querySelector(".active");
    let activeML = activeMonth.offsetLeft
    let offsetWidth = activeMonth.offsetWidth
    let clientWidth = monthLis.clientWidth
    let monthSW = monthLis.scrollWidth
    let coef = 0.5
    if (window.innerWidth > 1024) coef = 1.33
    if (window.innerWidth > 1224) coef = 1.45
    if (window.innerWidth > 1368) coef = 2
    if (window.innerWidth > 1500) coef = 2.2
    const remainingSpace = clientWidth - offsetWidth;
    const spaceLeftAndRight = remainingSpace * coef;
    monthLis.scrollLeft = activeML - spaceLeftAndRight;

    // monthLis.scrollLeft = activeML - ((clientWidth - offsetWidth) / 2)
}


function handleCalendarJson(func) {
    let now = Date.now()
    if (!localStorage.getItem('calendarJson')) {
        calendarToLocalStorage(now, func)
    } else {

        let prevDate = localStorage.getItem('calendarJsonTime')
        let difference = now - prevDate;
        if (difference > calendarJsonLifetime) {
            calendarToLocalStorage(now, func)
        } else {
            func()
        }
    }
}

function calendarToLocalStorage(now, func) {
    ajax_get('/../wp-content/themes/church/data/calendar.json', 'json', function (data) {
        for (const [year, yearObj] of Object.entries(eventsJson.events)) {
            for (const [month, monthObj] of Object.entries(yearObj)) {
                for (const [day, dayArr] of Object.entries(monthObj)) {
                    if(data.events[year][month][day]){
                        data.events[year][month][day] = data.events[year][month][day].concat(dayArr);
                    }else{
                        data.events[year][month][day] = dayArr;
                    }
                }
            }
        }
        console.log(data);
        localStorage.setItem('calendarJson', JSON.stringify(data));
        localStorage.setItem('calendarJsonTime', now);
        func()
    })
}

function ajax_get(url, type, callback) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data;
            try {
                data = JSON.parse(xmlhttp.responseText);
            } catch (err) {
                console.log(err.message + " in " + xmlhttp.responseText);
                return;
            }

            callback(data);
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}