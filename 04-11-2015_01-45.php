        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
So... the whole tragedy reaction is still strong. Talked to 1 person today and our main topic was still the fire. He also told me that there was a pretty huge protest today. Something like <del>[10 000](#fn:1){.footnote-link}</del>[^1] people. Not sure because my source cannot be trusted.

Amazing how interested people become after something that was already obvious is brought to their attention by a visible event. The fact that clubs are pretty trappy (not a word) is common knowledge. No protests before. Just became real now.

I am getting a bit sick of it, to be honest. Instead of grieving, people ar trying to get the mayor, the prime minister and the minister of internal affairs to resign.

But you know what? I hope the whole movement changes something. Reeeeally hard to believe. Stranger things have happened. Still curious how many people will go out this w/e.

Whenever I think about it, sooner or later the same thought comes to my mind:

> ## Nothing tragic can ever happen to you, my dear.

Ever. It would completely mess me up. I will tell you that first chance I get. It's somehow weird to write it in an email. Here I'll just be repeating it by the time you read.

Enough of that. I'm not bringing it up again

Let's talk about pool. Tonight was the worst one I can remember. Nothing worked. It's really strange to see it first person. To play badly for more than 2 hours.

I think it's in a sort of cycle. Right now all I have to do is wait for the slump to pass. Not by stopping to play, of course. 'Cos then it would be pretty difficult to realize it's passed.

I am kinda bored now, generally. With work, with everything. I need a distraction. Or also just wait for it to pass. Let's liven things up by doing the dishes now.

Warmest hugs and sleep tight, my lovely!

[^1]: <em class='u-all-caps'>Update 14.11 15:45</em> &mdash; 30 000, more trusty source 
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
