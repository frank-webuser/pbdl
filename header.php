<?php require_once "locale.php"; ?>
<html lang="<?php echo explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] )[0]; ?>">

<head>
    <title><?php echo $_SERVER['SERVER_NAME']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link href="/css/colors.css" rel="stylesheet">
    <link href="/css/dark.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
	<link href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/main.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <a class="header-link" href="/" title="<?php echo t( 'root' ) ?>"><i class="fa fa-fw fa-home"></i></a>
            <a class="header-link" href=".." title="<?php echo t( 'parent' ) ?>"><i class="fa fa-fw fa-arrow-up"></i></a>
            <span class="header-server-name">
                <?php
                    $path = $_SERVER['REQUEST_URI'];
                    $tmp = explode('/', $path);
                    if(strlen($path) > 1) {
                        echo $tmp[array_key_last($tmp)];
                    } else {
                        echo $_SERVER['SERVER_NAME'];
                    };
                ?>
            </span>
        </div>
        <div class="main">
