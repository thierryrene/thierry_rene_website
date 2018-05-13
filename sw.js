var cacheName = 'v1';

var filesToCache = [
        'cache/index.html',
        // '/',
        // 'js/main.js',
        // 'js/plugins.js',
        // '/manifest.json',
        // 'img/photo.webp',
        // 'favicons/favicons.ico',
        // 'css/app.css'
];

self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});
