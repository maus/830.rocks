        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
My mind becomes immediately clearer after we separate. I can draw a conclusion like: I am always in the moment with you. 

Didn't really realize it so clearly until now. I had a glimpse of it when I called you "kryptonite". Might just be bullshit or excuses, but...

1. Despite appearances, I have way less control than usual. I can't really focus while I have the impression that I can. So... the worst of both worlds. But now I know. Let's see if it helps.
2. And start being sleepy and wanting to be close to you. (I was kidding with <em>hot</em>). 
3. And I always text you almost immediately after we had a long discussion to say the very thing I wanted to say from [the beginning](#){#trigger-overlay}.

Like, today, my point was: if you love me (or whatever you want to call it), help me. So, in reverse, if you don't help me, you either don't love me, or you just can't handle it (it's been suggested that I am really difficult). 

Unfortunately helping requires sacrifice (can be something small like taking the time to make someone tea). And maybe you don't feel like it. I'm cool with it. Maybe you have better things to do. Or the percieved value is too low. Still cool with it. Does not make you a bad person. It's really, really difficult.

Also, the "you win". You just don't want to accept I love you and constantly think that if I criticize you I don't like you so, of course, no love. So I said: 

> fine. You win. Have it your way. I don't love you. You are right. I do despise you. You win that argument.

But how about you just believe me before I completely lose all my very limited patience. Plus it would make handling my too direct style way more fun. 

Back to being in the moment: yeah, it sounds like a fun concept. The problem is that I (for example) am also sending mean SMSes because I am in the moment. So... if you're me, do you really want to be a "in the moment" type of person? Is it worth the effort of learning how? Does it really make your life better? How about other people's life? 

I have no idea. 
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
