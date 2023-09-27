// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyD66J2ZhAV7CRtgs2meNQvsfMYyMCxnRNA",
  authDomain: "laravelfirebase-14e9f.firebaseapp.com",
  databaseURL: "https://laravelfirebase-14e9f-default-rtdb.firebaseio.com",
  projectId: "laravelfirebase-14e9f",
  storageBucket: "laravelfirebase-14e9f.appspot.com",
  messagingSenderId: "235713406905",
  appId: "1:235713406905:web:2e57776f3a7ae3361c3868",
  measurementId: "G-3CN40HS720"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);