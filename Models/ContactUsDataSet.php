<?php

require ('Database.php');
require ('ContactUs.php');

/* A data set to retrieve c data
 * */

class ContactUsDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllContactDetails() {
        $sqlQuery = 'SELECT * FROM contact_us';
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new ContactUs($row);
        }
        return $dataSet;
    }

    public function insertContactDetails($POST) {
        var_dump($POST);
        $FK_userId = $_SESSION['login_user'];
        $enquiry = $POST["enquiry"];
        $subject = $POST["subject"];
//        $fk_advertId= $POST[""];
                $fk_advertId= 4;

        $sqlQuery = "INSERT INTO contact_us (fk_userId, enquiry , fk_advertId, subject) VALUES ('$FK_userId' , '$enquiry', 
                    '$fk_advertId','$subject')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){ //; // execute the PDO statement
            echo ' success';} else {
            echo ' false';
        }
    }

//    public function insertAdvertContactDetails($POST) {
////        var_dump($POST);
////        $FK_userId = $_SESSION['login_user'];
////        $subject = $POST["subject"];
////        $enquiry = $POST["enquiry"];
////        $advertId = $POST[''];
//
////        $sqlQuery = "INSERT INTO contact_us (fk_userId, enquiry, fk_advertId, subject) VALUES ('$FK_userId' , '$subject',
////                    '$enquiry','$advertId')";
//
//        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
//        if($statement->execute()){ //; // execute the PDO statement
//            echo ' success';} else {
//            echo ' false';
//        }
//    }

}


