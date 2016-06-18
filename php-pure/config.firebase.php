<?php
// Using Namespaces;
require __DIR__.'/vendor/autoload.php';
const DEFAULT_URL = 'https://chroda-twitter-like-app.firebaseio.com/';
const DEFAULT_TOKEN = 'bC0bLU64uv4WqZ0D0IRzKkpUnaweEic7CV9PMm9M';
$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
