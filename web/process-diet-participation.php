<?php 

if( ! isset( $_POST['submit-diet-participation'] ) ) {
    exit;
}

if( empty( $_POST['checkin'] ) ) {
    exit;
}

$checkins = $_POST['checkin'];
$dietParticipationResource = fopen( ABSPATH . 'diet-participation.csv', 'a+' );

foreach( $checkins as $uuid => $input ) {
    $checkinData = [];
    $headerMap = get_detailsExportDataHeaderMap( TRUE );
    foreach( $headerMap as $fieldId => $blank ) {
        if( $fieldId == 'observations' && ! empty( $input[$fieldId] ) ) {
            $input[$fieldId] = str_replace( [ "\r", "\n" ], ' ', $input[$fieldId] );
        }
        $checkinData[$fieldId] = $input[$fieldId] ?? '';
    }
    $checkinData['time'] = time();

    fputcsv( $dietParticipationResource, $checkinData, ';' );    
}

fclose( $dietParticipationResource );


?>
<header class='r-page-lead'>
    <h1>You rock</h1>
    <p>Thank you for your response.</p>
</header>
