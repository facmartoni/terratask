importScripts(
    'https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js'
);

const {
    pageCache,
    imageCache,
    staticResourceCache,
    offlineFallback,
    googleFontsCache,
    warmStrategyCache
} = workbox.recipes;
const {setDefaultHandler, registerRoute, staleWithRevalidate} = workbox.routing;
const {NetworkOnly, CacheFirst} = workbox.strategies;

setDefaultHandler(new NetworkOnly());

// pageCache(); // Use this if I will cache the Task Create page.

const urls = [
    '/assets/localforage.min.js',
    '/assets/alpine.min.js',
    '/offline.css',
    '/offline.html',
    '/app.webmanifest'
];
const strategy = new CacheFirst();

urls.forEach(url => registerRoute(url, strategy));

// registerRoute('/app.webmanifest', new staleWithRevalidate());

warmStrategyCache({urls, strategy});
googleFontsCache();
staticResourceCache();
imageCache();
// offlineFallback();