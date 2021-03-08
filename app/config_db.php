<?php

const HOST = 'localhost';
const DB_NAME = 'elsila_db';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

$pdo = new PDO('mysql:host='. HOST .';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);


