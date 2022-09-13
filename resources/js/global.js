import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import jQuery from 'jquery';
import * as bootstrap from 'bootstrap'

window.$ = window.jQuery = jQuery;


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

(function($){
    function showAjaxModal(html){
        $('.modal-backdrop').remove();
        $('#ajax-modal-container').html(html);
        let modal = new bootstrap.Modal(document.querySelector('#ajax-modal-container > .modal'))
        modal.show();
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
