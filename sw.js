self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});

self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open('the-magic-cache').then(function(cache) {
      return cache.addAll([
        '/',
        'cache/index.html',
        'js/main.js',
        'js/plugins.js',
        '/manifest.json',
        'img/photo.webp',
        'favicons/favicons.ico',
        'css/app.css'
      ]);
    })
  );
});