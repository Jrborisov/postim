
function deleteCharsOver(str,n){
    var newstr='';
   for(var i=0;i<str.length-n;i++){
      newstr+=str[i];
   }
   return newstr;
}
$(document).ready(function(){

 $('#enterbutton').click(function(){
     if($('#parent_popup').is(':visible') ||$('#parent_popup2').is(':visible') ){
        $(this).css('background-color','#524a5f');
     }

 });

 $(document).on('mouseover','.close', function(){
                $('.close img').attr('src','/images/closeHover.png')
            });
 $(document).on('mouseout','.close',function(){
     $('.close img').attr('src','/images/close.png')
 });

        $('input[name=button]').hover( function(){
                $(this).css('background-color','#2B2535');
            },
            function(){
                $(this).css('background-color','#7A7189');
            }
        );
$('.authorization-button').hover( function(){
                $(this).css('background-color','#2B2535');
            },
            function(){
                $(this).css('background-color','#7A7189');
            }
        );
        
$('.authorization').hover( function(){
    $(this).css('background-color','#2B2535');
    },
    function(){
      $(this).css('background-color','#7A7189');
    }
);
$('.registration').hover( function(){
        $(this).css('background-color','#2B2535');
    },
    function(){
        $(this).css('background-color','#7A7189');
    }  );

 $('.registration-button').hover( function(){
     $(this).css('background-color','#2B2535');
      },
      function(){
         $(this).css('background-color','#7A7189');
          });
$('.imgSocial').mouseover(function(){
var src=$(this).attr('src');
src=deleteCharsOver(src,4)+'-hover.png';
$(this).attr('src',src);
}
    );

 $('.imgSocial').mouseout(function(){
     var src=$(this).attr('src');
     src=deleteCharsOver(src,10)+'.png';
     $(this).attr('src',src);
      }
        );

}
);
