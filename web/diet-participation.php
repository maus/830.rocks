<?php
$data = maybe_getDetailsExportData(); 
$mealOptions = [ 
    'carnivore' => 'I eat meat',
    'pescatarian' => "I don't eat meat, but I eat fish",
    'vegetarian' => "I am vegetarian, plus dairy",
    'vegan' => "I am vegan",
    ];

$guestMealOptions = [ 
    'carnivore' => 'They eat meat',
    'pescatarian' => "They don't eat meat, but they do eat fish",
    'vegetarian' => "Vegetarian, plus dairy",
    'vegan' => "Vegan",
    ];

$totalCheckins = count( $data['check-ins'] );
$multiGuest = $totalCheckins > 1;
$invitees = $totalCheckins - 1;
$formClass = 'u-checkin-form ';
if( $data['success'] ) {
    if( $multiGuest ) {
        $formClass .= 'form--compact u-checkin-form--multi-guest ';
    } else {
        $formStyle .= 'u-checkin-form--single-guest ';
    }
}
?>
<header class='r-page-lead'>
    <h1>Food & Sea</h1>
    <p>As organization is in full swing, we need a bit more information from your side. We want to make sure that everyone is well taken care of and we also need to reserve rooms in Vama Veche (31.08&mdash;2.09)</p>
