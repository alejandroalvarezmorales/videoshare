<?php

    define("CONFIG", [
        "dbhost" => "localhost",
        "dbuser" => "root",
        "dbpass" => "",
        "db" => "mydb",
        "debug" => 0,
        "maintenance" => 0,
        "appsdir" => dirname(__DIR__),
        "filesdir" => dirname(__DIR__). '\\'."files"
    ]);


    define("SPECIAL_FIELDS", [
        "__p" => "", // On $_GET page or table name on 
        "__a" => "", // On $_GET action find, create, update, delete
        "__f" => "", // On $_POST Fields of Select
        "__t" => "", // On $_POST Tables
        "__c" => "", // On $_POST Conditions
        "__g" => "", // On $_POST group by
        "__o" => "", // On $_POST order by
        "__l" => "",  // On $_POST limit
        "__id" => "", // On $_POST, key id for update and delete operations
    ]);

