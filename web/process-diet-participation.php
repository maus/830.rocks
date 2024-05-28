<?php 

define( "ABSPATH", dirname( __FILE__ ) . '/' ); 
require_once ABSPATH . "engine/engine.php"; 

// if( ! isset( $_POST['submit-diet-participation'] ) ) {
//     exit;
// }

// $RSVPResource = fopen( ABSPATH . 'diet-participation.csv', 'a+' );
// fputcsv( $RSVPResource, [
//     $_POST['uuid'],
//     $_POST['diet'],
//     $_POST['to-the-sea'],
//     $_POST['participation-details'],
//     time()
// ], ';' );

// fclose( $RSVPResource );

?>
<header class='r-page-lead'>
    <h1>You rock</h1>
    <p>Thank you for your response.</p>
</header>
