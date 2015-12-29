        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <h1><?php echo get_title(); ?></h1>
            <p>I think I am playing pool for nothing. I do like it but... I am not getting better. I play the same again and again.</p>
            <p>It makes sense since I'm not actually training. But I have to wonder if I couldn't do it at a different level, though.</p>
            <p>I played against this guy today and... yeah. He's better. But I could have won a couple of times if I didn't miss like a beginner. And I usually realize after the shot that I didn't care about it. Which, again, makes me wonder: then why do I play? If I can't play my best, what's the purpose?</p>
            <p>Now I am listening to <a id='trigger-overlay' href='#'>"Stay Alive"</a> and there's a pretty "fool" moon in the sky.</p>
            <p>I really don't know what it is about the moon that makes it so attractive. Or poetic. I just feel good looking at it. It does not matter how "fool" or empty it is. Just seeing it gives me a nice feeling.</p>
            <p>If I had to guess, I'd say I feel closer to you.</p>
            <p>Hope I can get to sleep tonight.</p>
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
