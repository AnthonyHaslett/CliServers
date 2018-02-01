<?php

require ('Database.php');
require ('AdvertData.php');

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
        $sqlQuery = "SELECT * FROM adverts WHERE title = 'Audi' || 'audi' ";
    echo print_r($sqlQuery);

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

//        $dataSet = [];
//        while ($row = $statement->fetch()) {
//            $dataSet[] = new AdvertData($row);
//        }
        return null;
    }



    public function insertAdvert($POST) {

        $title = $POST["title"];
        echo $title;
        $price = $POST["price"];
        $color = $POST["color"];
        $description = $POST["description"];
        $FK_userId = 4;//$POST["FK_userId"];
        $photo_name = $POST["photo_name"];

        $sqlQuery = "INSERT INTO adverts (title, price, description, FK_userId , photo_name, color) VALUES ('$title', $price,
                    '$description', '$FK_userId', '$photo_name', '$color')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){ //; // execute the PDO statement
            echo 'success';} else {
            echo 'false';
        }
   //     $statement->execute();
//        $dataSet = [];
//        while ($row = $statement) {
//            $dataSet[] = new AdvertData($row);
//        }
//   //, description, FK_userId , photo_name, color)
      //  , $description, $FK_userId , $photo_name, $color
//        return $dataSet;
}


public function textSearch($POST){

}

}


