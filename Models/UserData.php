<?php

class UserData {

    protected $_userId, $_username, $_password, $_email, $_address;
//    $_photoName
    public function __construct($dbRow) {
        $this->_userId = $dbRow['userId'];
        $this->_username = $dbRow['username'];
        $this->_password = $dbRow['password'];
        $this->_email = $dbRow['email'];
        $this->_address = $dbRow['address'];
    }

    public function getStudentID() {
        return $this->_userId;
    }

    public function getUserName() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getAddress() {
        return $this->_address;
    }









}