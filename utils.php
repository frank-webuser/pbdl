<?php
	function rs( $str ) {
		return substr( $str, 0, -1 );
	};
	
	function fa( $logo ) {
		return '<i class="fa fa-fw fa-' . $logo . '"></i>&nbsp;';
	};
	
	function get_filetype( $type ) {
		$types = Array(
			"png" => "图片",
			"jpg" => "图片",
			"jpeg" => "图片",
			"bmp" => "图片",
			"zip" => "归档",
			"rar" => "归档",
			"7z" => "归档",
			"tar" => "归档",
			"gz" => "归档",
			"bz2" => "归档",
			"xz" => "归档",
			"txt" => "*文本文件",
			"pdf" => "文档",
			"doc" => "文档",
			"docx" => "文档",
			"xls" => "表格",
			"xlsx" => "表格",
			"ppt" => "演示",
			"pptx" => "演示",
			"mp3" => "音频",
			"wav" => "音频",
			"flac" => "音频",
			"wma" => "音频",
			"mp4" => "视频",
			"mov" => "视频",
			"mpg" => "视频",
			"mpeg" => "视频",
			"avi" => "视频",
			"wmv" => "视频",
			"html" => "*网页",
			"htm" => "*网页",
			"php" => "*动态网页",
			"css" => "*样式表",
			"js" => "*JavaScript源代码",
			"py" => "*Python源代码",
			"java" => "源代码",
			"jar" => "归档",
			"c" => "源代码",
			"cpp" => "*C++源代码",
			"htaccess" => "规则文件"
		);
		if ( array_key_exists( $type, $types ) ) {
			if ( substr( $types[ $type ], 0, 1 ) == "*" ) {
				return substr( $types[ $type ], 1 );
			} else {
				return strtoupper( $type ) .  $types[ $type ];
			};
		} else {
			return strtoupper( $type ) . "文件";
		};
	};
	
	function get_filelogo( $type ) {
		$types = Array(
			"png" => "file-photo-o",
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
			"html" => "file-code-o",
			"htm" => "file-code-o",
			"php" => "file-code-o",
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
			return fa( $types[ $type ] );
		} else {
			return fa( "file-o" );
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

	function parse_folder( $content ) {
		global $full_path;
		global $path;
		$result_a = Array();
		$result_b = Array();
		foreach ( $content as $item ) {
			if ( $item != ".") {
				$full_item = $full_path . $item;
				$isdir = is_dir( $full_item );
				$type_arr = explode( '.', $item );
				if ( count( $type_arr ) > 1 ) {
					$type = $type_arr[array_key_last( $type_arr )];
				};
				if( $isdir ) {
					array_push( $result_a, Array( $item, "folder", 1, "-", 0 ) );
				} else {
					$size = parse_filesize( filesize( $full_item ) );
					$have_ext = count( $type_arr ) - 1;
					array_push( $result_b, Array( $item, $type, 0, $size, $have_ext ) );
				};
			};
		};
		return array_merge( $result_a, $result_b );
	};
	
	function list_folder( $content ) {
		// print_r( $content );
		global $full_path;
		global $path;
		echo "<table><tr><th>文件名</th><th>类型</th><th>文件大小</th></tr>";
		foreach ( $content as $items ) {
				$item = $items[0];
				$isdir = $items[2];
				$prefix = "";
				$type = $items[1];
				echo "<tr>";
				echo "<td>";
				if ( !$isdir ) {
					$prefix =  "/share";
				};
				if ( $item == ".." ) {
					echo '<a href="' . $prefix . $path . $item . '">';
					echo fa( "folder-o" ) . "上级目录";
				} else {
					if ( $isdir ) {
						echo '<a href="' . $prefix . $path . $item . '">';
						echo fa( "folder-o" );
					} else {
					// echo '<a href="' . $prefix . $path . $item . '" download="' . $item . '" target="view_window">';
						echo '<a href="' . $prefix . $path . $item . '">';
						echo get_filelogo( $type );
					};
					echo $item;
				};
				echo "</a>";
				echo "</td>";
				echo "<td>";
				if ( !$isdir ) {
					if( $items[4] ) {
						echo get_filetype( $type );
					} else {
						echo "文件";
					};
				} else {
					echo "文件夹";
				};
				echo "</td>";
				echo "<td>";
				echo $items[3];
				echo "</td>";
				echo "</tr>";
		};
		echo "</table>";
	};
?>