<?php

if( isset( $_POST['submit'] ) ) {
	exit;
}

$pages = [    	
	'rsvp' => [
		'image' => 'infinity.jpg',
		'video' => 'infinity',
		'title' => 'RSVP',
		'description' => "We'd love for you to join us on August 30th for Ana and Marius's Big Day.",
	],
	'process-rsvp' => [
		'title' => '🤞 Sending',
		'hidden' => true,
	],
	'home' => [
		'title' => get_siteTitle(),
		'locked' => true,
	],
	'the-big-day' => [
		'title' => 'The Big Day',
		'locked' => true,
	],
	'to-the-sea' => [
		'title' => 'Trip to the Sea',
		'locked' => true,
	],
	'on-bucharest' => [
		'title' => 'See Bucharest',
		'locked' => true
	]
];

define( "SITEROOT", get_siteRoot() );
define( "IMGS_URL", SITEROOT . 'assets/img/' );
define( "IMGS_PATH", ABSPATH . 'assets/img/' );
define( "VIDEO_URL", SITEROOT . 'assets/video/' );
define( "THUMBS_URL", IMGS_URL . 'thumbs/' );
define( "THUMBS_PATH", IMGS_PATH . 'thumbs/' );
define( 'PAGE', page() );

require_once ABSPATH . 'engine/vendor/parsedown/Parsedown.php';
require_once ABSPATH . 'engine/vendor/parsedown-extra/ParsedownExtra.php';

if ( ! in_array( PAGE, array_keys( $pages ) ) ) {
	header( 'HTTP/1.1 404 Not Found' );
	die( "<h1>That's not a page</h1>" );
}

function get_siteTitle() {
	return "830.rocks";
}

function get_siteRoot() {
	$path = pathinfo($_SERVER['PHP_SELF']);
	switch ( $path['dirname'] ) {
		case '/' :
			$root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
			break;

		case '\\' :
			$root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
			break;

		default :
			'https://' . $_SERVER['HTTP_HOST'] . $path['dirname'] . '/';
	}
	$root = str_replace( array( 'engine/', 'html/', 'app/', 'managers/' ), '', $root );
	
	return $root;
}

function page() {
	global $pages;

	return $page = isset( $_GET['page'] ) ? $_GET['page'] : array_keys( $pages )[0]; 
}

function get_pageTemplate() {
	return PAGE . ".php";
}

function version_asset( $URL ) {
	if ( is_debugging() ) {
		$version = time();	
	} else {
		$version = @filemtime( ABSPATH . 'assets/' . $URL );
	}
	if ( $version ) {
		$path = pathinfo( $URL );
		
		$output = SITEROOT . 'assets/' . $path['dirname'] . '/' . $path['filename'] . '.' . $version . '.' . $path['extension'];
	} else {
		$output = SITEROOT . 'assets/' . $URL;	
	}
	
	echo $output;
}


function is_from_theJournal( $page = '' ) {
	global $journal;

	if ( ! $page ) {
		$page = PAGE;	
	}

	return in_array( $page, array_keys( $journal ) );
}

function display_pagesMenu() {
	global $pages;

	$output = "<nav>
	<p>🍔 Navigation</p>
	<ul id='site-navigation' class='off-canvas'>";
		$first = true;
		foreach ( $pages as $link => $page ) {
			if( ! empty( $page['hidden'] ) ) {
				continue;
			}

			$linkText = format_linkText( $link );
			$aClass = ( PAGE == $link ) ? "active" : "";
			
			$liAttributes = "";	
			if ( $first ) {
				$liAttributes = " class='first'";
				$first = false;
			}
			
			if( ! empty( $page['locked'] ) ) {
				$link = '';
				$linkText = "<s>❌ {$linkText}</s>";
			}

			$output .= "<li" . $liAttributes . "><a href='" . $link . "' class='" . $aClass . "'>" . $linkText . "</a></li>";
		}
	$output .= "</ul>
	</nav>";
	
	if ( count( $pages ) > 1 ) echo $output; 
}

function format_linkText( $link ) {
	$linkText = get_title( $link );
	
	return $linkText;
}

function get_title( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	return $pages[$page]['title'];
}

function get_date( $page = '' ) {
	global $pages;

	if ( ! $page ) {
		$page = PAGE;	
	}
	
	$time = $pages[$page]['time'];
	$linkText = date( 'd.m.Y', $time );
	
	return $linkText;
}


