<?php
$weddingDate = new DateTime( "2024-08-30");   //Future date
$lastUpdate = new DateTime( "2024-06-08" );  //current date or any date
$diff = $lastUpdate->diff( $weddingDate )->format( "%a" );  //find difference
$daysLeft = intval( $diff );   //rounding days
?>

<header class='r-page-lead' id='toc'>
    <code>Last updated: <?= $lastUpdate->format( 'd.m.Y' ) ?> (<?= $daysLeft ?> days left)</code>
    <h1>Logistics</h1>
    <p>Getting to Bucharest, the wedding at Boho Forest, and, finally, Vama Veche.</p>
    <code>TOC: <a href='#bucharest-city-break'>The City</a> <a href='#the-big-day'>The Big Day</a> <a href='#to-the-sea'>The Seaside</a></code>
</header>
<div class='r-page-content'>
    <section id='bucharest-city-break'>   
        <header>
            <h2>Bucharest and Romania</h2>
            <code>Ref: <a href='/bucharest-city-break'>The City</a><br />
            TOC: <a href='#toc'>Back to top</a></code>
        </header>
        <div>
            <h3>Getting to Bucharest</h3>
            <h4>By plane</h4>
            <p>We entered aerial Schengen this year! So flying into the Henri Coandă (<abbr title='Otopeni'>OTP</abbr>) should be a breeze. The airport is in the city of Otopeni, about 20km from the center of Bucharest.</p> 
            <p>From the airport the easiest is by Uber/Bolt. It's very affordable, like almost all transport means in Romania.</p>
            <p>An alternative is the train from the airport to the central station (Gara de Nord), and then the subway. The train comes every 40 minutes and has a travel time of 25 minutes.</p> 
            <h4>By car</h4>
            <p>The best advice we can offer here is: follow Google Maps and don't forget to buy a "Rovinieta" (you'll need one in Hungary too). It is necessary for every road.</p>
            <h4>By train</h4>
            <p>You'll find all necessary connections into Bucharest, but expect a calm, relaxing, very long ride. Trains are sluggish in Hungary and Romania.</p>
            <p>Your terminal station would be, again, Gara de Nord, relatively in the center of Bucharest and very well connected to every side of the city, not least by our favorite trasport means: ride sharing.</p>
            <h3>Money</h3>
            <p>The Romanian currency is ROL (Romanian Leu) where 1€ will buy you approx. 5 lei.</p>
            <p>Many, if not all, places accept card, regardless of the amount and we LOVE Revolut. That said, bring some cash with you. Marius almost never has cash, if that says something.</p>
            <p>Hospitality places do not split the bill, that's another place where Revolut or cash come in handy.</p>
            <h3>Getting around town</h3>
            <p><i>Broken record alert</i>: Uber and Bolt are the best options. Ana does not recommend taxis, and if you feel like experiencing more of Bucharest, try the subway. You buy a ticket straight from the tourniquet, with a card.</p>
        </div>
    </section>
    <section id='the-big-day'>
        <header>
            <h2>Wedding Day</h2>
            <code>Ref: <a href='/the-big-day'>The Big Day</a><br />
            Date: 30.08.2024<br />
            TOC: <a href='#toc'>Back to top</a></code>
        </header>
        <div>
            <h3>Venue</h3>
            <p>Boho Forest, Strada Calea Codrului 1, Dragomirești-Deal 077096, Romania.(<a href='https://maps.app.goo.gl/mJNyoWVkdnqzQneW8'>map link</a>, <a href='https://bohoforest.ro/'>website</a>)</p>
            
            <h3>How to get there</h3>
            <p>You can get a Bolt/Uber/Taxi to and from there.</p>
            <p>If you're driving, there's plenty of parking space available.</p>

            <h3>Food and drinks</h3>
            <p>Good food will be at your fingertips all night long. Buffet style.</p>
            
            <h3>Dress code</h3>
            <p>The location is outdoors, so bring something in case you get chilly. Otherwise wear something nice, in which you feel comfortable to bust those moves.</p>
            
            <h3>Gifts</h3>
            <p>As we organise this event to share this moment with you and having a good time with our dearest friends and family, we don't expect any gifts from you. If you still want to give us something, make it rain with money!</p>
        </div>
    </section>
    <section id='to-the-sea'>
        <header>
            <h2>Vama Veche</h2>
            <code>Ref: <a href='/to-the-sea'>The Seaside</a><br />
            Date: 31.08&mdash;02.09.2024<br />
            TOC: <a href='#toc'>Back to top</a></code>
        </header>
        <div>
            <h3>Where is Vama Veche?</h3>
            <p>On the very South end of the Romanian sea side, about 200km East of Bucharest and less than 2km from the border with Bulgaria.</p>
            <h3>Getting there</h3>
            <p>Information will follow as soon as we have a number of people that join us.</p>
            <h3>Accommodation</h3>
            <p>Our wish is to reserve rooms in a couple of accommodations, so that we can spend time together/close to each other. 
            <p>Price estimate for 2 nights, per person, is €50.00 - €100.00.</p>
        </div>
    </section>
</div>
