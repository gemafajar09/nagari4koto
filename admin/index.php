<?php
if (!$_SESSION['idadmin']) {
    header('Location: login.php');
} else{
   header('location:User/index.php');
}
?>