function get_image( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	/*
	$handle = fopen( $link . ".php", "r" );
	$HTML = fread( $handle, filesize( $link . ".php" ) );
	fclose( $handle );
	$DOM = new DOMDocument();
	$DOM->loadHTML( $HTML . "</body>" );
	libxml_use_internal_errors( true );
	if ( $videoElement = $DOM->getElementByID( "video-background" ) ) {
		$backgroundStyle = $videoElement->getAttribute( 'style' );
	} else {
		$imageElement = $DOM->getElementByID( "image" );
		$backgroundStyle = $imageElement->getAttribute( 'style' );
	}
	libxml_clear_errors();
	
	return str_replace( array( "background-image: url( ", " );" ), "", $backgroundStyle );
	*/
	
	return ( ! empty( $pages[$page]['image'] ) ? IMGS_URL . $pages[$page]['image'] : false );
}

function get_imageHTML( $page = '' ) {
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	return "<div id='image' style='background-image: url( " . get_image( $page ) . " );'></div>";
}


function get_video( $extension, $page = '' ) {
	global $pages;

	if ( ! $page ) {
		$page = PAGE;	
	}
	
	return VIDEO_URL . $pages[$page]['video'] . '.' . $extension;
}

function get_videoHTML( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	return "<div id='video-background' style='max-width: 100%'>
		<video style='max-width: 100%' autoplay loop muted poster='" . get_image( $page ) . "'>
			<source src='" . get_video( 'webm', $page ) . "' type='video/webm'>     
			<source src='" . get_video( 'mp4', $page ) . "' type='video/mp4'>
		</video>
	</div>";
}
	

function get_media( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	if ( ! empty( $pages[$page]['video'] ) ) {
		return get_videoHTML( $page );
	} else {
		return get_imageHTML( $page );
	}
}

function openGraphMeta() {
	global $pages;

	if( empty( $pages[PAGE] ) ) {
		return;
	}
	
	$pageData = $pages[PAGE];
	foreach( [
		'title',
		'description',
		'image'
	] as $elementId ) {
		if( empty( $pageData[$elementId] ) ) {
			continue;
		}
		switch( $elementId ) {
			case 'title' :
				$value = get_siteTitle() . " 🎉 " . $pageData[$elementId];
				break;

			case 'image' :
				$value = get_image( PAGE );
				break;

			default :
				$value = $pageData[$elementId];
				break;
		}
		?>
		<meta name="og:<?= $elementId ?>" content="<?= $value ?>" />
		<?php
	}
}

function get_pageClass( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	$parts = explode( "_", $page );

	$classes = array( 'the-' . $parts[0] );

	if ( is_from_theJournal( $page ) ) {
		if ( get_image( $page ) ) {
			$classes[] = 'has-media';
		}
	}
	
	return implode( ' ', $classes );
}

function get_song( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	return ! empty( $pages[$page]['song'] ) ? "<!-- " . $pages[$page]['song'] . " -->
        <iframe width='100%' height='100%' src='//www.youtube.com/embed/" . $pages[$page]['embed'] . "?rel=0' frameborder='0' allowfullscreen></iframe>" : false;
}

function display_fadingOutCSS( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	if ( in_array( $page, array_keys( $pages ) ) ) {
		$maximum = 180;
		$now = time();
		$then = $pages[$page]['time'];
		$timePassed = $now - $then;
		$daysPassed = intval( $timePassed / 60 / 60 / 24 );
		$percentage = min( $daysPassed * 100 / $maximum, 100 );
		$textOpacity = .3 + ( 1 - $percentage / 100 ) / 2;
		$mediaOpacity = .5 + ( 1 - $percentage / 100 ) / 2;
		?>
		<style>
			.<?php echo get_pageClass(); ?> #text { opacity: <?php echo $textOpacity; ?>; }
			.<?php echo get_pageClass(); ?> #image,
			.<?php echo get_pageClass(); ?> #video-background { opacity: <?php echo $mediaOpacity; ?>; }
		</style>
		<?php
	}
}

function parse_directory() {
	$pages = array();
	$handle = opendir( '.' );
	$exclude = array( '.htaccess', 'index.php' );
	while ( $file = readdir( $handle ) ) {
		if ( ! is_dir( $file ) && ! in_array( $file, $exclude ) ) {
			$day = substr( $file, strpos( $file, "_" ) + 1, 2 );
			$month = substr( $file, strpos( $file, "_" ) + 4, 2 );
			$year = substr( $file, strpos( $file, "_" ) + 7, 4 );
			$time = mktime( 0, 0, 0, $month, $day, $year );
			$info = pathinfo( $file );
			$fileName = basename( $file, "." . $info['extension'] );
			$link = $fileName;
			if ( isset( $pages[$time] ) ) {
				$time++;	
			}
			$pages[$time] = $link;
		}
	}
	ksort( $pages );
	
	return $pages;
}

//
function is_debugging() {
	return defined( 'DEBUG' ) && DEBUG;
}

function get_pageBackgroundStyle( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}

	if( empty( $pages[$page] ) || empty( $pages[$page]['background'] ) ) {
		return;
	}

	return "style='background-color: " . $pages[$page]['background'] . ";'";
}
