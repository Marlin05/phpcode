<?php

//https://coursesweb.net/php-mysql/php-mysql-insert

$erors = array();                      // set an empty array that will contains the errors
$regexp_mail = '/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/';         // an e-mail address pattern

// Check for form submission
if (isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['email'])) {
  // remove tags and whitespace from the beginning and end of form data
  $_POST = array_map("strip_tags", $_POST);
  $_POST = array_map("trim", $_POST);

  // chech if all form fields are filled in correctly
  // (email address and the minimum number of characters in "name" and "pass")
  if (!preg_match($regexp_mail, $_POST['email'])) $erors[] = 'Invalid e-mail address';
  if (strlen($_POST['name'])<3) $erors[] = 'Name must contain minimum 3 characters';
  if (strlen($_POST['pass'])<6) $erors[] = 'Password must contain minimum 6 characters';

  // if no errors ($error array empty)
  if(count($erors)<1) {
    // connect to the "tests" database
    $conn = new mysqli('localhost', 'root', '', 'tests');

    // check connection
    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }

    // store the values in an Array, escaping special characters for use in the SQL statement
    $adds['name'] = $conn->real_escape_string($_POST['name']);
    $adds['pass'] = $conn->real_escape_string($_POST['pass']);
    $adds['email'] = $conn->real_escape_string($_POST['email']);

    // sql query for INSERT INTO users
    $sql = "INSERT INTO `users` (`name`, `pass`, `email`) VALUES ('". $adds['name']. "', '". $adds['pass']. "', '". $adds['email']. "')"; 

    // Performs the $sql query on the server to insert the values
    if ($conn->query($sql) === TRUE) {
      echo 'users entry saved successfully';
    }
    else {
      echo 'Error: '. $conn->error;
    }

    $conn->close();
  }
  else {
    // else, if errors, it adds them in string format and print it
    echo implode('<br />', $erors);
  }
}
else {
  echo 'No data from form';
}
?>