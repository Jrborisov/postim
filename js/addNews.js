$(document).ready(function(){
    var defRange;
    var tagRange=$('#ql-editor-1 div:first');
    var textInsert=0;
    var startRange=0;
    var editor = new Quill('#editor-container', {
        formats: ['image','video','object','param','embed'],
        styles: {
            '.ql-editor': {
                'font-family': "'Arial', san-serif",
                'min-height':'150px'
            },
            '.ql-editor a': {
                'text-decoration': 'none',
                'color':'black'
            },
            '.ql-editor img': {
                'width': '20%',
                'height':'20%',
                'display':'block'
            },
            '.ql-editor embed': {
                'display':'block',
                'width': '200px',
                'height':'100px'

            }

        }

    });
    editor.on('selection-change', function(range) {
        if(!range.start){
            defRange=range.start;
            startRange=defRange;
        }

    });
    editor.on('text-change', function(delta, source) {

        rangeNew=window.getSelection().anchorNode;
        tagRange=rangeNew;
        textInsert=delta.ops[delta.ops.length-1].insert;
        if(textInsert==undefined){
            textInsert="";
        }
        if(delta.ops[0].retain){
            startRange=defRange+delta.ops[0].retain;
        }
        console.log('text-change', delta, source)
    });

    $.fn.pasteEvents = function( delay ) {
        if (delay == undefined) delay = 0;
        return $(this).each(function() {
            var $el = $(this);
            $el.on("paste", function() {
                $el.trigger("prepaste");
                setTimeout(function() { $el.trigger("postpaste"); }, delay);
            });
        });
    };

    $('.addVideo').click(function(){

        $('.parent_box_insert_video').show();
        /*$(tagRange).after('<embed src="https://www.youtube.com/v/c1hQbCoO4Qs?version=3&autoplay=0"'+
        'type="application/x-shockwave-flash"'+
        'allowscriptaccess="always"'+
        'width="200px" height="100px"></embed>');*/

    });
    $(".href-video-input").on("postpaste", function()
        {
            var linkToTheVideo=$(this).val();
            //проверяем подходит ли ссылка

            var RegulExpLink=/(https:\/\/www.youtube.com\/watch\?v=.*?)|(https:\/\/youtu.be\/.*?)/;
            if(RegulExpLink.test(linkToTheVideo)){
               var idToTheVideo=linkToTheVideo.replace(RegulExpLink,'');
            $(tagRange).after('<embed src="https://www.youtube.com/v/'+idToTheVideo+'?version=3&autoplay=0"'+
                'type="application/x-shockwave-flash"'+
                'allowscriptaccess="always"'+
                'width="200px" height="100px"></embed>');
                $(this).val('');
                $('.parent_box_insert_video').hide();
            }

        }
    ).pasteEvents();

    /*$("#ql-editor-1").bind("paste", function(e) // до вставки
    {

    });*/

    $("#ql-editor-1").click(function(){
        var range = editor.getSelection();
        startRange=range.start;
        rangeNew=window.getSelection().anchorNode;
        tagRange=rangeNew;

    });

     $("#ql-editor-1").on("postpaste", function()
     {
        InsertImg(textInsert);

     }
     ).pasteEvents();

 function InsertImg(delta){
     var text=delta ;
     pattern = /(https?|http|ftp):\/\/.*?(.jpg|.png|.gif|.jpeg)/;
     if (pattern.test(text.toLowerCase())) { // если вставляют картинку
         var ImgSrc = text;
         loadImgToServer(ImgSrc);
     }
 }


    function loadImgToServer(src){
        $.ajax({
            url: "addnews/AddImg",
            type: "POST",
            data: "imgName="+src,
            async:true,
            success: function(data){
                if(data!=''){
                    if(data!="Ошибка"){
                        editor.insertEmbed(startRange, 'image', data);
                    }

                }
            },
            error: function(){

            }
        });
    }


// загрузка через кнопку..
    $('.photo-file').change(function(){
        var formaImgAdd=new FormData();
        formaImgAdd.append("imgName",this.files[0]);
        $.ajax({
            url:"addnews/AddImgfile",
            type: "POST",
            data: formaImgAdd,
            async:false,
            processData: false,
            contentType: false,
            success: function(data){
                if(data!=''){
                    var lengthText=-5;
                    if(textInsert.length==undefined){
                        lengthText=0;
                    }else{
                        lengthText=textInsert.length;
                    }
                       if(lengthText==-5){
                           lengthText=0;
                       }
                    alert(startRange+" fdsf"+lengthText+data);
                    editor.insertEmbed(startRange+lengthText, 'image', data);
                }
            }
        });
    } );


$('.close_box_insert_video').click(function(){
    $('.parent_box_insert_video').hide();

});


});

