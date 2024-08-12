self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open("serviceworker").then((cache) => {
            return cache.addAll([
                "/",
                "/resources/css/app.css",
                "/resources/js/app.js",
                // Tambahkan file lain yang perlu dicache
            ]);
        })
    );
});

self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});
