        <?php 
            if ( get_image() ) : 
                echo get_media();
            endif;
        ?>
    	<div id='text'>
            <p class='date'><?php echo get_date(); ?></p>
            <h1><?php echo get_title(); ?></h1>
            <?php ob_start(); ?>
Hi! My name is Marius and I'm an addict. \**crowd roars in surprise*\*

So&hellip; I'll feed my addiction first and come back to this message. Don't go anywhere.

<em>1 minute later</em>
Back sooner than I planned. Let me tell you about my new addiction. 

I'm addicted to cooking shows. I've been watching more and more and more over the last days. Even more than sports. I think.

The break before took place because a show I like called "Hugh's Three Good Things" wass about to finish. And I came back sooner because I didn't really have time to watch most of it and Jamies's "15 Minute Meals" is starting right after. And I love that show.

Yeah, I know that watching cooking shows makes me a cook just as much as watching football makes me Messi. But there's something that fascinates me about them. 

Plus: I finally found a purpose for my "Field Notes". Full disclosure: I also use "Pocket". So it's a combination. But writing down in the little thing is much more fun than googleing the recipe and just saving it to Pocket. Which, if you don't know, is some sort of app that lets you save stuff. Not unlike Evernote.

Now comes another break. Because again upgrade to this little thingy thing's engine. Yes, it has an engine. 

<em>5 minutes later</em>
Nope. First Jamie, then upgrade.

<em>11 minutes later</em>
Commercial break. This show is really amazing. I watched a lot of cooking shows and on this one I never saw something I don't want to cook or that's boring. Anyway. Back to the upgrade. I've got something like 2 minutes to get it going.

<em>2 minutes later</em>
Damn it. Already. Who ever said "this commercial break was too short?". Nobody. That's who. Break again.

<em>7 minutes later</em>
Again commercial break. Let's see about the upgrade. 

<em>3 minutes later</em>
I can already hear the show starting&hellip;. But I did manage to include some library that will make it easier for me to write this little wordy thingies. 

<em> 2 minutes later</em>
Gotta go. See this screen again in about 10.

<em>No idea how much later</em>
So&hellip; let's test the little thing that has Markdown in it and stuff. 
Did not work. Huh. I love this part. 
Oh, wow. That was surprisingly fast to get going. Love it. 

I know you have no idea what I'm talking about but trust me. It makes a difference.

Now let's see about that minestrone Jamie's talking about. 

<em>10 minutes later</em>
That was the last break. Enough schizofrenia.

As fate would have it, after I just wrote that all recipes on the show are perfect&hellip; I don't buy the last one. 

Yes, if a recipe says 15 minutes, it takes a normal person 30. But this one was ridiculous. 8 vegetables? Plus chicken? Plus salsa verde (which went into my little notebook)? A bit much. 

So what's the point of all this passive / vicarious cooking? I don't really know. I do imagine scenarios but probably all that's gonna be left is ink on paper. And "2 cups of water to a cup of cous-cous". 

And&hellip; tomorrow I have a lupper (brunch on the other side of the noon) with my parents. And we (me and mom) are gonna cook the food while my father has something to do at his job. Really curious. Never been done before. 

Plus I get a bit nervous in other people's kitchens. They never have the right stuff.

The notable exception is your kitchen. \**crown roars again in surprise*\*
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
