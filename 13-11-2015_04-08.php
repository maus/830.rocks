        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
I started thinging for a while now that maybe I should have a journal. I remember you advising me that at some point. Also remembering you panicking when I touched a notebook of yours. I don't know what was weirder: that you thought I would open (not in secondary school anymore) it or that you thought I can read it (in German). Either way, kinda funny. 

Back on track. Journal. That would be completely private, of course. Or just anonymous. I remember making a very weak attempt a few years back. I don't think I wrote more than once. 

The difference is that in this setting right here it's like I am talking to you directly. I'm still not sure yet if I'll ever share these thingies with you. Probably yes. But even if not, it still feels as if I'm addressing you.

Of course, I could still do that no matter where I write. I could even address an imaginary friend. Nothing wrong with that, right? Doesn't even have to be an imaginary friend. Can be an imaginary stranger. Or an imaginary cat that can read English and also understand. For all we know, cats might actually be capable of that. They wouldn't let it show because... well, we all know how sneaky they are. 

The (full, crappy) image is of the river Dâmbovița at night (this night), facing Piața Unirii. Hence the lights. The unpleasant yellow hues are quite accurate. It all looked kinda yellow even live.

I realized I didn't really see the city during day time. Except from behind the wheel or outside my window. But you can barely call that "the city". Maybe next time.

I'll just have to wait and see. 

Enjoy your Friday the 13th, X!
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
