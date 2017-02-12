<?php

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';


// start session
session_start();

// retrive all data from Person table with PK equal $_SESSION["id"]
 $person = PersonQuery::create()->findPK($_SESSION["id"]);
 $notes =  $person->getPerson_notes();

// array to storage Sesion id's
 $noteId = array();


foreach($notes as $n){
    $noteId[]= $n->getNoteId();
}
 
//Find objects by primary key ->findPks(array(12, 56, 832)); 
$listOfNotes = NoteQuery::create()->findPks($noteId);

// create JSON file
echo $listOfNotes->toJSON();


?>
