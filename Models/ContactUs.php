<?php

class ContactUs {

    protected $_contactId,$_fk_userId, $_fk_name, $_fk_email, $_address, $_enquiry;
//    $_photoName
    public function __construct($dbRow) {
        $this->_contactId = $dbRow['contactId'];
        $this->_fk_userId = $dbRow['fk_userId'];
        $this->_fk_name = $dbRow['fk_name'];
        $this->_fk_email = $dbRow['fk_email'];
        $this->_address = $dbRow['enquiry'];
    }

    public function getContactId() {
        return $this->_fk_userId;
    }

    public function getContactName() {
        return $this->_fk_name;
    }

    public function getAddress() {
        return $this->_address;
    }

    public function getEmail() {
        return $this->_fk_email;
    }

    public function getEnquiry() {
        return $this->_enquiry;
    }









}