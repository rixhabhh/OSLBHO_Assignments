<?php

    //Converting array to JSON.

    $user_details = [[
        'fname' => 'John',
        'lname' => 'doe',
        'mail' => 'John@abc.com',],
        [
        'fname' => 'Andy',
        'lname' => 'doe',
        'mail' => 'andy@abc.com',]
        ];

        echo json_encode($user_details);


    //Converting JSON to array.

    $someJSON = '[{"fname":"John","lname":"doe","mail":"John@abc.com"},{"fname":"Andy","lname":"doe","mail":"andy@abc.com"}]';

    $someArray = json_decode($someJSON, true);
    print_r($someArray);        // Dump all data of the Array
    echo $someArray[0]["fname"];        // Access Array data



    //Merge two arrays.

    $user_details_2 = [[
        'fname' => 'John',
        'lname' => 'doe',
        'mail' => 'John@abc.com',],
        [
        'fname' => 'Andy',
        'lname' => 'doe',
        'mail' => 'andy@abc.com',]
        ];

    $user_details_2 = [[
        'fname' => 'Alex',
        'lname' => 'karev',
        'mail' => 'alex@abc.com',],
        [
        'fname' => 'Christina',
        'lname' => 'Yang',
        'mail' => 'yang@abc.com',]
        ];

    $user_details = array_merge($user_details_2,$user_details_2);
    print_r($user_details);



    //i. Find the mail of the user where mail ID is ‘alex@abc.com’

    $details = array_column($user_details, 'mail');
    
    $index = array_search('alex@abc.com',$details);
    echo "<pre>"; print_r($index);
    $data = $user_details[$index];
    echo "<pre>"; print_r($data);
    


