importScripts(
    'https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js'
);

const {
    pageCache,
    imageCache,
    staticResourceCache,
    offlineFallback,
    googleFontsCache,
    warmStragegyCache
} = workbox.recipes;
const {setDefaultHandler} = workbox.routing;
const {NetworkOnly} = workbox.strategies;

setDefaultHandler(new NetworkOnly());

// pageCache(); // Use this if I will cache the Task Create page.

const urlsToCache = [
    ''
];

googleFontsCache();
staticResourceCache();
imageCache();
offlineFallback();