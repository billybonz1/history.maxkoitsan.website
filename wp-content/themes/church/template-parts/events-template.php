<?php
    $date_event = get_field("date_event");
    $timestamp_start = strtotime($date_event);
?>
<div id="event-<?php the_ID(); ?>" class="event">
    <div class="img_block">
        <?php the_post_thumbnail( 'event_img' ); ?>
    </div>
    <h3 class="title"><?php the_title(); ?></h3>
    <div class="bottom_block">
        <a href="<?php the_permalink() ?>" class="btn">Узнать больше</a>
        <div class="inner_block">
            <?php

                $date_event_end = get_field("date_event_end");
                $timestamp_end = strtotime($date_event_end);
                $date = date("d/m/Y", $timestamp_start);
                if($timestamp_end > $timestamp_start) {
                    $date .= " - " . date("d/m/Y", $timestamp_end);
                }
            ?>

            <div class="date">
                <span><?php echo $date; ?></span>
            </div>
            <div class="time">
                <span><?php the_field('time_text_event',get_the_ID()); ?></span>
            </div>
        </div>
    </div>
</div>