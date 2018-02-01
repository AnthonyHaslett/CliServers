<?php

require ('Database.php');
require ('UserData.php');

class UserDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllUsers() {
        $sqlQuery = 'SELECT * FROM users';
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new UserData($row);
        }
        return $dataSet;
    }

    public function fetchAllUserNames() {
        $sqlQuery = 'SELECT username FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new UserData($row);
        }
        return $dataSet;
    }


//    public function addUsers() {
//        $sqlQuery = 'INSERT INTO users (userId,username,password,email,address) VALUES (userId,username,password,email,address)';
//
//        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
//        $statement->execute(); // execute the PDO statement
//    }

    public function insertUser($POST) {

        $username = $POST["username"];
        echo $username;
//        $userId = 0005;
        $password = $POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $email = $POST["email"];
        $address = $POST["address"];

        $sqlQuery = "INSERT INTO users (username, password, email , address) VALUES ('$username' , '$password', 
                    '$address','$email')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){ //; // execute the PDO statement
            echo ' success';} else {
            echo ' false';
        }
    }



public function userLogin($POST)
{
    //https://www.formget.com/login-form-in-php/


    //Retrieve the user name and password
    $username = $POST["username"];
    echo $username;
    $password = $POST["password"];

    //Query the database
    $sqlQuery = "SELECT * FROM users WHERE username ='$username' And password = '$password'";

    //Prepare the SQL query
    $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
    var_dump($statement);
    //Execute the SQL statement
    $statement->execute();

    $row = $statement->fetch();

        //if the rows are greater than zero, log the user in. Else failed attempted
        if($row > 0){
        echo 'login success';
        session_start();
        $_SESSION['login_user']= $username;
        echo " SESSION ".$_SESSION['login_user'];

    } else {
        echo ' false';
    }

//    $rows = mysql_num_rows($sqlQuery);
//
//    if ($rows == 1) {
//        $_SESSION['login_user']=$username; // Initializing Session
//        header("location: index.php"); // Redirecting To Other Page
//    } else {
//        "Username or Password is invalid";
//    }

}



//    public function verify() {
//
//// SQL query to fetch information of registerd users and finds user match.
//        $query = ("select * from login where password='$password' AND username='$username'", $connection);
//        $rows = ($query);
//        if ($rows == 1) {
//            $_SESSION['login_user']=$username; // Initializing Session
//            header("location: profile.php"); // Redirecting To Other Page
//        } else {
//            $error = "Username or Password is invalid";
//        }
//    }
}


