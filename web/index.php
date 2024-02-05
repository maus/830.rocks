<?php 

define( "ABSPATH", dirname( __FILE__ ) . '/' ); 
require_once ABSPATH . "engine/engine.php"; 
?>

<!doctype html>
<html>
	<head>
    	<meta charset='utf-8' />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    	<title>830.rocks 🎉 <?= get_title() ?></title>
    </head>
    <body class='<?php echo get_pageClass(); ?>' <?= get_pageBackgroundStyle() ?>>    
    	<?php include get_pageTemplate(); ?>
        
		<?php display_pagesMenu(); ?>
        
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
