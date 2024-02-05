<?php 

define( "ABSPATH", dirname( __FILE__ ) . '/' ); 
require_once ABSPATH . "engine/engine.php"; 

if( ! isset( $_POST['submit-rsvp'] ) ) {
    exit;
}

$RSVPResource = fopen( ABSPATH . 'rsvp.csv', 'a+' );
fputcsv( $RSVPResource, [
    $_POST['uuid'],
    $_POST['name'],
    $_POST['email'],
    $_POST['adults'],
    $_POST['kids'],
    time()
], ';' );

fclose( $RSVPResource );

?>
<div id='text'>
    <h1>You rock</h1>
    <p>Thank you for your response.</p>
</div>
