        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <h1><?php echo get_title(); ?></h1>
            <p>How about that? I finally got through to my mom when she called me back in the evening. She knew about the whole club fire thing since last night and was fine-ish. I told her she should have just called.</p>
            <p>Outside our tiny family, these 3 days have been declared national mourning days. Apparently that means all events (cultural, sports) are canceled.</p>
            <p>Of course... the law was not really applied by the book. As in football matches were still played. I don't know about other stuff. I basically spent my entire Saturday in front of the TV either watching football, the rugby world cup final and sports news, sleeping or eating.</p>
            <p>The only exception was that I went to the tattoo place (salon? Parlour?). I had an appointment at 2pm that I missed because... I woke up at exactly 2. I still went and talked to the guy (I think he's called an artist, right?) and setup a new appointment for Monday at 12pm. Let's see.</p>
            <p>I don't know why, but I like seeing the calendar saying 1. As in the 1st of November. Looks pretty, I guess. They say 1 is the loneliest number but it doesn't apply in this case. 1 is the prettiest. Or maybe hopeful? I don't know. I just like knowing and seeing it.</p>
        </div>
        <?php if ( $song = get_song() ) : ?>
            <div id='overlay'>
            	<div id='video-container'>
                    <div id='video'>
                    	<?php echo $song; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
