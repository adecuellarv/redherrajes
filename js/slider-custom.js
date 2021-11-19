jQuery(document).ready(function () {
    if (jQuery(window).width() < 711) {
        changeVid(true);
    } else {
        changeVid(false);
    }
});
/*
jQuery(window).resize(function () {
    if (jQuery(window).width() < 900) {
        changeVid(true);
    }else{
        changeVid(false);
    }
});*/

function changeVid(mobile) {
    /*
    var video = document.getElementById('videoid');
    if (mobile) {
        video.setAttribute("src", 'https://www.monorama.com.mx/redherrajes/wp-content/themes/redherrajes/video/video_responsivo.webm');
    } else {
        video.setAttribute("src", 'https://www.monorama.com.mx/redherrajes/wp-content/themes/redherrajes/video/CorporateLogoHD_Red_de_Herrajes.webm');
    }
    //video.load();*/
}



