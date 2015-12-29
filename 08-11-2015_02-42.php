        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
Today I have nothing to write. We already used email and there are not that many events anyway, so... I got nothing.

I am listening to Byte.fm and it's fine. Some electronic / Saturday night / party music show. It's really nice. Thank you.

Did I tell you that -- no, I didn't -- I don't have Spotify anymore? It works for 2 weeks when I'm outside of Austria and then it kindly points out the fact that international coverage is a paid feature. 

The weird part is that I don't get any commercials while I'm in Romania. I guess there are no advertisers -- including Spotify -- who target my little country. So... out of 1 month I only get half, but it's without commercials. Which makes it almost a full month of music in Austria. Go figure.

Speaking of my little country (yeah, the conversation took a surprising turn).

I have a hard time -- as in impossible -- arguing to Romanians that not using diacritics in writing is the same as writing in a different language. For example, in Austrian, _schon_ is not the same as _schoen_ (I don't have umlauts).

And going on with the Austrian language, when you can't write _schön_ (I used Google for that one), you write _schoen_. Not the exact same, but still not a completely different word -- and more importantly "sound" -- like _schon_.

And now the topic is getting too many ramifications in my head so I'm gonna drop it because writing about it -- the irony -- does not work. 

I am curious, though, how many Austrians write _schon_ out of lazyness when they don't have German language physical keyboards. I would like to think that not many. 

I know that the way I express my opinion on the matter -- in writing or speech -- makes it look as if I have an issue with it. I don't. But I do care, to a degree. Language is the most basic building block of a nation's identity. And writing your own name as _Serban_ instead of _Șerban_ is not just lazy. It's plain dumb. 

And the fact that the font I'm using does not have Ș just adds to the irony.
            <?php $text = ob_get_contents(); ?>
            <?php ob_end_clean(); ?>

            <?php echo Parsedown::instance()->setBreaksEnabled(true)->text( $text ); ?>

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
