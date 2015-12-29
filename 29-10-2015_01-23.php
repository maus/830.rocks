        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <h1><?php echo get_title(); ?></h1>
            <p>Nice subject. I was a few seconds away from a geometric progression subject. I like this one better.</p>
            <p>Is it obvious I have nothing to say? Probably 'cos I spent the whole day at home. Only short run for coffee with my mom and buying the daily dose of cigarettes and bread.</p>
            <p>I think I discovered how to make time move really slow. Days are not flying by now. Because every day I look at may finger nails -- multiple times -- to see if they grew. It's so slow... 3 weeks in now. I think.</p>
            <p>A by-product of the whole thing is that I make most stuff bitter. Since I have to touch the food I prepare with my hands, bitterness gets in. You'd probably love it.</p>
            <p>To not let a day go by without mentioning the soundtrack, today it's a playlist from Netsky's BBC Essential Mix. Probably the only playlist I have saved in Spotify. The song right now is Zero 7 - In the Waiting Line. I think there's some irony hidden there but I can't really put my finger on it.</p>
            <p>Good night, X!</p>
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
