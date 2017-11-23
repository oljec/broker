$(document).ready(function(){
    console.log('index.js is loaded');

    // add animation on dropDown menu
    $('.main-nav__item').hover(
        function () {
            var tabName = $(this).attr('data-tab');

            $('.main-nav__link[data-tab=' + tabName + ']').addClass('main-nav__link_active');
            // $('.drop-menu[data-tab=' + tabName + ']').css('height', '241px');
            $('.drop-menu[data-tab=' + tabName + ']').css('height', '260px');
        },
        function () {
            var tabName = $(this).attr('data-tab');

            $('.main-nav__link[data-tab=' + tabName + ']').removeClass('main-nav__link_active');
            $('.drop-menu[data-tab=' + tabName + ']').css('height', '0px');
        }
    );

    // add animation on curtain for services
    $('.services__item').hover(
        function () {
            var servId = $(this).attr('data-servId');

            $('.curtain[data-servId=' + servId + ']').css('width', '100%');
        },
        function () {
            var servId = $(this).attr('data-servId');

            $('.curtain[data-servId=' + servId + ']').css('width', '0');
        }
    );

    //animation on ask-question button
    formAppearing({
        class: 'question',
        height: '400px',
        button: $('#ask-question__button')
    });

    //animation on service button
    formAppearing({
        class: 'service',
        button: $('#service-container__button')
    });

    //animation for documents img
    $('.document__img').click(function(){
        console.log('document__img is clicked');

        var docId = $(this).attr('data-docId');

        $('.document__mask[data-docId=' + docId + ']').css('visibility', 'visible');

        $(document).mouseup(function(){
            $('.document__mask[data-docId=' + docId + ']').css('visibility', 'hidden');
        });
    });

});


function formAppearing(data){
    var divNotClose = $('.form-' + data.class + '__content');
    var divToClose = $('.form-' + data.class);
    var button = data.button;
    var height = ('height' in data) ? data.height : 0;

    button.click(function(){
        console.log(data.class + ' button is clicked');

        $('.forms__input').val('');
        $('.forms__text-area').val('');

        $(divToClose).css('visibility', 'visible');
        if (height) {
            $(divNotClose).css('height', height);
        }

        $(document).mouseup(function (e){
            if (divToClose.is(e.target)
                && !divNotClose.is(e.target)
                && divNotClose.has(e.target).length === 0) {
                $(divToClose).css('visibility', 'hidden');
                if (height) {
                    $(divNotClose).css('height', '0');
                }
            }
        });
    });
}