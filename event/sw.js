// use a cacheName for cache versioning
var cacheName = 'Event:Offline';

// during the install phase you usually want to cache static assets
self.addEventListener('install', function(e) {
    // once the SW is installed, go ahead and fetch the resources to make this work offline
    e.waitUntil(
        caches.open(cacheName).then(function(cache) {
            return cache.addAll([
                './',
               './index.php',
               './css/bootstrap.css',
                './css/owl.carousel.css',
            './css/styles.css',
           './css/datepicker.css',
            './css/docs.css',
            './css/custom.css',
           './js/sweet-alert/sweet-alert.min.css',
                './js/jquery-1.12.4.min.js',
                './js/bootstrap.js',
                './js/app.js',
                './js/owl.carousel.js',
                './js/jquery.selectbox-0.2.js',
                './js/jquery.form-validator.min.js',
                './js/bootstrap-datepicker.js',
                './js/placeholder.js',
                './js/sweet-alert/sweet-alert.min.js',
                './js/coustem.js'
            ]).then(function(response) {
                console.log(response);
            }).catch(function(error){
                console.log(error);
            });
        })
    );
});

// when the browser fetches a url
self.addEventListener('fetch', function(event) {
    // either respond with the cached object or go ahead and fetch the actual url
    event.respondWith(
        caches.match(event.request).then(function(response) {
            if (response) {
                // retrieve from cache
                return response;
            }
            // fetch as normal
            return fetch(event.request);
        })
    );
});