<?php

include("config.php");

$isbn = trim($_GET['isbn']);
    echo '<INPUT type="hidden" name="isbn" value=' . $isbn . '>';

$isbn = trim($_GET['isbn']);      // From the hidden field
$isbn = addslashes($isbn);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You are reserving book with the ID:"           .$isbn;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE book SET reserved=1 WHERE isbn = ?");
    $stmt->bind_param('i', $isbn);
    $stmt->execute();
    printf("<br>Book Reserved!");
    printf("<br><a href=browse.php>Search and Book more Books </a>");
    printf("<br><a href=mybooks.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
?>