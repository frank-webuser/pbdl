<head>
	<meta name="viewport" content="width=device-width; initial-scale=1">
	<meta charset="utf-8">
	<link type="text/css" href="/css/style.css" rel="stylesheet">
	<link href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
</head>
<?php
	require_once "utils.php";
	$root = $_SERVER["DOCUMENT_ROOT"];
	$path = $_SERVER["REQUEST_URI"];
	/* echo $root;
	echo "<br>";
	echo $path;
	echo "<br>"; */
	$full_path = ( $root . "share" .$path );
	if ( is_dir( $full_path ) && substr( $path, -1 ) != "/" ) {
		$path = $path . "/";
	};
	/* echo $path;
	echo "<br>"; */
	$full_path = ( $root . "share" .$path );
	// echo $full_path;
	if ( is_dir( $full_path ) ) {
		$content = parse_folder( scandir( $full_path ) );
		list_folder( $content );
	} else {
		include "404.php";
	};
?>