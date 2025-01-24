import './bootstrap';

// We will use localforage to cache and save necessary data in the navigator for the offline fallback.
// 👉🏼 A list of users, with id and name, will be cached for displaying the possible assignees of a task while offline.
// 👉🏼 The tasks created while offline will be saved, for saving them in the server DB when back online.
import localforage from "localforage";

//  Service Worker Registration
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker
            .register('/sw.js')
            .then((registration) => {
                console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch((error) => {
                console.error('Service Worker registration failed:', error);
            })
    });
}

// Inform Livewire that the app is online.
// This serves the purpose of, for example, preparing the list of users to cache for the offline fallback.
window.addEventListener('load', () => {
    let tasks = [];

    localforage.iterate(function (value, key, iterationNumber) {
        if (key.includes('task')) {
            tasks.push(value);
            localforage.removeItem(key).then(() => console.log('Removed ' + key));
        }
    })
        .then(() => {
            console.log('Tasks iterated:' + tasks);
            window.dispatchEvent(new CustomEvent('ready-to-save-tasks', {
                detail: {tasks}
            }));
            // We name this custom event "app-online" for the purpose of differentiating it with the reserved "online" event.
            window.dispatchEvent(new CustomEvent('app-online'));
        })
        .catch((e) => console.log('Error iterating tasks:' + e));
})

// Bring users id and name to JavaScript and save them in the navigator storage with localforage.
window.addEventListener('ready-to-cache-users', async (e) => {
    // This data will be persistent and can be read while offline!
    await localforage.setItem('users', e.detail[0].users);
})

window.addEventListener('offline', () => {
    window.location.href = '/offline.html'
})

