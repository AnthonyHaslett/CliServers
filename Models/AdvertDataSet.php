<?php

require_once ('Models/Database.php');
require_once ('Models/AdvertData.php');

class AdvertDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllAdverts() {
        $sqlQuery = 'SELECT * FROM adverts';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AdvertData($row);
        }
        return $dataSet;
    }

    public function fetchAllAudis() {
        $sqlQuery = "SELECT * FROM adverts WHERE title = 'Audi' && 'audi' ";
    echo print_r($sqlQuery);

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AdvertData($row);
        }
        return $dataSet;
    }



    public function insertInto() {

//        $sqlQuery = "INSERT INTO users (title, price, description, photo_name, color)
//    VALUES ('".$_POST["title"]."','".$_POST["price"]."','".$_POST["description"]."','".$_POST["photo_name"]."','".$_POST["color"]."')";
//
//        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
//        $statement->execute(); // execute the PDO statement
//
//        $dataSet = [];
////        while ($row = $statement->push()) {
////            $dataSet[] = new AdvertData($row);
////        }
//        return $dataSet;


        $sql = "INSERT INTO users (title, price, description, photo_name, color)
VALUES ('".$_POST["title"]."','".$_POST["price"]."','".$_POST["description"]."','".$_POST["photo_name"]."','".$_POST["color"]."')";

        if (query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" ;
        }
    }

}


