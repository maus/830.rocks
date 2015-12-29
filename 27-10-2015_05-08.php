        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <h1><?php echo get_title(); ?></h1>
            <p>So... this is not particularly fun. Another sleepless night.</p>
            <p>Around 1 I was finishing cooking a full chicken (it's a first and for a while a last). The end result was... meh.</p>
            <p>I would send you a photo but I don't wanna ruin your morning. For you it's probably like a horror movie.</p>
            <p>It's a dark pot with a full, medium-sized chicken in it, covered in lemon zest and sage, with a lemony - milky (yup, milk) - garlicky sauce around it. Needless to say, the chicken is missing some parts and all the feathers.</p>
            <p>Anyway. I then finished some work and went to bed like a good boy. And now... eyes still wide open.</p>
            <p>Now I decided to enjoying a cigarette with some Argentinian wine a friend recommended and, needless to say, a song by <a id='trigger-overlay' href='#'>Chris Malinchak</a> a different friend brought back to my attention.</p>
            <p>Maybe 'cos of the full moon. Which I can't see because of the clouds. But I know it's there. Maybe I'm more of a warewoolf than a vampire.</p>
            <p>Morgen, X!</p>
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
