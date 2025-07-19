import axios from 'axios';
window.axios = axios;
import '@laravel/reverb';
import Echo from 'laravel-echo';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';


window.Echo = new Echo({
    broadcaster: 'reverb',
    key: 'local', // or your actual key
    wsHost: window.location.hostname,
    wsPort: 8080,
    wssPort: 8080,
    forceTLS: false,
    enabledTransports: ['ws'],
});

// Use it after defining
Echo.private(`chat.${user_id}`).listen('NewMessage', (e) => {
    console.log("New message received:", e);
});