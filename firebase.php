<?php

/***
 * 
 * HOW TO INSTALL:
 * 
 * Run this from terminal:  composer require kreait/firebase-php
 * 
 * DOWNLOAD: credentials.json FROM FIREBASE CONSOLE.
 *
 * TO RUN EXAMPLES, FROM TERMINAL: php ./firebase.php
 *
 */


require_once('vendor/autoload.php');

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

/**
 * ==============================================================================================================
 * TOKEN LIST (OPTIONAL)
 */
$testTokens = [
    // MANUEL ANDROID
    'gfg656544Q9lRxeUXUx2ZACUIi:APA91bF7DOGozPeq-TaIG9gFST5TDXd-JDlgAhs-REf03eKCXPoogynhmddmGQWO45sxr-O5n1o6iG_UboubFDfxMCgoyQGGUI075a1aWzwQGESqi7OnyN454f44df',

    // SOFT02
    'fsdf333z4DjV_MIq8mgi0wFa:APA91bEnozGcBte3EX6UAIaDfN__bgvCnOL4cLfdfdsfsd4354G8X_fLhh0F6Mm8STVXX9vXSYIaZC9-d7BMRacnV5qjp9xthTRlaRJtsfdsfsdf',
];

/**
 * ==============================================================================================================
 * CREDENTIALS, YOU HAVE TO DOWNLOAD IT FROM FIREBASE CONSOLE.
 */
$factory = (new Factory())->withServiceAccount('credentials.json');

/**
 * ==============================================================================================================
 * INSTANCE SDK
 */
$messaging = $factory->createMessaging();

/**
 * ==============================================================================================================
 * Subscribe a token or a group of tokens to a topic (this topic is created automatically if not exists)
 * 
 * THIS IS VERY IMPORTANT TO GET MESSAGES DELIVERY.
 * YOU CAN DO THIS IN THE MOBILE APP BUT IS BETTER DO IT IN THE API.
 * 
 */
// $result = $messaging->subscribeToTopic('all', $testTokens); // 'all' is the topic name
// var_dump($result);

/**
 * ==============================================================================================================
 * Send a message to a token or a grup of tokens (ONLY!!!)
 * 
 */
// foreach($testTokens as $i=>$token){
//     $message = CloudMessage::withTarget('token', $token)
//         ->withNotification(Notification::create('This is the message Title', 'This is the message Body'))
//         ->withData(['custom_index' => $i]); // optional
//     $messaging->send($message);
// }


/**
 * ==============================================================================================================
 * Send a message to a specific Topic (Channel) 
 * 
 */
$message = CloudMessage::withTarget('topic', 'all')
    ->withNotification(Notification::create('Global message Title', 'Global message Body'))
    ->withData(['key' => 'value']); // optional
$messaging->send($message);





/**
 * 
 * ==============================================================================================================
 * ==============================================================================================================
 * ==============================================================================================================
 * 
 * TESTING STUFF **********
 * 
 */
// $auth = $factory->createAuth();
// $users = $auth->listUsers(); //$defaultMaxResults = 1000, $defaultBatchSize = 1000);
// var_dump($users);

// foreach ($users as $user) {
//     var_dump($user);
//     break;
// }

// $condition = "'all' in topics";
// $condition = "'all' in topics || 'android' in topics || 'ios' in topics";
// $condition = "'klkmontron' not in topics";

// $message = CloudMessage::withTarget('condition', $condition)
// $message = CloudMessage::withTarget('topic', 'all')
//     ->withNotification(Notification::create('Title', 'Body'))
//     ->withData(['key' => 'value']);

// $messaging->send($message);

// SUBSCRIBE
// $validTokens = $messaging->validateRegistrationTokens(['QvRB4olefH5baltdfqxorurmnAo1Vhc05UhADT2n1gpt16c4xwFsCf7p4RCz94O2YKBKW4AtpgZiv_a76OHGEw61Fs1SRJClSP9dHoRHBTYySyg_pDnt8tUB6x0Blb9XVPKZHJ7'])['valid'];
// $result = $messaging->subscribeToTopic('weather', $validTokens);
// var_export($validTokens);
// var_export($result);

// // TOPIC MESSAGE
// $message = CloudMessage::withTarget('topic', 'weather')
//     ->withNotification(Notification::create('Title: weather', 'Body weather'))
//     ->withData(['key' => 'value']);
// $messaging->send($message);
