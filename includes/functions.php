<?php

function connectToDB() {


    $database = new PDO (
        "mysql:host=devkinsta_db;dbname=feedback_form",
        'root',
        'r9wz9RSYYaTbjS7v'
    );

    return $database;
}