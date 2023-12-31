<?php
	require_once "locale.php";
	function fa( $logo ) {
		return '<i class="fa fa-fw fa-' . $logo . '"></i>&nbsp;';
	};

	function get_filetype( $type ) {
		$types = Array(
			"png" => "photo",
			"jpg" => "photo",
			"jpeg" => "photo",
			"bmp" => "photo",
			"zip" => "archive",
			"rar" => "archive",
			"7z" => "archive",
			"tar" => "archive",
			"gz" => "archive",
			"bz2" => "archive",
			"xz" => "archive",
			"txt" => "text",
			"pdf" => "doc",
			"doc" => "doc",
			"docx" => "doc",
			"xls" => "excel",
			"xlsx" => "excel",
			"ppt" => "ppt",
			"pptx" => "ppt",
			"mp3" => "audio",
			"wav" => "audio",
			"flac" => "audio",
			"wma" => "audio",
			"mp4" => "video",
			"mov" => "video",
			"mpg" => "video",
			"mpeg" => "video",
			"avi" => "video",
			"wmv" => "video",
			"html" => "webpage",
			"htm" => "webpage",
			"php" => "dwebpage",
			"css" => "stylesheet",
			"js" => "js",
			"py" => "python",
			"java" => "code",
			"jar" => "archive",
			"c" => "code",
			"cpp" => "cpp",
			"htaccess" => "htaccess"
		);
		if ( array_key_exists( $type, $types ) ) {
			$get_type = t( $types[ $type ] );
			if ( substr( $get_type, 0, 1 ) == "*" ) {
				return substr( $get_type, 1 );
			} else {
				return strtoupper( $type ) . ' ' .  $get_type;
			};
		} else {
			return strtoupper( $type ) .  ' ' . t( 'file' );
		};
	};

	function get_filelogo( $type ) {
		$types = Array(
			"png" => "file-photo-o png",
			"jpg" => "file-photo-o",
			"jpeg" => "file-photo-o",
			"bmp" => "file-photo-o",
			"zip" => "file-zip-o",
			"rar" => "file-zip-o",
			"7z" => "file-zip-o",
			"tar" => "file-zip-o",
			"gz" => "file-zip-o",
			"bz2" => "file-zip-o",
			"xz" => "file-zip-o",
			"txt" => "file-text-o",
			"pdf" => "file-pdf-o",
			"doc" => "file-word-o",
			"docx" => "file-word-o",
			"xls" => "file-excel-o",
			"xlsx" => "file-excel-o",
			"ppt" => "file-powerpoint-o",
			"pptx" => "file-powerpoint-o",
			"mp3" => "file-audio-o",
			"wav" => "file-audio-o",
			"flac" => "file-audio-o",
			"wma" => "file-audio-o",
			"mp4" => "file-video-o",
			"mov" => "file-video-o",
			"mpg" => "file-video-o",
			"mpeg" => "file-video-o",
			"avi" => "file-video-o",
			"wmv" => "file-video-o",
			"html" => "file-code-o webpage",
			"htm" => "file-code-o webpage",
			"php" => "file-code-o webpage",
			"css" => "file-code-o",
			"js" => "file-code-o",
			"py" => "file-code-o",
			"java" => "file-code-o",
			"jar" => "file-zip-o",
			"c" => "file-code-o",
			"cpp" => "file-code-o",
			"htaccess" => "file-code-o"
		);
		if ( array_key_exists( $type, $types ) ) {
			return $types[ $type ];
		} else {
			return "file-o";
		};
	};

	function parse_filesize($num) {
	$p = 0;
	$format = 'B';
	if( $num > 0 && $num < 1024 ) {
	$p = 1;
	return number_format($num) . ' ' . $format;
	}
	if( $num >= 1024 && $num < pow(2, 20) ){   
	$p = 10;
	$format = 'KB';
	}
	if ( $num >= pow(2, 20) && $num < pow(2, 30) ) {
	$p = 20;
	$format = 'MB';
	}
	if ( $num >= pow(2, 30) && $num < pow(2, 40) ) {
	$p = 30;
	$format = 'GB';
	}
	if ( $num >= pow(2, 40) && $num < pow(2, 50) ) {
	$p = 40;
	$format = 'TB';
	}
	$num /= pow(2, $p);
	return number_format($num, 3) . ' ' . $format;
	}

	class Utils {

		protected string $root;
		protected string $path;
		protected string $full_path;
		protected array $path_content;
		protected array $parsed_path_content;
		public bool $path_exists;

		public function __construct( $path ) {
			$this->root = $_SERVER["DOCUMENT_ROOT"];
			if( substr( $this->root,-1 ) !== "/") {
				$this->root .= "/";
			};
			$this->path = $path;
			if ( substr( $this->path,-1) !== "/") {
				$this->path .= "/";
			};
			$this->full_path = ( $this->root . "share" .$path );
			if ( substr( $this->full_path,-1) !== "/") {
				$this->full_path .= "/";
			};
			if( is_dir( $this->full_path ) ) {
				$this->path_exists = true;
				$this->path_content = scandir( $this->full_path );
			} else {
				$this->path_exists = false;
			}
			// echo $this->root, PHP_EOL, $this->path, PHP_EOL, $this->full_path, PHP_EOL;
		}

		public function parse_folder() {
			$result_a = Array();
			$result_b = Array();
			foreach ( $this->path_content as $item ) {
				if ( $item != ".") {
					$full_item = $this->full_path . $item;
					$isdir = is_dir( $full_item );
					$type_arr = explode( '.', $item );
					$ext = $type_arr[array_key_last( $type_arr )];
					$tmp = t( 'folder' );
					if ( count( $type_arr ) > 1 ) {
						$type = get_filetype( $ext );
					} else {
						$type = t( 'file' );
					};
					if( $isdir ) {
						array_push( $result_a, Array( 
							'name' => $item,
							'type' => $tmp,
							'isdir' => 1,
							'size' => "-",
							'icon' => 'folder'
						) );
					} else {
						$size = parse_filesize( filesize( $full_item ) );
						$have_ext = count( $type_arr ) - 1;
						$logo = 'file-o';
						if ( $have_ext ) {
							$logo =	get_filelogo( $ext );
						};
						array_push( $result_b, Array(
							'name' => $item,
							'type' => $type,
							'isdir' => 0,
							'size' => $size,
							'icon' => $logo
						) );
					};
				};
			};
			$this->parsed_path_content = array_merge( $result_a, $result_b );
		}

		public function list_folder() {
			echo '<table border="0" cellspacing="0" cellpadding="0"><tr><th>' . t( 'name' ) . '</th><th>' . t( 'type' ) . '</th><th>' . t( 'size' ) . '</th></tr>';
			foreach ( $this->parsed_path_content as $items ) {
					$item = $items['name'];
					$isdir = $items['isdir'];
					$prefix = "";
					$type = $items['type'];
					$icon = $items['icon'];
					$size = $items['size'];
					if ( !$isdir ) {
						$prefix =  "/share";
					};
					$target = '<span class="target">' . $prefix . $this->path . $item . '</span>';
					echo "<tr>";
					echo "<td>";
					// var_dump( $items );
					if ( $item == ".." ) {
						echo $target;
						echo fa( $icon ) . t( 'parent' );
					} else {
						if ( $isdir ) {
							echo $target;
							echo fa( $icon );
						} else {
						// echo '<a href="' . $prefix . $path . $item . '" download="' . $item . '" target="view_window">';
							echo $target;
							echo fa( $icon );
						};
						echo '<span class="name">' . $item . '</span>';
					};
					echo "</td>";
					echo "<td>", $type;
					echo "</td>";
					echo "<td>";
					echo $size;
					echo "</td>";
					echo "</tr>";
			};
			echo "</table>";
		}
		
	};
?>