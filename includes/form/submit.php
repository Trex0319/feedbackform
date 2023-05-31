<?php

    // load database
    $database = connectToDB();

    // load all the questions
    $sql = "SELECT * FROM questions";
    $query = $database->prepare( $sql );
    $query->execute();
    $questions = $query->fetchAll();

    // get the name & email from the POST data
    /* 
        do error checking
        - make sure the name & email fields are not empty
        - make sure all the questions are answered
    */

    // loop through all the questions to make sure all the answers are set
    foreach ( $questions as $question ) {
        // use isset() to check if there is an answer for the question. If this is no answer, assign the error message to $error
        if (!isset($_POST['q' . $question['id']])) {
            $error = "Make sure all the questions are answered.";
        }
    }

    // if $error is set, redirect to home page
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header( 'Location: /' );
        exit;
    }

    // if no error, loop through all the questions to insert the answer to the results table
    foreach ( $questions as $question ) {
        // sql recipe
        $sql = "INSERT INTO results ( question_id, answer, user_id ) VALUES (:question_id, :answer, :user_id )";
        // prepare
        $query = $database->prepare($sql);

        // execute
        $query->execute([
            'user_id' => $_SESSION['user']['id'],
            'question_id' => $question['id'],
            'answer' => $_POST["q". $question['id']]
        ]);
    }

    // set success message
    $_SESSION["success"] = "Answers submit";

    // redirect to home page
    header("Location: /");
    exit;


