<?php

//Require imports
require('Database.php');
require('AdvertData.php');
require('UserData.php');

/*
 * This class performs logic that allows the system to run things such as SQL queries
 *
 */


class AdvertDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }


    //A function to browse all adverts, using a parametre to decide which one to use
    public function browseAdverts($GET)
    {
        if ($GET == 'filterSubmit') {
            $carMake = $GET['carDropMake'];
            $carPrice = $GET['carDropPrice'];
            $carColor = $GET['carDropColor'];

//            $carMake = $_REQUEST['filterSubmit'] == 'carDropMake';
//            $carPrice = $_REQUEST['filterSubmit'] == 'carDropPrice';
//            $carColor = $_REQUEST['filterSubmit'] == 'carDropColor';

            $sqlQuery = "SELECT * FROM adverts WHERE title = '$carMake' AND price <= '$carPrice' AND color = '$carColor'  ";
//            $sqlQuery = "SELECT * FROM adverts WHERE title = 'mercedes' AND price <= '70000' AND color = 'grey'";
//


            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement

            if ($statement->execute()) { //; // execute the PDO statement
                $dataSet = [];
                while ($row = $statement->fetch()) {
                    $dataSet[] = new AdvertData($row);
                    var_dump($dataSet);
                }
                var_dump($dataSet);
                return $dataSet;
            } else {
                echo 'false';
            }
        }

//            $statement->execute(); // execute the PDO statement
//            $dataSet = [];
//            while ($row = $statement->fetch()) {
//                $dataSet[] = new AdvertData($row);
//                var_dump($dataSet);
//            }
//            var_dump($dataSet);
//            return $dataSet;

//        }

        elseif ($_GET == 'low2high') {
            $sqlQuery = 'SELECT * FROM adverts ORDER BY adverts.price ASC; ';
//                        $sqlQuery = 'SELECT * FROM adverts WHERE advertId = 45';

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            return $dataSet;
        } elseif ($_GET == 'high2low') {

            $sqlQuery = 'SELECT * FROM adverts ORDER BY adverts.price DESC; ';
//                $sqlQuery = 'SELECT * FROM adverts WHERE advertId = 45';

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            return $dataSet;
        } elseif ($_GET == 'titleASC') {

            $sqlQuery = 'SELECT * FROM adverts ORDER BY adverts.title ASC';

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            return $dataSet;
        } elseif ($_GET == 'titleDESC') {

            $sqlQuery = 'SELECT * FROM adverts ORDER BY adverts.title DESC';

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            return $dataSet;
        } elseif ($_GET == 'freeSearchSubmit') {

            $sqlQuery = 'SELECT * FROM adverts ORDER BY adverts.title DESC';

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            return $dataSet;
        } //Search by Id
        elseif ($_GET == 'id') {

            $search = $_GET['id'];
            $sqlQuery = 'SELECT * FROM adverts WHERE advertId = ' . $search;

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            var_dump($dataSet);
            return $dataSet;
        }

//        }
        else {
//            $sqlQuery = 'SELECT * FROM adverts WHERE advertId = 45';
            $sqlQuery = 'SELECT * FROM adverts';
            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
            return $dataSet;
        }


    }


    public function freeSearch($get)
    {
//        //$search = htmlentities($_POST['freeSearchSubmit']);
        $search = $get;

//        var_dump($search);
        htmlentities($search);
        $search = trim($search);

        if ($search !== '') {
            $sqlQuery = "SELECT * FROM adverts  WHERE title LIKE '%$search%' OR price LIKE '%$search%' OR description LIKE '%$search%' OR color LIKE '%$search%' LIMIT 5";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            //var_dump($statement);
            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new AdvertData($row);

            }
//            $json = json_decode($dataSet);
//            echo $dataSet;
            return $dataSet;


        } else {
            echo 'no data found';
        }
    }

// HELP: https://codereview.stackexchange.com/questions/23160/mvc-example-form-post

    public function insertAdvert($POST)
    {
        $title = $POST["title"];
//        echo $title;
        $price = $POST["price"];
        $color = $POST["color"];
        $description = $POST["description"];
//        var_dump($_SESSION['login_user']);
//        $FK_userId = 4;
//    var_dump($POST);
        $FK_userId = $_SESSION['login_user'];
        $photo_name = $POST["photo_name"];

//        $date_created = date("Y/m/d") . date("h:i:sa");
//        $date_created = date('Y-m-d H:i:s','1299762201428');

//        var_dump($date_created);

//        $sqlQuery = "INSERT INTO adverts (title, price, description, FK_userId , photo_name, color, date_created) VALUES ('$title', $price,
//                    '$description', $FK_userId, '$photo_name', '$color', '$date_created')";

        $sqlQuery = "INSERT INTO adverts (title, price, description, FK_userId , photo_name, color) VALUES ('$title', $price,
                    '$description', $FK_userId, '$photo_name', '$color')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if ($statement->execute()) { //; // execute the PDO statement
            echo '<h4>Advert Post Successful</h4>';
        } else {
            echo 'false';
        }
    }


    public function contactOwner($POST)
    {
        $sqlQuery = 'SELECT adverts.advertId, adverts.title , adverts.description,users.username, users.email, users.mobileNo
                     FROM adverts
                     INNER JOIN users ON users.userId=adverts.FK_userId ';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AdvertData($row);

        }
        return $dataSet;
    }

    public function getTitle()
    {

        $sqlQuery = 'SELECT * FROM adverts LIMIT 10';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AdvertData($row);

        }
        return $dataSet;
    }

}


