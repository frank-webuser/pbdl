<?php
	require_once "utils.php";
	include "header.php";
	include "popup.php";
	/* $root = $_SERVER["DOCUMENT_ROOT"];
	$path = $_SERVER["REQUEST_URI"];
	if ( substr( $root, -1 ) != "/" ) {
		$root .= "/";
	}; */
	/* echo $root;
	echo "<br>";
	echo $path;
	echo "<br>"; */
	//$full_path = ( $root . "share" .$path );
	/* if ( is_dir( $full_path ) && substr( $path, -1 ) != "/" ) {
		$path = $path . "/";
	}; */
	/* echo $path;
	echo "<br>"; */
	/* $full_path = ( $root . "share" .$path ); */
	// echo $full_path;
	$main = new Utils( $_SERVER["REQUEST_URI"] );
	if ( $main->path_exists ) {
		$main->parse_folder();
		$main->list_folder();
	} else {
		include "404.php";
	};
	include "footer.php";
?>