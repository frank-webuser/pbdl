<?php
    $translations = Array(
        'en' => Array(
            'credit' => 'Powered by pbdl&nbsp;|&nbsp<a href="https://github.com/frank-webuser/pbdl" class="footer-link" target="_blank">View on GitHub</a>',
            'type' => 'File type',
            'size' => 'File size',
            'name' => 'File name',
            'parent' => 'Parent directory',
            'root' => 'Back to document root',
            'photo' => 'Image',
            'audio' => 'Audio',
            'video' => 'Video',
            'archive' => 'Archive',
            'text' => '*Pure text',
            'code' => 'Source code',
            'js' => '*Javascript Source code',
            'webpage' => '*Web page',
            'dwebpage' => '*Dynamic web page',
            'stylesheet' => '*Stylesheet',
            'python' => '*Python Source code',
            'cpp' => '*CPP Source code',
            'htaccess' => '*Apache rules',
            'doc' => 'Document',
            'excel' => 'Spreadsheet',
            'ppt' => 'Presentation',
            'file' => 'File',
            'folder' => 'Folder',
            'preview' => 'Preview',
            'download' => 'Download',
            'close' => 'Close'
        ),
        'zh' => Array(
            'credit' => '由pbdl驱动&nbsp;|&nbsp;<a href="https://github.com/frank-webuser/pbdl" class="footer-link" target="_blank">在GitHub上查看</a>',
            'type' => '文件类型',
            'size' => '文件大小',
            'name' => '文件名',
            'parent' => '上级目录',
            'root' => '返回根目录',
            'photo' => '图像',
            'audio' => '音频',
            'video' => '视频',
            'archive' => '归档',
            'text' => '*文本文件',
            'code' => '源代码',
            'js' => '*Javascript 源代码',
            'webpage' => '*网页',
            'dwebpage' => '*动态网页',
            'stylesheet' => '*样式表',
            'python' => '*Python 源代码',
            'cpp' => '*CPP 源代码',
            'htaccess' => '*Apache规则集',
            'doc' => '文档',
            'excel' => '表格',
            'ppt' => '演示',
            'file' => '文件',
            'folder' => '文件夹',
            'preview' => '预览',
            'download' => '下载',
            'close' => '关闭'
        ),
    );

    function t( $key ) {
        global $translations;
        $locale = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
        if( key_exists( $locale, $translations ) ){
            if( key_exists( $key, $translations[$locale] ) ){
                return $translations[$locale][$key];
            } else {
                return $key;
            };
        } else {
            if( key_exists( $key, $translations['en'] ) ){
                return $translations['en'][$key];
            } else {
                return $key;
            };    
        }
    };