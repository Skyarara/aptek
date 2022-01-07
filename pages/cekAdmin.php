<?php
//not signed in

if(isset($_SESSION['log'])){

}else{
    header('location:loginAdmin.php');
}

?>