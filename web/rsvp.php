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
                <p><label>
                    <mark>Your name</mark>
                    <br />
                    <small>Or nickname or aka.</small><br />
                    <input required type='text' name='name'>
                </label></p>
                <p>
                    <mark>Are you gonna join us?</mark>
                    <br />
                    <small>Let's get this out of the way first.</small><br />
                    <label><input required type='radio' name='rsvp' value='yup' /> Joyfully attending</label>
                    <label><input required type='radio' name='rsvp' value='nope' /> Respectfully declining</label>
                </label></p>
                <?php
                if( isset( $_GET['em'] ) && $_GET['em'] == '1' && isset( $_GET['id'] ) ) :
                    ?>
                    <input type='hidden' name='email' value='em1' />
                    <?php
                else :
                    ?>
                    <p>
                        <label>
                            <mark>Your email</mark><br />
                            <small>Would be really cool if we could keep you updated via email.</small><br />
                            <input type='email' name='email' />
                        </label>
                    </p>
                    <?php
                endif;
                ?>
                <p>
                    <mark>Your +1s</mark>
                    </br>
                    <small>Only to get an idea of what we're planning for</small><br />
                    <label>Grown-ups you're bringing (excluding yourself) <input required type='number' min='0' value='0' name='adults' /> & kids <input required type='number' min='0' name='kids' value='0' /></label>
                </p>
                <?php
                if( isset( $_GET['id'] ) && ctype_alnum( $_GET['id'] ) ) :
                    ?>
                    <input type='hidden' name='uuid' value='<?= $_GET['id'] ?>' />
                    <?php
                    endif;
                ?>
            </fieldset>

            <button name='submit-rsvp' type='submit'>🤞 Send your RSVP</button>
        </form>
    </details>
    <hr />
    <h2>CIOs TODOs</h2>
    <p>We are too excited to wait before inviting you (and, frankly, getting that <i>répondez s'il vous plaît</i>), so for now the website is only wearing its birthday suit.</p> 
    <p>There's a roadmap and we'll let you know about updates</p>
    <ol>
        <li>Branding this website (a couple <a href='https://www.typewolf.com/go/roc-grotesk'>nice</a> <a href='https://www.typewolf.com/go/mrs-eaves'>typefaces</a> and a solid color palette).</li>
        <li>The Big Day schedule and info about the location. We know now it's on 30.08.2024 at <a href='https://www.bohoforest.ro/services/nunti/'>Boho Forest</a>.</li>
        <li>Stuff to do in Bucharest for a couple of days. It's really nice.</li>
        <li>The post-wedding weekend in Vama Veche, by the sea. IYKYK.</li>
    </ol>
</div>
