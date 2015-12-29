        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <h1><?php echo get_title(); ?></h1>
            <p>I think I am obsessed with this thingi thing. Or passionate. Very thin line. But the thing is that when I add stuff to it I am as driven as I used to be about projects a few years ago. Even though its only user knows very little about an archive page or keyboard shortcuts (try pressing V, or N, or P).</p>
            <p>Anyway, I did an upgrade. Specifically for this type of thingi that only has words in it. I used to write emails and save them as drafts. But then it seemed as kinda complicated for the user to read them. So we get a sort of journal now.</p>
            <p>Speaking of reading... I am constantly wondering why you don't reply to some emails. Maybe you don't check them after 9pm. But that's very hard to believe. Today is the second time I wanted a reply. Unfortunately I can't and I won't signal the "sensitive" emails. For more than 1 reason.</p>
            <p>Moving on.</p>
            <p>Saw an accident today. No casualties. Just 2 cars bumping each other. Except one weighed around 20 tones and the other... about 1.5. Fascinating how the big one just moved the small one like it was nothing.</p>
            <p>Finally got ink in my skin. Took a while and some determination but here we are. It's an hourglass. Because... I could. And wanted to. Maybe by the time you read this you'll have already seen it.</p>
            <p>Sleep tight, X!</p>
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
