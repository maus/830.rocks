<header class='r-page-lead'>
    <h1>Food & Sea</h1>
    <p>As organization is in full swing, we need a bit more information from your side. We want to make sure that everyone is well taken care of and need to reserve rooms for the 2 Vama Veche nights (31.08-2.09)</p>
</header>
<div class='r-page-content'>
    <section>
        <header>
            <h2>Food & Sea</h2>
        </header>
        <div>
            <form method='POST' action='/process-diet-participation'>
                <fieldset>
                    <?php
                    $data = maybe_getData(); 
                    ?>
                    <input type='hidden' name='uuid' value='<?= $data['uuid'] ?>' />
                    <h4>Your name</h4>
                    <p>
                        <small>Or nickname or aka.</small><br />
                        <label>
                            <input required type='text' name='name' value='<?php 
                                if( ! empty( $data['nick'] ) ) {
                                    echo $data['nick'];
                                } else {
                                    echo $data['name'];
                                } ?>' />
                        </label>
                    </p>
                    <h4>Meal options</h4>
                    <p>
                        <small>Choose the one that fits best.</small>
                        <br />
                        <label><input required type='radio' name='diet' value='meat' /> I eat meat</label>
                        <label><input required type='radio' name='diet' value='pescaterian' /> I don't eat meat, but I eat fish</label>
                        <label><input required type='radio' name='diet' value='vegeratarian' /> I am vegetarian</label>
                        <label><input required type='radio' name='diet' value='vegan' /> I am vegan</label>
                    </p>
                    <p>
                        <h4>Additionally...</h4>
                        <small>Any dietary restrictions or things you'd like us to know.</small>
                        <textarea name='participation-details'></textarea>
                    </p>
                    <p>
                        <h4>Are you joining us to the seaside?</h4>
                        <small>Are you coming to Vama Veche for 2 nights (31.08-2.09) (<a href='/to-the-sea'>Read the plan</a>). We have to have to reserve some rooms as soon as possible.</small>
                        <br />
                        <label><input required type='radio' name='to-the-sea' value='yup' /> Yes. Rock on</label>
                        <label><input required type='radio' name='to-the-sea' value='nope' /> No. I'd love to, but no</label>
                        <label><input required type='radio' name='to-the-sea' value='maybe' /> Maybe.</label>
                    </p>
                </fieldset>

                <button id='diet-participation-submit' name='submit-diet-participation' type='submit'>🤞 Send your details</button>
            </form>
        </div>
    </section>
</div>
