<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/webcam/excanvas.js"></script>
<script type="text/javascript" src="js/webcam/jquery.webcam.js"></script>

<script>
	$("#preview .close").click(function(){
    $("#buttons .save_profile_pic").attr('disabled',true);
    $('.timer').hide();
    $('#preview').hide();
    $('#previewImg').attr('src',baseurl+'img/preload.gif');
    $('.click').show();
});
 
var profileImage = null;
$("#buttons .save_profile_pic").click(function(){
 
    $.post(baseurl+"save_image_from_webcam.php",
    { image: profileImage},
    function(data){
        window.location = 'save_image_from_webcam.php';
    });
});
 
function capturePic(){
    $('.click').hide();
    $('.timer').show();
    webcam.capture(3);
}
 
function webcam_init() {
    var pos = 0, ctx = null, saveCB, image = [];
    var canvas = document.createElement("canvas");
    canvas.setAttribute('width', 320);
    canvas.setAttribute('height', 240);
 
        if (canvas.toDataURL) {
            ctx = canvas.getContext("2d");
 
            image = ctx.getImageData(0, 0, 320, 240);
 
            saveCB = function(data) {
 
                var col = data.split(";");
                var img = image;
 
                for(var i = 0; i < 320; i++) {
                    var tmp = parseInt(col[i]);
                    img.data[pos + 0] = (tmp >> 16) & 0xff;
                    img.data[pos + 1] = (tmp >> 8) & 0xff;
                    img.data[pos + 2] = tmp & 0xff;
                    img.data[pos + 3] = 0xff;
                    pos+= 4;
                }
 
                if (pos >= 4 * 320 * 240) {
                    ctx.putImageData(img, 0, 0);
                    $('#preview').show();
                    $.post(baseurl+"save_image_from_webcam.php", {type: "data", image: canvas.toDataURL("image/png")},function(data){
                        $("#buttons .save_profile_pic").attr('disabled',false);
                        profileImage = data;
                        $('#previewImg').attr('src',''+baseurl+data);
                    });
                    pos = 0;
                }
            };
        }else{
 
            saveCB = function(data) {
                image.push(data);
 
                pos+= 4 * 320;
 
                if (pos >= 4 * 320 * 240) {
                        $('#preview').show();
                        $.post(baseurl+"save_image_from_webcam.php", {type: "pixel", image: image.join('|')},function(data){
                            $("#buttons .save_profile_pic").attr('disabled',false);
                            profileImage = data;
                            $('#previewImg').attr('src',''+baseurl+data);
                        });
                        pos = 0;
                        image = [];
                }
            }
        }
 
        $("#webcam").webcam({
                width: 320,
                height: 240,
                mode: "callback",
                swffile: baseurl+"js/webcam/jscam_canvas_only.swf",
 
                onSave: saveCB,
 
                onCapture: function () {
 
                    jQuery("#flash").css("display", "block");
                    jQuery("#flash").fadeOut("fast", function () {
                        jQuery("#flash").css("opacity", 1);
                    });
 
                    webcam.save();
                },
 
                onTick: function(remain) {
                    $('.timer').show();
 
                    if (0 == remain) {
                        $('.timer').hide();
                    } else {
                        jQuery(".timer").text(remain);
                    }
                },
 
                debug: function (type, string) {
                        if(type == 'error'){
                            $("#nocamera").show();
                        }else{
                            $("#nocamera").hide();
                        }
 
                },
 
                onLoad: function() {
                    //var cams = webcam.getCameraList();
                }
        });
 
}
 
(function ($) {
    webcam_init();
})(jQuery);

</script>

</head>

<body>

<div id="cambox" >
    <div id="webcam"></div>
    <div id="tiktik">
        <span class="timer">3</span>
        <span class="click"><img alt="take photo" src="img/camera_icon.png" onclick="capturePic()" /></span>
    </div>
    <div id="nocamera">
        <div class="message">
            Video has not detected any available cameras on your system. Please connect a camera and try again.
        </div>
    </div>
    <div id="preview">
        <img id="previewImg" alt="preview Image" height="240" width="320" src="img/preload.gif" />
        <span class="close"></span>
    </div>
</div>





<style>

	#cambox{
        position:relative;
        width:450px;
        height: 320px;
        margin: 0 auto;
    }
 
    #webcam, #preview, #nocamera {
        position:absolute;
        margin:10px 20px;
        margin-left:60px;
        width: 320px;
        height: 240px;
        border:5px solid #999;
        background:#eee;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
 
    #webcam {
        z-index:2000;
    }
 
    #preview {
        display:none;
        z-index:5000;
    }
 
    #nocamera {
        display:none;
        z-index:9900;
    }
 
    #buttons{
        position:absolute;
        bottom:0;
        right:165px;
        z-index:100;
    }
 
    #flash {
        position:absolute;
        top:0px;
        left:0px;
        z-index:5000;
        width:100%;
        height:500px;
        background-color:#c00;
        display:none;
    }
 
    object {
        display:block;
        position:relative;
        z-index:1000;
    }
 
    #tiktik{
        position:absolute;
        margin-left:67px;
        height:40px;
        z-index:2100;
        top:220px;cursor:pointer;
        background:transparent;
    }
 
    .message{
        padding:80px 10px;
    }
 
    .timer{
        font-size:26px;
        font-weight:bold;
        color:#fff;
        padding-left:153px;
        display:none;
    }
 
    .click{
        padding-left:135px;
    }
 
    .close{
        position: absolute;
        right: 0;
        color:#fff;
        top: 0;
        cursor:pointer;width:22px;height:22px;display:block;background:url(img/close_video_icon.png) top;
    }
    .close:hover{
        position: absolute;
        right: 0;
        color:#fff;
        top: 0;
        cursor:pointer;width:22px;height:22px;display:block;background:url(img/close_video_icon.png) bottom;
    }

</style>

</body>
</html>