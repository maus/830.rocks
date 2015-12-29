        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
I love this little thing I did for the wordy thingies. It's so comfortable to write. I just wish I had more uses for it. But... not a writer so no more uses. Even so. It's lovely. Had to mention it. I think of it every time I start writing.

So little time left. I'm basically just waiting to land right now. It's not that I have so much stuff to do. But it is still weird waiting for everything -- literally everything -- to change. Again. 

Different house -- I wonder what's going on there --, different people, no more visits to my parents, different pool hall, no more car, using the subway and maybe bike, completely different diet and schedule, different currency, different language, different attitudes, no more of these journaly thingies -- 'cos, you know, talking.

I can't think of a single thing that stays the same. Except maybe music and cigarettes (i.e. bad habits in general).

The biggest change is that you're gonna be close. Probably by the time you read this you'll have broken my heart the 100th time[^1]. Not matter how much I prepare for reality to hit, it's never easy. That's another constant, I guess. <a id='trigger-overlay' href='#'>Hope</a> turning into dust on a bed of confussion and good intentions.

I've already gone through these changes a lot of times and it's still a thing. Every time. 

[^1]: <em class='u-all-caps'>Update 20.11 12:45</em> &mdash; Yup. But it wasn't painful. Didn't feel like a "hearbreak". More like a confirmation. I guess I have enough practice by now. Especially since I always try expect nothing from people. So that's even more practice. And, to be honest, the hope I had for a couple of weeks after leaving had already reduced by the time we got to talk.
            <?php $text = ob_get_contents(); ?>
            <?php ob_end_clean(); ?>

            <?php echo ParsedownExtra::instance()->setBreaksEnabled(true)->text( $text ); ?>

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
