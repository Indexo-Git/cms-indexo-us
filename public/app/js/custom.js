(function($) {
    'use strict';
    $(document).ready(function() {
        $('.show-password').click( function (e){
            let icon = $('#eye-password');
            console.log(icon.hasClass('text-muted'));
            if(icon.hasClass('text-muted')){
                icon.removeClass('text-muted').addClass('text-primary');
            } else{
                icon.removeClass('text-primary').addClass('text-muted');
            }
            $('.input-password').each(function(index, currentElement){
                if(currentElement.type === 'password'){
                    currentElement.type = 'text';
                } else{
                    currentElement.type = 'password';
                }
            });
        });
    });
}(jQuery));
