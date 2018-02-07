var cacheName = 'v1';

var filesToCache = [
        '/',
        'cache/index.html',
        'js/main.js',
        'js/plugins.js',
        '/manifest.json',
        'img/photo.webp',
        'favicons/favicons.ico',
        'css/app.css'
];

// self.addEventListener('activate', function(e) {
//   console.log('[ServiceWorker] Activate');
//   // e.waitUntil(
//   //   caches.keys().then(function(keyList) {
//   //     return Promise.all(keyList.map(function(key) {
//   //       console.log(key);
//   //       // if (key !== cacheName) {
//   //       //   console.log('[ServiceWorker] Removing old cache', key);
//   //       //   return caches.delete(key);
//   //       // }
//   //     }));
//   //   })
//   // );
//   return self.clients.claim();
// });

// self.addEventListener('fetch', function(e) {
//   console.log('[ServiceWorker] Fetch', e.request.url);
//   e.respondWith(
//     caches.match(e.request).then(function(response) {
//       return response || fetch(e.request);
//     })
//   );
// });

// self.addEventListener('fetch', function(event) {
//   event.respondWith(
//     caches.match(event.request).then(function(response) {
//       return response || fetch(event.request);
//     })
//   );
// });

// self.addEventListener('install', function(e) {
//   e.waitUntil(
//     caches.open('the-magic-cache').then(function(cache) {
//       return cache.addAll([
//         '/',
//         'cache/index.html',
//         'js/main.js',
//         'js/plugins.js',
//         '/manifest.json',
//         'img/photo.webp',
//         'favicons/favicons.ico',
//         'css/app.css'
//       ]);
//     })
//   );
// });