</header>
<div class='r-page-content'>
    <?php
    if( $multiGuest ) :
        $guestsLabel = '';
        $idx = 0;
        foreach( $data['check-ins'] as $uuid => $checkinData ) {
            $idx++;
            $mainGuest = empty( $checkinData['invitee'] );
            $guestLabel = "<mark>{$checkinData['label']}</mark>";
            if( $mainGuest ) {
                $mainGuestLabel = $guestLabel;
            } else {
                if( $invitees > 1 ) {
                    if( $idx == $totalCheckins ) {
                        $guestsLabel .= " and ";
                    } elseif( $idx > 2 ) {
                        $guestsLabel .= ", ";
                    }
                }

                $guestsLabel .= $guestLabel;
            }
        }
        ?>
        <section>
            <header>
                <h2>Check-in</h2>
            </header>
            <div>
                <p>Thanks for taking the time for a quick check-in. Below there's a form for you, <?= $mainGuestLabel ?>, and also for <?= $guestsLabel ?>.</p>
            </div>
        </section>
        <?php
    endif;
    ?>
    <section>
        <form class='<?= $formClass ?>' method='POST' action='/process-diet-participation'>
            <?php
            foreach( $data['check-ins'] as $uuid => $checkinData ) :
                $mainGuest = ! $multiGuest || empty( $checkinData['invitee'] );
                $guestLabel = ( $checkinData['label'] ) ?? '';
                ?>
                <fieldset class='u-checkin-form__item'>
                    <div class='u-checkin-form__item__legend form__legend'>
                        <span class='form__legend__heading'><?php if( $multiGuest && $guestLabel ) : ?><?= $guestLabel ?>'s<?php else : ?>Your<?php endif; ?> check-in
                        </span>
                        <code>Ref: <?= $uuid ?></code>
                    </div>
                    <div class='u-checking-form__item__form-fields'>
                        <input type='hidden' name='checkin[<?= $uuid ?>][uuid]' value='<?= $uuid ?>' />
                        <?php
                        if( $mainGuest && ! empty( $guestLabel ) ) :
                            ?>
                            <input type='hidden' name='checkin[<?= $uuid ?>][name]' value='<?= $guestLabel ?>' />
                            <?php 
                        else :
                            ?>
                            <div class='form-group'>
                                <label class='form-field'>
                                    <span class='form-field__label'><?php if( $mainGuest ) : ?>Your name<?php else : ?>Name<?php endif; ?></span>
                                    <small class='form-field__description'>Or nickname or aka.</small>
                                    <input required type='text' name='checkin[<?= $uuid ?>][name]' value='<?php 
                                        if( ! empty( $checkinData['nick'] ) && $mainGuest ) {
                                            echo $checkinData['nick'];
                                        } else {
                                            echo $checkinData['name'];
                                        } ?>' />
                                </label>
                            </div>
                            <?php
                        endif;
                        ?>
                        <div class='form-group'>
                            <span class='form-field__label'>Are <?php if( $mainGuest ) : ?>you<?php else : ?>they<?php endif; ?> still planning to attend?</span>
                            <?php 
                            if( $mainGuest ) :
                                ?>
                                <small class='form-field__description'>Simply double-checking.</small>
                                <?php
                            endif;
                            ?>
                            <label class='form--compact--inlined form-field--radio'><input class='js-checkin-form__item__details__trigger form-element' id='rsvp-yup-<?= $uuid ?>' required type='radio' name='checkin[<?= $uuid ?>][rsvp]' value='Accepted' <?php if( $checkinData['rsvp'] == 'Accepted' ) : ?> checked='1' <?php endif; ?> /> <span class='form-input__label'>Yes</span></label>
                            <label class='form--compact--inlined form-field--radio'><input class='js-checkin-form__item__details__trigger form-element' id='rsvp-nope-<?= $uuid ?>' required type='radio' name='checkin[<?= $uuid ?>][rsvp]' value='Declined' <?php if( $checkinData['rsvp'] == 'Declined' ) : ?> checked='checked' <?php endif; ?> /> <span class='form-input__label'>No, plans changed</span></label>
                        </div>
                        <div id='item-details-<?= $uuid ?>' class='u-checkin-form__item__details <?php if( $checkinData['rsvp'] == 'Declined' ) : ?>js-hidden<?php endif; ?>'>
                            <div class='form-group'>
                                <label class='form-field'>
                                    <span class='form-field__label'><?php if( $mainGuest ) : ?>Your <?php elseif( $guestLabel ) : ?><?= $guestLabel ?>'s <?php endif; ?>meal options</span>
                                    <?php 
                                    if( $mainGuest ) :
                                        ?>
                                        <small class='form-field__description'>Choose the one that fits best.</small>
                                        <?php
                                    endif;
                                    ?>
                                    <select class='form-element' required name='checkin[<?= $uuid ?>][diet]'>
                                        <option value=''>- Select -</option>
                                        <?php
                                        $checkinMealOptions = $mainGuest ? $mealOptions : $guestMealOptions;
                                        foreach( $checkinMealOptions as $value => $text ) :
                                            ?>
                                            <option 
                                                value='<?= $value ?>' 
                                                <?php 
                                                if( $value == $checkinData['diet'] ) : 
                                                    ?> selected <?php 
                                                endif; 
                                                ?>><?= $text ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </label>
                            </div>
                            <div class='form-group'>
                                <label class='form-field'>
                                    <span class='form-field__label'>Additionally...</span>
                                    <small class='form-field__description'>Dietary restrictions or things you'd like us to know.</small>
                                    <textarea class='form-element' optional placeholder='Allergies, intolerances, important things to know' name='checkin[<?= $uuid ?>][observations]'><?= $checkinData['observations'] ?></textarea>
                                </label>
                            </div>
                            <div class='form-group'>
                                <span class='form-field__label'><?php if( $mainGuest ) : ?>Are you <?php elseif( $guestLabel ) : ?>Is <?= $guestLabel ?> <?php endif; ?> joining us on the seaside?</span>
                                <?php
                                if( $mainGuest ) :
                                    ?>
                                    <small class='form-field__description'>The day after the wedding we're gonna go to Vama Veche and stay for 2 nights (31.08&mdash;2.09) (<a href='/to-the-sea'>Read the plan</a> or the <a href='/good-to-know#to-the-sea'>logistics</a>). We have to, have to, really have to reserve accommodation soon.</small>
                                    <?php
                                endif;
                                ?>
                                <label class='form-field'><input class='form-element' required type='radio' name='checkin[<?= $uuid ?>][sea]' value='Yes' <?php if( $checkinData['sea'] == 'Yes' ) : ?> checked='checked' <?php endif; ?> /> <span class='form-input__label' >Yes. Rock on</span></label>
                                <label class='form-field'><input class='form-element' required type='radio' name='checkin[<?= $uuid ?>][sea]' value='No' <?php if( $checkinData['sea'] == 'No' ) : ?> checked='checked' <?php endif; ?> /> <span class='form-input__label'>No. I'd love to, but no</span></label>
                                <label class='form-field'><input class='form-element' required type='radio' name='checkin[<?= $uuid ?>][sea]' value='Maybe' <?php if( $checkinData['sea'] == 'Maybe' ) : ?> checked='checked' <?php endif; ?> /> <span class='form-input__label'>Maybe.</span></label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php
            endforeach;
            ?>

            <div class='form-group form-actions'>
                <button id='diet-participation-submit' name='submit-diet-participation' type='submit'>Send your details</button>
            </div>
        </form>
    </section>
</div>
