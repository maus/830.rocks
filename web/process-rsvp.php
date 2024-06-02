<?php 

if( ! isset( $_POST['submit-rsvp'] ) ) {
    exit;
}

$RSVPResource = fopen( ABSPATH . 'rsvp.csv', 'a+' );
fputcsv( $RSVPResource, [
    $_POST['uuid'],
    $_POST['rsvp'],
    $_POST['name'],
    $_POST['email'],
    $_POST['adults'],
    $_POST['kids'],
    time()
], ';' );

fclose( $RSVPResource );

?>
<div class='r-page-content'>
    <h1>You rock</h1>
    <p>Thank you for your response.</p>
</div>
