        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
No internet here. Around me some people are eating, others reading. I'll just write. Mainly 'cos writing another one of these has been on my mind for a while now and somehow I couldn't find the time.

The thing is that I didn't really feel like writing for a while. Nothing to say. I am curious if it'll stay like that. 

Speaking of, I am dissapointed that you didn't ask to read these thingies. There's a chance you found them by yourself but then maybe you'd mention something. There's another chance that you visited the homepage, didn't see anything and thought I am the only one with access to them. But practice tells me you just didn't care enough.

Not easy figuring out when you care about something. There's either a lot of reading between the lines or a lot of discussion until you say something. I guess that's your thing. 

I do get it. One of the first things you learned about me was the fact that I care about nothing[^1]. It's safer. And later -- I think -- that I either expect the worst or nothing. Except when I don't. And then... I end up [like this](#){#trigger-overlay}.

I think this marks the end of another chapter. #1 was the images, then came the words with a couple images in between. So this would be chapter #2 (if I counted the "wake up to reality" situations, it would probably be chapter 3).

And now, just like after [last chapter](angry_03-11-2014), I am[^2] angry[^3]. And no, I am not cool about it.

I am so sick of being angry and disappointed and continuously having the same thing of my mind all the time and sharing this stuff. There appears to be an easy solution, impossible to implement. I guess I'll always <marks class='u-censor'>be yours and just hide it</marks>.

[^1]: Not true then or now. I wish it were. What's true is that I care about very little. You just did what you do and took what I said literally. That habit generated a lot of our conversations.
[^2]: Despite all my efforts. 
[^3]: Don't take it to literally. 
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
