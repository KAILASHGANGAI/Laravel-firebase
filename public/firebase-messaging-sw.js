
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyD66J2ZhAV7CRtgs2meNQvsfMYyMCxnRNA",
    authDomain: "laravelfirebase-14e9f.firebaseapp.com",
    databaseURL: "https://laravelfirebase-14e9f-default-rtdb.firebaseio.com",
    projectId: "laravelfirebase-14e9f",
    storageBucket: "laravelfirebase-14e9f.appspot.com",
    messagingSenderId: "235713406905",
    appId: "1:235713406905:web:2e57776f3a7ae3361c3868",
    measurementId: "G-3CN40HS720"
});


const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});