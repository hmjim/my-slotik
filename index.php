<?php

// require( $_SERVER['DOCUMENT_ROOT'].'/vendor/vendor.php' );
// die();
//set this to you  desired host.
//for example. if you want http://yourhost.com/test to be proxied by 
//http://newhost.com/test, just set $new_url='http://yourhost.com'
$new_url = 'my-azartgame.com';
//########
//extract headers from a string. header is in the name:value format.
function splitHeader( $strHeader ) {
	$sep = explode( "\r\n", $strHeader );

	return $sep;
}

error_reporting(0); 


function goto_handler() {
	$location = '';
	switch ( $_SERVER['REQUEST_URI'] ) {

		case '/cas/vulkan' : 
			{
				$location = 'https://mobywin7.com/?s=53&ref=wp_w3004p162_mysltk&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/vulkanclub' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/gogoplay' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/admiral' :
			{
				$location = 'https://mobywin7.com/?s=45&ref=wp_w3004p122_slt4mon&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/maxbet' :
			{
				$location = 'https://mobywin7.com/?s=3&ref=wp_w3004p3_maxtop&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/eldorado' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p157_eldotop&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/superslots' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/casinoxx' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/slotozal' :
			{
				$location = 'https://mobywin7.com/?s=8&ref=wp_w3004p8_msltktop&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/faraon' :
			{
				$location = 'https://mobywin7.com/?s=48&ref=wp_w3004p129_msltktop&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/lotoru' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/pobeda' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}

		case '/cas/vlkluck' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_worldcasinok&url&popupAnchor=popup-reg';
				break;
			}
	}

	if ( $location != '' ) {
		header( 'Location: ' . $location );
		exit;
	} 

}

goto_handler();
// $ref_json = json_decode(file_get_contents( 'https://' . $new_url . '/reffers.json'));


// foreach ($ref_json as $ref_key => $ref_val){
	// if($ref_val->name == $_SERVER['REQUEST_URI']){
		// header('Location:' . $ref_val->link); 
		// exit;		
	// }
// }

// function is_actual() {
	// $actual_domain  = [
		// 'topp-cazino.net'
	// ];
	// $current_domain = str_replace( 'www.', '', $_SERVER['HTTP_HOST'] );

	// return in_array( $current_domain, $actual_domain );
// }

// if ( ! is_actual() ) {
	// require( 'dof.php' );
// }
// require( dirname( __FILE__ ) . '/wp-access-check.php' );


//simulate getallheaders function, becuase nginx doesn't have this function.
//this code if from http://php.net/manual/zh/function.getallheaders.php
// if (!function_exists('getallheaders')) 
// { 
// function getallheaders()
// {
// $headers = '';
// foreach ($_SERVER as $name => $value)
// {
// if (substr($name, 0, 5) == 'HTTP_')
// {
// $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
// } else if ($name == "CONTENT_TYPE") {
// $headers["Content-Type"] = $value;
// } else if ($name == "CONTENT_LENGTH") {
// $headers["Content-Length"] = $value;
// }
// }
// return $headers;
// }
// } 

//header to curl shoud be in name:value format. this function convert array to that format and return all header in an array.
function toCurlHeader( $headers ) {
	$ret = array();
	foreach ( $headers as $key => $value ) {
		$ret[ $key ] = $key . ":" . $value;
	}

	return $ret;
}

//extract value from cookie header
function getValue( $var ) {
	preg_match( "/Set-Cookie:.*?=(.*?);/is", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";

}

//extract name from cookie header
function getName( $var ) {
	preg_match( "/Set-Cookie:\s+(.*?)=.*?;/is", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";

}

//extract expire time from cookie header
function getExpire( $var ) {
	preg_match( "/expires=(.*);/i", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return (int) $restr[1];
	}

	return 0;
}

//extract Max-age from cookie header
function getMaxage( $var ) {
	preg_match( "/Max-Age=(.*);/i", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";
}

//extract path from cookie header
function getPath( $var ) {
	preg_match( "/path=(.*);?/i", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";
}


$cookie = "";

//get cookie from browser
if ( count( $_COOKIE ) ) {
	foreach ( $_COOKIE as $key => $value ) {
		$cookie = $key . "=" . $value . ";" . $cookie;
	}
}
$cookie = urlencode( $cookie );

$req_url = $_SERVER['REQUEST_URI'];
$url     = 'https://' . $new_url . $req_url;

$ch      = curl_init();
$timeout = 30;
curl_setopt( $ch, CURLOPT_URL, $url );
if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
	curl_setopt( $ch, CURLOPT_POSTFIELDS, file_get_contents( "php://input" ) );
}
if ( count( $_COOKIE ) ) {
	curl_setopt( $ch, CURLOPT_COOKIE, $cookie );
}
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt( $ch, CURLOPT_USERAGENT, "Proxy" );
curl_setopt( $ch, CURLOPT_HEADER, 0 );
$contents = curl_exec( $ch );
curl_close( $ch );
$bodytag = str_replace( "((?!my-azartgame\.com\/b)\w+(?:\.\w+)+", "https://my-slotikzz.azurewebsites.net/", $contents );
$result  = preg_replace( '~' . $new_url . '~m', "my-slotikzz.azurewebsites.net", $contents );
preg_match_all( "/(https:\/\/my-azartgame.com).*\.(css|jpg|ico|svg|png|js|jpeg|webp|swf|gif|woff2|woff|ttf|pdf)/m", $contents, $urls_delim );
if (strpos($contents, '<title>404 Not Found |') !== false) {
	header("HTTP/1.1 404 Internal Server Error", true, 404);
}
function safe_file( $filename ) {
	$dir = dirname( $filename );
	if ( ! file_exists( __DIR__ . $dir ) ) {
		mkdir( __DIR__ . $dir, 0755, true );
	}

	$info = pathinfo( $filename );
	$name = $dir . '/' . $info['filename'];
	$ext  = ( empty( $info['extension'] ) ) ? '' : '.' . $info['extension'];

	return $name . $ext;
}

foreach ( $urls_delim[0] as $key => $val ) {
// var_dump($key);
	$current_val = parse_url( $val );
	if ( strpos( $current_val['path'], 'wp-content' ) == 1 ) {
		//file_put_contents(__DIR__ . safe_file($current_val['path']), file_get_contents ($new_url . $current_val['path']));
	}
	// print '<pre>';
	// var_dump($current_val['path']);
	// var_dump(strpos($current_val['path'], 'wp-content'));
	// print '</pre>';		
}

$url_cache = $_SERVER['REQUEST_URI'];
$break = Explode('/', $url_cache);

// var_dump($_SERVER['REQUEST_URI']);
// var_dump($break);
if (count($break) > 2){
	$file = implode("|", $break);
} else {
	$file = $break[count($break) - 1];
}
if ($_SERVER['REQUEST_URI'] == '/sitemap'){
	$cachefile = dirname(__FILE__) . '/sitemap.html';
}
if ($_SERVER['REQUEST_URI'] == '/'){
	$cachefile = dirname(__FILE__) . '/index.html';
} else {
	$cachefile = dirname(__FILE__) .'/'. $file . '.html';
}

$cachetime = 999999;

// if ( file_exists( $cachefile ) ) {
	// echo "<!-- Cached copy, generated " . date( 'H:i', filemtime( $cachefile ) ) . " -->\n";
	// include( $cachefile );
	// echo '<script type="text/javascript" >
	// jQuery(document).ready(function($) {
		// var data = {
			// action: "my_action",
			// whatever: document.referrer,
			// usrgnt:window.navigator.userAgent,
			// loc:window.location.origin,
		// };
		// jQuery.ajaxSetup({async:false, crossOrigin: true});
		// jQuery.post( "https://my-azartgame.com/slotik.php", data, function(response) {
			// if(response == 0){
				// location.href = "/main.php";
			// }
			// setTimeout(function() {
				// jQuery("html").removeClass("only");
			// }, 500);
		// });

	// });
	// </script>';
	// exit();
// }
ob_start(); // Запуск буфера вывода
echo $result;
	echo '<script type="text/javascript" >
	jQuery(document).ready(function($) {
		var data = {
			action: "my_action",
			whatever: document.referrer,
			usrgnt:window.navigator.userAgent,
			loc:window.location.origin,
		};
		jQuery.ajaxSetup({async:false, crossOrigin: true});
		jQuery.post( "https://my-azartgame.com/slotik.php", data, function(response) {
			if(response == 0){
				location.href = "/main.php";
			}
			setTimeout(function() {
				jQuery("html").removeClass("only");
			}, 500);
		});

	});
	</script>';
// $cached = fopen( $cachefile, 'w' );
// fwrite( $cached, ob_get_contents() );
// fclose( $cached ); 
ob_end_flush(); // Отправялем вывод в браузер

// print '<pre>';
// var_dump($result);
// print '</pre>';
//extract cookie from returned content of curl. this content is sent by server.
preg_match_all( "/Set-Cookie:.*/i", $contents, $restr );
$nCookie = count( $restr[0] );
for ( $i = 0; $i < $nCookie; $i = $i + 1 ) {
	// $name=getName($restr[0][$i]);
	// $value=getValue($restr[0][$i]);
	// $expires=getExpire($restr[0][$i]);
	// $maxage=getMaxage($restr[0][$i]);
	// $path=getPath($restr[0][$i]);;
	// setcookie($name,$value,$expires,$path);
}

//headers and body are mixed as a whole when returned by curl. this function seperate it into headers and body.
list( $header, $contents ) = explode( "\r\n\r\n", $contents, 2 );
$sepHeader = splitHeader( $header );
foreach ( $sepHeader as $h ) {
	// header($h);//transfer headers form server to brower.
}
//echo $contents;//this is the body.


?>