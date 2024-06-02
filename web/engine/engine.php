<?php

if( isset( $_POST['submit'] ) ) {
	exit;
}

$pages = [    	
	'home' => [
		'title' => get_siteTitle(),
		'og:title' => "Ana & Marius's Big Website",
		'description' => "Ana-Maria R., Marius M., and you, rock on August 30th, 2024, at Boho Forest.",
		'menuLabel' => '8:30',
		'practicalInformation' => 'Everything you need to know to get to the city, the big day, or the seaside.'
	],
	'rsvp' => [
		'image' => 'infinity.jpg',
		'thumb' => 'thumbs/infinity.jpg',
		'video' => 'infinity',
		'title' => "RSVP",
		'og:title' => "RSVP to Ana & Marius's Wedding",
		'description' => "We'd love for you to join us on August 30th for Ana and Marius's Big Day.",
		'theme' => 'stately',
		'hidden' => TRUE,
	],
	'process-rsvp' => [
		'title' => '🤞 Sending',
		'hidden' => TRUE,
	],
	'diet-participation' => [
		'thumb' => 'thumbs/mirror-mirror.jpg',
		'title' => "Diet & participation",
		'og:title' => "Your Details to Ana & Marius's Wedding",
		'description' => "Organization is in full swing and we need a bit more information for Ana and Marius's Big Day.",
		'theme' => 'stately',
		'hidden' => TRUE,
	],
	'process-diet-participation' => [
		'title' => '🤞 Sending',
		'hidden' => TRUE,
	],
	'good-to-know' => [
		'title' => 'Good to Know',
		'og:title' => "Ana & Marius's Weekend Logistics",
		'description' => "",
		'theme' => 'stately',
		'hidden' => TRUE,	
	],
	'the-big-day' => [
		'theme' => 'wedding',
		'menuLabel' => '<span>The </span>Big Day',
		'title' => 'The Big Day',
		'og:title' => "Ana & Marius's Big Day",
		'description' => "The agenda, getting to Boho Forest and then safely back home.",
		'practicalInformation' => "Transport to the venue and then safely back home, dress code, gifts policy.",
		
	],
	'to-the-sea' => [
		'theme' => 'party',
		'title' => 'Trip to the Sea',
		'description' => 'Take a trip with us to the seaside for sun, sand, and shindings.',
		'menuLabel' => '<span>The </span>Seaside',
		'practicalInformation' => "Geographical details, getting there and back, accommodation.",
	],
	'bucharest-city-break' => [
		'theme' => 'art-deco',
		'title' => 'A Taste of Bucharest',
		'description' => 'About Bucharest, a city of contrasts, with a unique heart and vibe.',
		'menuLabel' => '<span>The </span>City',
		'practicalInformation' => "Arriving in Bucharest, currency, getting around town."
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

function pagesMenu( $skipHome = FALSE, $includeDescription = FALSE ) {
	global $pages;

	$output = "<nav>
	<p class='sr-only'>🍔 Navigation</p>
	<ul id='site-navigation' class='c-menu'>";
		$first = true;
		foreach ( $pages as $link => $page ) {
			if( ! empty( $page['hidden'] ) ) {
				continue;
			}

			if ( $link == 'home' && $skipHome ) {
				continue;
			} 

			$linkText = format_linkText( $link );
			if( $includeDescription && ! empty( $pages[$link]['description'] ) ) {
				$linkText .= "<small>{$pages[$link]['description']}</small>";
			}
			$aClass = "c-{$link}";
			
			$liClasses = [
				'c-menu__item',
				"c-menu__item--{$link}",
			];

			if ( $first ) {
				$liClasses[] = "c-menu__item--first";
				$first = false;
			}

			if( PAGE == $link ) {
				$liClasses[] = "c-menu__item--active";
			}

			$liClass = implode( " ", $liClasses );
			
			if( ! empty( $page['locked'] ) ) {
				$link = '';
				$linkText = "<s>{$linkText}</s>";
			}


			$output .= "<li class='" . $liClass . "'><a href='/" . $link . "' class='" . $aClass . "'>" . $linkText . "</a></li>";
		}
	$output .= "</ul>
	</nav>";
	
	if ( count( $pages ) > 1 ) echo $output; 
}

function format_linkText( $link ) {
	$linkText = get_menuLabel( $link );
	
	return $linkText;
}

function get_menuLabel( $page = '' ) {
	global $pages;
	
	if ( ! $page ) {
		$page = PAGE;	
	}
	
	return $pages[$page]['menuLabel'] ?? $pages[$page]['title'];
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

function maybe_getRSVPExportData( $recordId = NULL ) {
	$headerMap = [
		'uuid' => '',
		'nick' => '',
		'name' => '',
		'email' => '',
	];

	$res = fopen( ABSPATH . 'export-invitees.csv', 'r' );
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

function get_detailsExportDataHeaderMap( $formatForStorage = FALSE ) {
	$output = [
		'uuid' => '',
		'name' => '',
		'diet' => '',
		'observations' => '',
		'rsvp' => '',
		'sea' => '',
	];

	if( ! $formatForStorage ) {
		$output = array_merge( $output, [
			'email' => '',
			'nick' => '',
			'uuid-bringing' => '',
			'uuid-guest-of' => '',
		] );
	}

	return $output;
}

function maybe_getDetailsExportData( $recordId = NULL ) {
	$headerMap = get_detailsExportDataHeaderMap();

	$res = fopen( ABSPATH . 'export-details.csv', 'r' );
	if( ! $res ) {
		return [
			'check-ins' => [
				$headerMap,
			],
			'success' => FALSE,
		];
	}

	if( is_null( $recordId ) ) {
		if( empty( $_GET ) || empty( $_GET['id'] ) || ! ctype_alnum( $_GET['id'] ) ) {
			return [
				'check-ins' => [
					$headerMap,
				],
				'success' => FALSE,
			];
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
					case 'Diet' :
						$headerMap['diet'] = $key;
						break;
					case 'Observations' :
						$headerMap['observations'] = $key;
						break;
					case 'RSVP' :
						$headerMap['rsvp'] = $key;
						break;
					case 'To the sea' :
						$headerMap['sea'] = $key;
						break;
					case 'Uuid (from Bringing)' :
						$headerMap['uuid-bringing'] = $key;
						break;
					case 'Uuid (from Guest of)' :
						$headerMap['uuid-guest-of'] = $key;
						break;
				}
			}
		} else {
			if( $data[$uuidKey] == $recordId ) {
				foreach( $headerMap as $key => $idx ) {
					$checkinData[$key] = ! empty( $data[$idx] ) ? $data[$idx] : '';
				}
			
				$checkinData['label'] = $checkinData['name'] ?: $checkinData['nick'];
				
				if( ! empty( $checkinData['uuid-bringing'] ) ) {
					$checkinData['main-guest'] = TRUE;
				}
				
				if( ! empty( $checkinData['uuid-guest-of'] ) ) {
					$checkinData['invitee'] = TRUE;
				}

				$output = [
					'check-ins' => [
						$recordId => $checkinData,
					],
					'success' => true,
				];

				if( ! empty( $checkinData['uuid-bringing'] ) ) {
					$guestUuids = explode( ", ", $checkinData['uuid-bringing'] );
					foreach( $guestUuids as $guestUuid ) {
						$inviteeData = maybe_getDetailsExportData( $guestUuid );
						if( $inviteeData['success'] ) {
							$output['check-ins'][$guestUuid] = reset( $inviteeData['check-ins'] );
						}
					} 
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
	$classes[] = ! empty( $pages[$page]['theme'] ) ? 't-' . $pages[$page]['theme'] : 't-website';

	if ( get_image( $page ) ) {
		$classes[] = 'has-media';
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
