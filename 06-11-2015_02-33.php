        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <p>Bonsoir,</p>
            <p>I thought about the whole passion for projects thing. I can't figure it out. Let me recap.</p>
            <p>It's easy for me to blame the fact that they're not mine. But I kinda see them as mine, to a good degree. I care about the outcome just as much and I enjoy the opportunity to help grow something.</p>
            <p>I could try grow something that's mine exclusively &mdash; assuming I could find something that's really worth growing, of course. But then it would be more difficult to prevent project burn out. It's common to lose enthusiasm a few months in. How do you keep it for years?</p>
            <p>The fact that I get to interact with various fields and learn about different business&mdash; profiles (or whatever they're called) is a major plus.</p>
            <p>What's more&hellip; I don't really have that urge to create one big thing. I like fiddling more than building. I lose patience and interest pretty quickly.</p>
            <p>I do see the fact that I didn't create a start-up (successful or not) as a personal failure. A failure to fail. But I honestly don't know why that is. Because if I think about it, it's not something I want. Yeah, it would be nice if it fell into my lap and then maybe sell it for a couple million. But I don't see myself working for it. It's just not me.</p>
            <p>So yeah, coming back to the whole loss of interest. I did work during the last couple of days and I did lose track of time. But both days were spent &mdash; or lost &mdash; working on stuff that has no commercial value. It's just fun. And I did work on the YC website last week (I think). Again, no commercial value (even though I made some sort of voucher system). Again, fun.</p>
            <p>I guess I have to figure out what makes these 3 completely separate things &mdash; including the type of work they required &mdash; fun. Or figure out if "fun" is really the factor.</p>
            <p>Speaking of fun. This is a really boring topic. Every choice or ramification is so predictable. So much has already been written on it and presented and discussed that there doesn't seem to be anything personal left, whatever choice you make.</p>
            <p>I'm very tempted to delete the whole thing. But where's the fun in that?</p>
            <p>I miss you.</p>
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
