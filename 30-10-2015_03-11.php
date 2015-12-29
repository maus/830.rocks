        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <h1><?php echo get_title(); ?></h1>
            <p>I thought tonight was gonna be different. Woke up early-ish, did some stuff, next was going to bed early.</p>
            <p>Wrooong.</p>
            <p>'Cos pool. Was fine. Lost in 8 ball, won in 9 ball. Then lost all interest. Not sure why. Maybe the whole "uncle" stuff.</p>
            <p>Now, seriously. Am I an uncle? Uncle once removed? What am I to the kid? Eh. What's the difference? Considering how often I talk to my cousin, I can only assume I'll have no part in his life. He the Liam.</p>
            <p>Weird name. A Romanian and a Belgian in Germany name their child an Irish name. Parents do the weirdest things.</p>
            <p>Having a dark mood night for some reason. Blame it on Liam.</p>
            <p>Good night, X.</p>
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
