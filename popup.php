<?php require_once "locale.php"; ?>
<div id="reveal-dialog" class="dialog-bg">
    <div class="dialog">
        <div class="dialog-title"><?php echo t( 'preview' ); ?><div class="dialog-close"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512" class="dialog-close-mark"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></div></div>
        <div class="dialog-preview photo-preview"><img id="photo-preview" src="share/bruh/portfolio.jpg" alt="preview"></img></div>
        <div class="dialog-preview text-preview" id="text-preview"></div>
        <iframe class="dialog-preview webpage-preview" src="" id="webpage-preview" title="webpage-preview"></iframe>
        <div class="dialog-preview audio-preview"><audio controls id="audio-preview" src=""></div>
        <div class="dialog-preview video-preview"><video controls id="video-preview" src=""></div>
        <a id="download" class="dialog-download btn" download="" href=""><i class="fa fa-fw fa-download"></i><?php echo t( 'download' ); ?></a>
    </div>
</div>