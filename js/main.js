function main() {
    $("tr").click(function(){
        $("tr").removeClass("active");
        $(this).addClass("active");
    })
    $("tr").dblclick(function(){
        $(".dialog-preview").hide();
        $("#download").show();
        var target = $(this).find("span.target").eq(0).text();
        var logo = $(this).find("i.fa").eq(0)
        var is_image = logo.hasClass("fa-file-photo-o");
        var is_text = logo.hasClass("fa-file-text-o") || logo.hasClass("fa-file-code-o");
        var is_webpage = logo.hasClass("webpage");
        var is_audio = logo.hasClass("fa-file-audio-o");
        var is_video = logo.hasClass("fa-file-video-o");
        $("#download").attr( 'href', target );
        $("#download").attr( 'download', $(this).find("span.name").eq(0).text())
        if( is_image ) {
            $(".photo-preview").show();
            $("#photo-preview").attr( 'src', target );
            $(".dialog-bg").toggle();
        } else if( is_text && !is_webpage ) {
            $(".text-preview").show();
            $.get( target, function(data){
                $("#text-preview").text(data);
            });
            $(".dialog-bg").toggle();
        } else if( is_webpage ) {
            $(".webpage-preview").show();
            $("#download").hide();
            $("#webpage-preview").attr( 'src', target );
            $(".dialog-bg").toggle();
        } else if( is_audio ) {
            $(".audio-preview").show();
            $("#audio-preview").attr( 'src', target );
            $(".dialog-bg").toggle();
        } else if( is_video ) {
            $(".video-preview").show();
            $("#video-preview").attr( 'src', target );
            $(".dialog-bg").toggle();
        } else {
            window.location.href = target;
        };
    });
    $(".dialog-close").click(function(){
        $(".dialog-bg").toggle();
    })
}
$(document).ready(main);