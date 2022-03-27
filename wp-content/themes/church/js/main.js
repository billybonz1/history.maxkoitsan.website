$(function () {
    $el_languages = $('header .top_header .lang_block ul');

    $el_languages.hover(function () {
        $el_languages.find('li').show();
    }, function () {
        $el_languages.find('li:not(.current-lang)').hide();
    });
});

$('header .bottom_header .lang_block li.current-lang a').click(function (event) {
    event.preventDefault();
});

$('header .bottom_header .lang_block').on('click', function () {
    $('header .bottom_header .lang_block ul').toggleClass('active');
});

// menu panel
$('.burger_button').click(function () {
    $('#menu_box-panel').toggleClass('active');
    $('#side-panel').removeClass('active');
    $('body').addClass('menu-panel-overlay');
    return false;
});

$('#menu_box-close-btn').click(function () {
    $('#menu_box-panel').toggleClass('active');
    $('#side-panel').removeClass('active');
    $('body').removeClass('menu-panel-overlay');
    $('body').removeClass('side-panel-overlay');
    return false;
});

// close menu panel on any link click
$('.menu_box-panel a').click(function () {
    $('#menu_box-panel').toggleClass('active');
    $('body').removeClass('menu-panel-overlay');
});

// close menu-panel if clicked outside its area
$(document).click(function (event) {
    let $target = $(event.target);
    if (!$target.closest('.menu_box-panel').length) {
        $('.menu_box-panel, .burger_button').removeClass('active');
        $('body').removeClass('menu-panel-overlay');
    }
});

// side panel
$('.location_button, #side-close-btn').click(function () {
    $('#side-panel').toggleClass('active');
    $('#menu_box-panel').removeClass('active');
    $('body').toggleClass('side-panel-overlay');
    $('body').removeClass('menu-panel-overlay');
    return false;
});

// side panel by service`s page click
$('.choose_block a.btn').click(function () {
    $('#side-panel').toggleClass('active');
    $('#side-panel').toggleClass('service');
    $('body').toggleClass('side-panel-overlay');
    $('body').toggleClass('service');
    return false;
});

// close side panel on any link click
$('.side-panel a').click(function () {
    $('#side-panel').toggleClass('active');
    $('body').toggleClass('side-panel-overlay');
});

// close side-panel if clicked outside its area
$(document).click(function (event) {
    let $target = $(event.target);
    if (!$target.closest('.side-panel').length) {
        $('.side-panel, .burger_button').removeClass('active');
        $('body').removeClass('side-panel-overlay');
        $('.side-panel').removeClass('service');
        $('body').removeClass('service');
    }
});

// Проблема длины при ховере

$('.main_menu nav li').each(function () {
    $(this).width($(this).width() + 10);
});

if ($(window).width() < 769) {

    /*Dropdown Menu footer*/
    $('footer .inner_block').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('nav').slideToggle(300);
    });

    $('footer .inner_block').focusout(function () {
        $(this).removeClass('active');
        $(this).find('nav').slideUp(300);
    });

}

// Показать больше для моб

$("#more_1").on("click", function () {
    $('.pastors .main_content').removeClass('hideContent');
    $(this).hide();
});

$(".more").on("click", function () {
    $(this).parents().eq(1).find('.main_text').removeClass('hideContent');
    $(this).hide();
});

// Смена цвета при клике на кнопку
// Фильтр

function processAjaxData(response, urlPath){
    $(".blog_main").replaceWith(response.html);
    document.title = response.pageTitle;
    window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
}

function filter(reset = false){

    var filter = {
        terms: {},
        custom_fields: {}
    };
    $(".filter a.btn_filter.active").each(function(){
        var dataFilter = $(this).attr("data-filter").split("|");
        if(!filter.terms[dataFilter[0]]) filter.terms[dataFilter[0]] = [];
        filter.terms[dataFilter[0]].push(dataFilter[1]);
    });

    filter.custom_fields.reading_time = $("[name=reading_time]").val();

    let str = Object.entries(filter).map(([key, val]) => {
        if(typeof val === 'object'){
            val = Object.entries(val).map(([key1, val1]) => {
                if(Array.isArray(val1)) val1 = val1.join("|");
                return `${key1}:${val1}`
            }).join(';');
        }
        return `${key}=${val}`
    }).join('&');


    $(".blog_main").addClass("lds-dual-ring");
    var ajaxUrl = reset ? "/blog/" : "/blog/?" + str;
    $.ajax({
       url: ajaxUrl,
       data: {
           ajax: 1
       },
       success: function(response){
           $(".blog_main").removeClass("lds-dual-ring");
           processAjaxData({html: response, pageTitle: document.title}, ajaxUrl);
       }
    });

}


