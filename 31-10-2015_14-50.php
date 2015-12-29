        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <p>Bună, draga mea,</p>
            <p>Last night, while I was at the Huboween (!!) party, there was a fire in a club in Bucharest. A tragedy by all accounts. 27 dead and some 180 wounded. I think it equals suicide bomber casualties.</p>
            <p>I had never heard of the place before and it wasn't my type of place. But apparently there was a chance I was there -- got an email asking if I'm alright -- so I'm trying to call my mom today to let her know I'm fine before she finds out about the whole thing.</p>
            <p>Now I am wondering who I know that could have been there.</p>
            <p>Whenever I hear about a tragedy -- doesn't matter what kind -- or some sad event I think of you. How it would feel to find out that something bad happened to you. It's a horrible feeling.</p>
            <p>Fortunately, I stay away from the news and it doesn't happen that often.</p>
            <p>Plus it goes the other way around to. As in: sometimes I imagine you being happy when something good happens to you.</p>
            <p><em class='u-all-caps'>Update 03.11 1:07</em> &mdash; You just asked me about the incident in an email a few hours ago (3 days from <time datetime="2015-10-31" title="31-10-2015">now</time>).</p>
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
