$(document).ready(function(){
    $('.fileinput').change(function(){
        var send_url = "site/Imgload";
        var fd = new FormData();

        console.log(this.files);

        fd.append("file", this.files[0]);

        $.ajax({
            url: send_url,
            type: "POST",
            data: fd,
            async:false,
            processData: false,
            contentType: false,
            success: function(data){
                if(data!=''){


                    $('.setting-profile img').attr('src',data+'big_photo.png?'+Math.floor((Math.random() * 1000) + 44));
                    $('#icon-profile img').attr('src',data+'icon_photo.png?'+Math.floor((Math.random() * 1000) + 33));
                }
            }
        });
    });

});
