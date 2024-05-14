<div id='text'>
    <h1>830ROCKS</h1>
    <p>Or Ana-Maria R., Marius M., and you, rock on August 30th, 2024, at Boho Forest.</p>
    <div style='max-width: 30rem;'>
        <?= get_media() ?>
    </div>
    <hr />
    <h2><mark>RSVP</mark></h2>
    <p>Fill out via a short form. It would mean a lot and we have time for details later.</p>
    <details>
        <summary><u>Fill out the form 🎉</u></summary>
        <form method='POST' action='/process-rsvp'>
            <fieldset>
                <?php
                $data = maybe_getData(); 
                ?>
                <input type='hidden' name='uuid' value='<?= $data['uuid'] ?>' />
                <p><label>
                    <mark>Your name</mark>
                    <br />
                    <small>Or nickname or aka.</small><br />
                    <input required type='text' name='name' value='<?php 
                        if( ! empty( $data['nick'] ) ) {
                            echo $data['nick'];
                        } else {
                            echo $data['name'];
                        } ?>' />
                </label></p>
                <p>
                    <mark>Are you gonna join us?</mark>
                    <br />
                    <small>Let's get this out of the way first.</small><br />
                    <label><input id='rsvp-yup' required type='radio' name='rsvp' value='yup' /> Joyfully attending</label>
                    <label><input id='rsvp-nope' required type='radio' name='rsvp' value='nope' /> Respectfully declining</label>
                </p>
                <div id='rsvp-data' class='js-hidden'>
                    <p>
                        <label>
                            <mark>Your email</mark><br />
                            <small>Would be really cool if we could keep you updated via email.</small><br />
                            <input id='rsvp-email' type='email' name='email' value='<?= $data['email'] ?>' />
                        </label>
                    </p>
                    <p>
                        <mark>Your +1s</mark>
                        <br />
                        <small>Only to get an idea of what we're planning for</small><br />
                        <label>Grown-ups you're bringing (excluding yourself) <input id='rsvp-adults' type='number' min='0' value='0' name='adults' /> & kids <input id='rsvp-kids' type='number' min='0' name='kids' value='0' /></label>
                    </p>
                </div>
            </fieldset>

            <button id='rsvp-submit' name='submit-rsvp' type='submit'>🤞 Send your RSVP</button>
        </form>
    </details>
    <hr />
    <h2>CIOs TODOs (as of February 6)</h2>
    <p>We are too excited to wait before inviting you (and, frankly, getting that <i>répondez s'il vous plaît</i>), so for now the website is only wearing its birthday suit.</p> 
    <p>There's a roadmap and we'll let you know about updates</p>
    <ol>
        <li>Branding this website (a couple <a href='https://www.typewolf.com/go/roc-grotesk'>nice</a> <a href='https://www.typewolf.com/go/mrs-eaves'>typefaces</a> and a solid color palette).</li>
        <li>The Big Day schedule and info about the location. We know now it's on 30.08.2024 at <a href='https://www.bohoforest.ro/services/nunti/'>Boho Forest</a>.</li>
        <li>Stuff to do in Bucharest for a couple of days. It's really nice.</li>
        <li>The post-wedding weekend in Vama Veche, by the sea.</li>
    </ol>
</div>
