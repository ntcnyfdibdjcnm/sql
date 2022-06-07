<?php

    $connect = mysqli_connect('localhost', 'root', 'Enk0P@ss', 'test');

    if (!$connect) {
        die('Error connect to DataBase');
    }