$('.filter a.btn_filter').click(function (e) {
    $(this).toggleClass('active');
    e.preventDefault();
    filter();
});

$('.filter .reset_btn').click(function () {
    $('.filter a.btn_filter').removeClass('active');
    $("[name=reading_time]").attr("value", 15);
    $(".filter .time_block .heat-slider--input output").html("15 мин");
    $(".filter .time_block .heat-slider--input").get(0).style.setProperty("--p", "15%");
    filter(true);
});

$("[name=reading_time]").on("change", function(){
    filter();
});


/* ========================================== 
scrollTop() >= 300
Should be equal the the height of the header
========================================== */

$(window).scroll(function () {
    if ($(window).scrollTop() > 1) {
        $('header').addClass('fixed-header');
        $('.location_button').click(function () {
            $('header').addClass('side_header');
        });

        $('#side-close-btn, .burger_button').click(function () {
            $('header').removeClass('side_header');
        });
    }
    else {
        $('header').removeClass('fixed-header');
    }
});

// VIDEO 2
$('.ytvideo[data-video]').one('click', function () {

    var $this = $(this);
    var width = $this.attr("width");
    var height = $this.attr("height");
    $this.html('<iframe src="https://www.youtube.com/embed/' + $this.data("video") + '?autoplay=1"></iframe>');
});


/*Dropdown Menu filter*/

if ($(window).width() < 769) {
    $('.filter_block .col').click(function () {
        $(this).toggleClass('active', 300);
    });
} else {
    $('.filter_block .col').click(function () {
        $(this).toggleClass('active');
    });
}

// filter panel by filter`s page click
$('.filter_btn, .filter-close-btn').click(function () {
    $('.filter_block').toggleClass('active');
    $('.filter_block').toggleClass('filter');
    $('body').toggleClass('filter-panel-overlay');
    return false;
});

// close filter-panel if clicked outside its area
$(document).click(function (event) {
    let $target = $(event.target);
    if (!$target.closest('.filter_block').length) {
        $('.filter_block').removeClass('active');
        $('body').removeClass('filter-panel-overlay');
        $('body').removeClass('filter');
    }
});

// Копировать в буфер

$('.giving_local_online .text_inner a').click(function () {
    event.preventDefault();
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $(".giving_local_online .text_inner i.copy").removeClass('copied');
    $(".giving_local_online .text_inner a").removeClass('copied');
    $(this).addClass('copied');
    $(this).parents().eq(0).find('i.copy').addClass('copied');
});

$(function () {
    $('.giving_local_online .text_inner a').mouseenter(function () {
        $(this).parents().eq(0).find('i.copy').addClass('hovered');
    }).mouseleave(function () {
        $(this).parents().eq(0).find('i.copy').removeClass('hovered');
    });
});

$('.giving_local_online .text_inner b a').click(function () {
    event.preventDefault();
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $(".giving_local_online .text_inner i.copy").removeClass('copied');
    $(".giving_local_online .text_inner b a").removeClass('copied');
    $(this).addClass('copied');
    $(this).parents().eq(1).find('i.copy').addClass('copied');
});

$(function () {
    $('.giving_local_online .text_inner b a').mouseenter(function () {
        $(this).parents().eq(1).find('i.copy').addClass('hovered');
    }).mouseleave(function () {
        $(this).parents().eq(1).find('i.copy').removeClass('hovered');
    });
});
// Фильтр домашних групп

// if ($(window).width() < 769) {
// $('.filter_block .wrap .col a').click(function (e) {
//     event.preventDefault();
//     $(this).toggleClass('active', 300);
// });
$('.homegroups .reset_btn, .filter-close-btn').click(function () {
    $('.filter_block .wrap .col a').removeClass('active');
});
// } else {
$('.filter_block .wrap .col a').click(function (e) {
    event.preventDefault();
    //Получаем имя и комментарий из инпутов
    var name = $(this).text(),
        html = '<li class="select">' + name + '<div class="close"><span></span><span></span></div></li>';
    //Добавляем результат к нужному блоку
    $('.filter_block .filter_selected ul').append(html);
});

$('.homegroups .reset_btn').click(function () {
    $('.filter_block .filter_selected li').remove();
});

$('.filter_block .filter_selected ul').on('click', '.select', function () {
    $(this).remove();
});
// }





