$(document).ready(function(){
    var timer;
    $('#icon-profile').click(function(){
        $('#menu-profile-parent').toggle();
        $(this).toggleClass('icon-profile-active');

    });

    $('#menu-profile').mouseout(function(){
            var $test = $('#menu-profile');
            var $test2=$('#icon-profile');
             timer= setTimeout(function() {
                if ($test.is(':hover') || ($test2.is(':hover')) ){

                }else{
                    $('#menu-profile-parent').hide();
                    $('#icon-profile').removeClass('icon-profile-active');
                }
            },1500);

        }
    );

    $('html').click(function(){
        var $test = $('#menu-profile');
        var $test2=$('#icon-profile');
        if ($test.is(':hover') || ($test2.is(':hover')) ){

        }else{
            $('#menu-profile-parent').hide();
            $('#icon-profile').removeClass('icon-profile-active');
        }

    });
    $('#menu-profile').mouseover(function(){
            clearTimeout(timer);

        }
    );
    $('#icon-profile').mouseout(function(){
            var $test = $('#menu-profile');
            var $test2=$('#icon-profile');
            timer= setTimeout(function() {
                if ($test.is(':hover') || ($test2.is(':hover')) ){

                }else{
                    $('#menu-profile-parent').hide();
                    $('#icon-profile').removeClass('icon-profile-active');
                }
            },1500);

        }
    );
    $('#icon-profile').mouseover(function(){
            clearTimeout(timer);

        }
    );


});
