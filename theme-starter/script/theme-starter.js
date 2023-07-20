(function($){

    $(document).ready(function(){
        initHeaderMenu();
        initDropDownButtons();
    });

    function initHeaderMenu(){
        $('.header-menu-button').on('click', function(e){
            e.preventDefault();

            $('body').toggleClass('header-mobile-menu-open');
        });
    }

    function initDropDownButtons(){

        $('.header-menu > li.menu-item-has-children').addClass('sub-menu-closed');
        $('.header-menu > li.menu-item-has-children.current-menu-ancestor').removeClass('sub-menu-closed');

        $('.expand-sub-menu-button').on('click', function(e){
            e.preventDefault();
            $(this).parent().parent('li').toggleClass('sub-menu-closed');
        });
    }



})(jQuery);