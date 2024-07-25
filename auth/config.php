<?php require 'vendor/autoload.php';
$clientID = "109913621437-j00elmj5t627van9v06erj492r18au2a.apps.googleusercontent.com"; // copy dari Google Cloud API (OAuth client ID)
$clientSecret = "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"; // copy dari Google Cloud API (OAuth client ID)

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');
