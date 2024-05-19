<?php

if( isset( $_POST['submit'] ) ) {
	exit;
}

$pages = [    	
	'rsvp' => [
		'image' => 'infinity.jpg',
		'thumb' => 'thumbs/infinity.jpg',
		'video' => 'infinity',
		'title' => "RSVP",
		'og:title' => "RSVP to Ana & Marius's Wedding",
		'description' => "We'd love for you to join us on August 30th for Ana and Marius's Big Day.",
		'theme' => 'stately'
	],
	'process-rsvp' => [
		'title' => '🤞 Sending',
		'hidden' => TRUE,
	],
	'home' => [
		'title' => get_siteTitle(),
		'locked' => TRUE,
		'og:title' => "Ana & Marius's Big Website",
		'description' => "Ana-Maria R., Marius M., and you, rock on August 30th, 2024, at Boho Forest." 
	],
	'the-big-day' => [
		'title' => 'The Big Day',
		'og:title' => "Ana & Marius's Big Day",
		'description' => "The agenda, getting to Boho Forest and then safely back home.",
		'theme' => 'wedding'
	],
	'to-the-sea' => [
		'title' => 'Trip to the Sea',
		'theme' => 'party',
	],
	'bucharest-city-break' => [
		'title' => 'A Taste of Bucharest',
		'theme' => 'art-deco',
	]
];

$agenda = [
	[
		'time' => '16:45',
		'title' => 'Arrival',
		'description' => "Arrive at the location, get into the atmosphere while having a glass of champagne or non-alcoholic drinks.
			
			Catch up with old friends and meet new guests.",
	],
	[
		'time' => '17:30',
		'title' => 'Ceremony',
		'description' => "Witness Ana and Marius tying the knot! Official style.",
	],
	[
		'time' => '17:45',
		'title' => 'Cocktail hour',
		'description' => "Take pictures, eat a cold Eugenia ice cream and slowly find your seat at the table."
	],
	[
		'time' => '18:30',
		'title' => 'Party',
		'description' => "Time to have fun! Let’s dance the night away!"
	],
	[
		'time' => '23:00',
		'title' => 'Wedding cake',
		'description' => "We cut the cake and eat it too."
	],
	[
		'time' => '03:00',
		'title' => 'Closing time',
		'description' => "We'll be thanking you for being part of our special celebration night and wishing you a safe trip home."
	],
];

define( "SITEROOT", get_siteRoot() );
define( "ASSETS_URL", SITEROOT . 'assets/dist/' );
define( "IMGS_URL", ASSETS_URL . 'graphic/' );
define( "IMGS_PATH", ABSPATH . 'assets/dist/graphic/' );
define( "VIDEO_URL", ASSETS_URL . 'video/' );
define( "THUMBS_URL", IMGS_URL . 'thumbs/' );
define( "THUMBS_PATH", IMGS_PATH . 'thumbs/' );
define( "COMPONENTS_PATH", ABSPATH . 'engine/components/' );
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

function pageTemplate() {
	include PAGE . ".php";
}

function component( $slug ) {
	global $agenda;

	$parsedownExtra = new ParsedownExtra();

	include COMPONENTS_PATH . $slug . ".php";
}

function version_asset( $URL ) {
	if ( is_debugging() ) {
		$version = time();	
	} else {
		$version = @filemtime( ABSPATH . 'assets/' . $URL );
	}
	if ( $version ) {
		$path = pathinfo( $URL );
		
		$output = SITEROOT . 'assets/dist/' . $path['dirname'] . '/' . $path['filename'] . '.' . $version . '.' . $path['extension'];
	} else {
		$output = SITEROOT . 'assets/dist/' . $URL;	
	}
	
	echo $output;
}


function is_from_theJournal( $page = '' ) {
	global $journal;

	if( ! is_array( $journal ) ) {
		return FALSE;
	}

	if ( ! $page ) {
		$page = PAGE;	
	}

	return in_array( $page, array_keys( $journal ) );
}

function pagesMenu() {
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

function get_thumb( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
		
	return ( ! empty( $pages[$page]['thumb'] ) ? IMGS_URL . $pages[$page]['thumb'] : false );
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
				$value = get_siteTitle() . " 🎉 " . ( ! empty( $pageData["og:{$elementId}"] ) ? $pageData["og:{$elementId}"] : $pageData[$elementId] );
				break;

			case 'image' :
				if( $thumb = get_thumb( PAGE ) ) {
					$value = $thumb;
				} else {
					$value = get_thumb( PAGE );
				}
				break;

			default :
				$value = ! empty( $pageData["og:{$elementId}"] ) ? $pageData["og:{$elementId}"] : $pageData[$elementId];
				break;
		}
		?>
		<meta name="og:<?= $elementId ?>" content="<?= $value ?>" />
		<?php
	}
}

function maybe_getData( $recordId = NULL ) {
	$headerMap = [
		'uuid' => '',
		'nick' => '',
		'name' => '',
		'email' => '',
	];

	$res = fopen( ABSPATH . 'export.csv', 'r' );
	if( ! $res ) {
		return $headerMap;
	}

	if( is_null( $recordId ) ) {
		if( empty( $_GET ) || empty( $_GET['id'] ) || ! ctype_alnum( $_GET['id'] ) ) {
			return $headerMap;
		}

		$recordId = "rec{$_GET['id']}";
	}

	$idx = 0;
	$uuidKey = NULL;
	$headers = [];
	while( ( $data = fgetcsv( $res, 1000, "," ) ) !== FALSE ) {
		if( ! $idx ) {
			$headers = $data;
			foreach( $headers as $key => $header ) {
				switch( $header ) {
					case 'Uuid' :
						$uuidKey = $key;
						$headerMap['uuid'] = $key;
						break;
					case 'Email' :
						$headerMap['email'] = $key;
						break;
					case 'Nick' :
						$headerMap['nick'] = $key;
						break;
					case 'First name' :
						$headerMap['name'] = $key;
						break;

				}
			}
		} else {
			if( $data[$uuidKey] == $recordId ) {
				foreach( $headerMap as $key => $idx ) {
					$output[$key] = ! empty( $data[$idx] ) ? $data[$idx] : '';
				}
				return $output;
			}
		}
		$idx++;
	}
	
	return NULL;
}

function get_pageClass( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	$parts = explode( "_", $page );

	$classes = [ 'p-' . $parts[0] ];

	if( ! empty( $pages[$page]['theme'] ) ) {
		$classes[] = 't-' . $pages[$page]['theme'];
	}

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
