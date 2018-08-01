<?php
include 'IAdmin.php';
include 'IUser.php';

include 'AUser.php';
include 'User.php';
include 'Moder.php';


$user = new Moder();

echo $user->get();

?>