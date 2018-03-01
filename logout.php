<?php

/*
 * A controller to logout
 */

    session_start();
  //  session_destroy();
    echo $_SESSION['login_user'];
    if(session_destroy()){
        echo "No session!";
    } else {
        echo "here";
        echo session_id($_SESSION['login_user']);
    }

header("Location: index.php");