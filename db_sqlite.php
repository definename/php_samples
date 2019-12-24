<?php
    // phpinfo();
    // $pdo = new PDO("sqlite:db.dat");
    class MyDB extends SQLite3
    {
        public function __construct()
        {
            $this->open('test.sqlite');
        }
    }
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }