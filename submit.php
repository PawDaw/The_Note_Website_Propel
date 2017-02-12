<?php

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';


// start session
session_start();

if($_POST)
{
    // Create new Note
    $note = new Note();
    $note->setNote($_POST['note']);
    
    // Save all in database
    $note->save();
    
    // Create new Person_Note
    $person_Note = new Person_note();
    $person_Note->setPersonId($_SESSION['id']);
    $person_Note->setNoteId($note->getId());
   
    // Save all in database
    $person_Note->save();
}



// retrive all data from Person table with PK equal $_SESSION["id"]
 $person = PersonQuery::create()->findPK($_SESSION["id"]);
 $notes =  $person->getPerson_notes();




foreach($notes as $n){
   $listOfNotes = NoteQuery::create()->findPK($n->getNoteId());
}
 

// create JSON file
echo $listOfNotes->toJSON();



?>