        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
Had a conversation today about... you know, general stuff like Colectiv and conspiracy theory. Pretty standard stuff. And then Russia, Syria, Moldova and Austria (kind of. Mostly a certain Romanian in Austria who will be going to jail for life) were mentioned.

Not a lot of stuff seems to be right in the world right now, does it? There's

* the ISIS caliphate situation going on for a year already and the refugees exodus is still strong, but less news-worthy,
* Russia was supporting Iraq already but now they might consider going to war after the airplane crash (whatever it was is less important than the spin that's put on it, see WMDs as reason for the USA to go into Iraq) after
* Russia went to war with Ukraine and occupied a part of it (granted, it was inhabited by historically Russian population) which seems kinda Middle Agey,
* Moldova's political and economical situations are in shambles, 
* Romania has no government (plus other smaller side effects) after... a fire in a club,
* and Greece is bankrupt.
* <em class='u-all-caps'>Update 14.11 16:21</em> &mdash; and now Paris which feels really close to home. 

That's all sorta new stuff. Blood diamonds and tyrants are still in Africa, the Middle East is still a powder keg, cyber-terrorism is still a huge threat (far from having reached its full potential) and tax evasion is still one the biggest money suckers in the world.

For the first time during the refugee crisis I started wondering if we're getting closer to a climax. I always trusted that there's too much to be lost for an equilibrium not to be reached. 

Like during the -- recent -- Crimeean war I was pretty sure that there was no reason for people in northern Romania to get scared. It was about gas and I was pretty sure it won't spread. 

There always was a state of crisis. Palestine was never a state and Israel was never aknowledged by Pakistan. That's the way it goes. 

But somehow now I have the feeling the state of crisis is amplifying. Plus... there's a point where things just get out of hand. A bunch of conflicts can be held under control but how many is too many?

It could be just a matter of proximity. All the items in the list before directly affect countries I live in and the Greek situation is not that much of a situation.

Stupid little worthless world.
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
