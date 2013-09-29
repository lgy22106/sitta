$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://54.215.228.1/sitta/web/app_dev.php/get",
        data: {
            url: "http://visuallightbox.com/images/demo/main_demo/part1/data/images1/image_lightbox.jpg"
        },
    })
    

});
