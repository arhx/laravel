window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

(function($){
    function showAjaxModal(html){
        $('.modal-backdrop').remove();
        $('#ajax-modal-container').html(html);
        $('#ajax-modal-container > .modal').modal('show');
    }
    $(document).ready(function(){
        let $document = $(document);
        $document.on('submit', '.ajax-modal-form', function (e) {
            e.preventDefault();
            let action = $(this).attr('action') || location.href;
            let method = $(this).attr('method').toLowerCase() || 'get';
            let formData = new FormData(this);

            axios({
                method: method,
                url: action,
                data: formData
            }).then((response) => {
                showAjaxModal(response.data);
            });
        });
        $document.on('click', '.ajax-modal, .ajax-modal-links a', function (e) {
            e.preventDefault();
            axios.get($(this).attr('href')).then((response) => {
                showAjaxModal(response.data);
            });
        });
        $document.on('click','[data-confirm]',function(e){
            return confirm($(this).data('confirm'));
        });
    });

    $('form.auto-submit').on('change','input,textarea,select',function (e) {
        e.delegateTarget.submit();
    });

    window.flash = function(message, type, time) {
        type = type || 'danger';
        time = time || 5000;
        if(type === 'danger'){
            message = '<i class="fa fa-warning"></i> '+message;
        }
        let flash = $('<div class="alert alert-' + type + '" style="opacity: 0.9">' + message + '</div>')
            .on('click',function(){
                $(flash).animate({opacity: 0}, 'slow', function () {
                    $(flash).remove();
                });
            })
            .prependTo('#flash-container');

        setTimeout(function () {
            $(flash).animate({opacity: 0}, 'slow', function () {
                $(flash).remove();
            });

        }, time);
    };
})(jQuery);
