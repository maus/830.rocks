<?php define( "ABSPATH", dirname( __FILE__ ) . '/' ); ?>

<?php require_once ABSPATH . "engine/engine.php"; ?>

<!doctype html>
<html>
	<head>
    	<meta charset='utf-8' />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    	<title>Yes!<?php if ( PAGE == 'archive' ) : ?> <?php echo count( $pages ); ?> times yes...<?php endif; ?></title>
        <link rel='stylesheet' href='<?php version_asset( 'css/screen.css' ); ?>' />
        <?php display_fadingOutCSS(); ?>
		<script type="text/javascript" src="//use.typekit.net/voa4dhg.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>    
    </head>
    <body class='<?php echo get_thingiClass(); ?>' <?php thingi_backgroundStyle(); ?>>    
    	<?php include get_pageTemplate(); ?>
        
		<?php display_pagesMenu(); ?>
        
        <div id='indicator'></div>
        
		<script src="_/js/jquery-2.1.min.js"></script>
        <script src="_/js/quo.standalone.js"></script>
        <script src="<?php version_asset( 'js/global.js' ); ?>"></script>
        <?php if ( $_SERVER['REMOTE_ADDR'] != '127.0.0.1' ) : // exclude staging ?>
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                
                ga('create', 'UA-53634624-1', 'auto');
                ga('send', 'pageview');
            </script>
        <?php endif; ?>
    </body>
</html>
