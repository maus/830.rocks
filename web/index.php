<?php 

define( "ABSPATH", dirname( __FILE__ ) . '/' ); 
require_once ABSPATH . "engine/engine.php"; 
?>

<!doctype html>
<html class='no-js'>
	<head>
    	<meta charset='utf-8' />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    	<title><?= get_siteTitle() ?> 🎉 <?= get_title() ?></title>
        <script>
            document.documentElement.className = document.documentElement.className.replace( "no-js", "with-js" );
        </script>
        <?= openGraphMeta() ?>
        <style>
            .with-js .js-hidden { display: none; }
        </style>
    </head>
    <body class='<?php echo get_pageClass(); ?>' <?= get_pageBackgroundStyle() ?>>    
    	<?php include get_pageTemplate(); ?>
        
		<?php display_pagesMenu(); ?>

        <script>
            if( typeof( document.getElementById( 'rsvp-data' ) !== 'null' ) ) {
                document.getElementById( 'rsvp-yup' ).addEventListener( 'change', function( ev ) {
                    document.getElementById( 'rsvp-data' ).classList.remove( 'js-hidden' );
                    toggleRequired( true );
                } );
                document.getElementById( 'rsvp-nope' ).addEventListener( 'change', function( ev ) {
                    document.getElementById( 'rsvp-data' ).classList.add( 'js-hidden' );
                    toggleRequired( false );
                } );
                
                function toggleRequired( $onOrOff ) {
                    if( $onOrOff ) {
                        document.getElementById( 'rsvp-email' ).setAttribute( 'required', $onOrOff );
                        document.getElementById( 'rsvp-adults' ).setAttribute( 'required', $onOrOff );
                        document.getElementById( 'rsvp-kids' ).setAttribute( 'required', $onOrOff );
                        document.getElementById( 'rsvp-submit' ).textContent = '🤞 Send your RSVP';
                    } else {
                        document.getElementById( 'rsvp-submit' ).textContent = '🙁 Send your RSVP';
                        document.getElementById( 'rsvp-email' ).removeAttribute( 'required' );
                        document.getElementById( 'rsvp-adults' ).removeAttribute( 'required' );
                        document.getElementById( 'rsvp-kids' ).removeAttribute( 'required' );
                    }
                }
            }
        </script>
        
        <?php if ( $_SERVER['REMOTE_ADDR'] != '127.0.0.1' ) : // exclude staging ?>
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-RL9B59G10R"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-RL9B59G10R');
                </script>
        <?php endif; ?>
    </body>
</html>
