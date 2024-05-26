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
        <link rel="stylesheet" href="https://use.typekit.net/unl8rgd.css">
        <link media="all" rel="stylesheet" href="<?= ASSETS_URL ?>/css/app.css">
        <style>
            .with-js .js-hidden { display: none; }
        </style>
    </head>
    <body class='<?= get_pageClass(); ?>' <?= get_pageBackgroundStyle() ?>>
        <div class='u-background-container'>
            <div class='u-background-container-2'>
                <div class='r-site-navigation'>
                    <?php pagesMenu() ?>
                </div>

                <div class='r-page-wrapper'>
                    <?php pageTemplate() ?>
                </div>
            </div>

            <?php
            if( ! empty( $pages[PAGE]['practicalInformation'] ) ) :
                ?>
                <div class='r-practical-information r-closing-time'>
                    <section class='c-cta'>
                        <h1>Practical Information</h1>
                        <p><?= $pages[PAGE]['practicalInformation'] ?></p>
                        <p><a href='/good-to-know#<?= PAGE ?>'><?= get_menuLabel( PAGE ) ?> Logistics</a></p>
                    </section>
                </div>
                <?php
            endif;
            ?>
            <div class='c-color-palette'>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class='r-colophon r-closing-time'>
                <section class='c-colophon'>
                    <p>&copy; 2024 Ana & Marius, feel free to use everything. <a href='#'>Colophon and credits</a></p>
                </section>
            </div>
        </div>
        
        <script>
            if( document.getElementById( 'rsvp-data' ) != null ) {
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
        
        <?php 
        if ( $_SERVER['REMOTE_ADDR'] != '127.0.0.1' ) : 
            // exclude staging 
            ?>
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-RL9B59G10R"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-RL9B59G10R');
                </script>
            <?php 
        endif; 
        ?>
    </body>
</html>
