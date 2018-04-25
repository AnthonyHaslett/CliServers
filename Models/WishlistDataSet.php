<?php
//session_start();
require ('Database.php');
require ('WishlistData.php');

/* A data set to retrieve wishlist data
 * */


class WishlistDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllUsers() {
        $sqlQuery = 'SELECT * FROM wishlist';
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new WishlistData($row);
        }
        return $dataSet;
    }

    public function viewWishList() {

        $sqlQuery = 'SELECT wishlist.wishlistId advertId, adverts.title ,adverts.photo_name, adverts.description, adverts.price , users.userId, users.username, users.email, users.mobileNo

                    FROM ((wishlist 
                    INNER JOIN users ON wishlist.fk_userId = users.userId)
                    INNER JOIN adverts ON wishlist.fk_advertId= adverts.advertId)
                    WHERE userId =' . $_SESSION['login_user'];

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new WishlistData($row);
        }
        return $dataSet;
    }

    public function insertIntoWishList($fk_userId, $advertId) {
       $advertId = $_GET["id"];
        $fk_userId = $_SESSION['login_user'];

        $sqlQuery = 'INSERT INTO wishlist(fk_userId, fk_advertId) VALUES ('.$fk_userId.','.$advertId.')';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new WishlistData($row);
        }
        return $dataSet;
    }

    public function deleteFromWishList($wishlistId)
    {
//        $advertId = $_GET["id"];
//        $fk_userId = $_SESSION['login_user'];

        $id = $wishlistId;

        var_dump($id);


        $sqlQuery = "DELETE FROM wishlist WHERE fk_advertId = '$id' ";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        var_dump($statement);

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new WishlistData($row);
        }
        return $dataSet;
    }


}


