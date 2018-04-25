<?php
//session_start();
require ('Database.php');
require ('UserData.php');

/* A data set to retrieve user data
 * */

class UserDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllUsers()
    {
        $sqlQuery = 'SELECT * FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new UserData($row);
        }
        return $dataSet;
    }


    public function fetchAllUserNames()
    {
        $sqlQuery = 'SELECT username FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new UserData($row);
        }
        return $dataSet;
    }


    public function selectUser($POST)
    {

        $username = $POST["username"];
//        $antiSpam = $POST["anti-spam"];


        $sqlQuery = "SELECT * FROM users WHERE username = '$username'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = null;
        while ($row = $statement->fetch()) {
            $dataSet = new UserData($row);
        }
//        var_dump($POST);
        if ($dataSet == null) {
            return false;
        } else {
            if ((password_verify(htmlentities($_POST["password"]), $dataSet->getPassword())) && ($username == $dataSet->getUserName())) {
                echo 'successfully logged in';
                $_SESSION['login_user'] = $dataSet->getStudentID();
                return true;
            } else {
                echo 'Wrong password';
                return false;
            }
        }
    }


    //insert
    public function insertUser($POST)
    {

        $username = $POST["username"];
        $password = password_hash($POST["password"], PASSWORD_BCRYPT);
        $email = $POST["email"];
        $address = $POST["address"];
        $mobileNo = $POST["mobileNo"];

//        var_dump($POST);

        $sqlQuery = "INSERT INTO users (username, password, email , address, mobileNo) VALUES ('$username' , '$password',
                    '$email','$address','$mobileNo')";

//        $sqlQuery = "INSERT INTO users (username, password, email , address) VALUES ('$username' , '$password',
//                    '$email','$address')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if ($statement->execute()) { //; // execute the PDO statement
            echo ' success';
        } else {
            echo ' Data incorrect, try again';
        }
    }
}


