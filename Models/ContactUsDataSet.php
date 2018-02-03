<?php

require ('Database.php');
require ('ContactUs.php');

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
        $contactId = $POST["contactId"];
//        $userId = 0005;
        $password = $POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $email = $POST["email"];
        $address = $POST["address"];

        $sqlQuery = "INSERT INTO contact_us (fk_userId, fk_name, fk_address, fk_email, enquiry) VALUES ('$username' , '$password', 
                    '$address','$email')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){ //; // execute the PDO statement
            echo ' success';} else {
            echo ' false';
        }
    }


    public function sessionCheck(){

        session_start();// Starting Session
        $user_check=$_SESSION['login_user'];

        $sqlquery = ("select username from users where username='$user_check'");

        //Prepare the SQL query
        $statement = $this->_dbHandle->prepare($sqlquery); // prepare a PDO statement
        var_dump($statement);
        //Execute the SQL statement
        $statement->execute();

        $row = $statement->fetch();

        $login_session =$row['username'];

        if(!isset($login_session)){
           session_abort();
            header('Location: index.php'); // Redirecting To Home Page
        }

        echo '<p>' . 'Hello' . " SESSION ".$_SESSION['login_user']  . '<p>' ;
}

}


