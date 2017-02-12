<?php

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';

echo "Please run the Main Page List.php ";

$listOfUsers = PersonQuery::create()->find();
$person = new Person();
$person->setName('pawel');
$person->setPass('pawel');
$person->save();

foreach($listOfUsers as $user){
echo $user;
}

echo $person->toJSON();

 <?php foreach($listOfNotes as $C) { ?>
      <tr >
          <td><? echo $C->getId(); ?></td>
          <td><? echo $C->getNote(); ?></td>
      </tr>
    <?php  } ?>
    
    
    
    var $notes = "<?= $listOfNotes; ?>";

$(document).ready(function(){
    $("button").click(function(){
     
        $.ajax({url: "demo_ajax_load.txt", async: false, success: function(result){
            $("#list").append('<tr>'+'<td>'+ $notes +' </td> <td> cos</td>'+'</tr>');
        }});
      
    });
});




$(document).ready(function(){
    $("button").click(function(){
     
        $.ajax({url: "noteArray.php", async: false, success: function(result){
            $("#list").append('<tr>'+'<td>'+ result['Note'] +' </td> <td> cos</td>'+'</tr>');
        }});
      
    });
});


------------------


$(function(){

        $.ajax({
        type: 'GET',
        url: 'noteArray.php' ,
        success: function(data) {
        
        var array = $.parseJSON(data);
        console.log('successs',array);

            $.each(array, function(i, notes) {
             $.each(notes, function(i,note){
              
              $("#list").append('<tr>'+'<td>'+ note.Id +' </td> <td>'+ note.Note +' </td>'+'</tr>').hide().delay(500).fadeIn(1400);
              });
            });
        }
     });   
});






$(function(){

        $.ajax({
        type: 'GET',
        url: 'noteArray.php' ,
        success: function(data) {
        
        var array = $.parseJSON(data);
        console.log('successs',array);

            $.each(array, function(i, notes) {
             $.each(notes, function(i,note){
             
             
               var rows = $('<tr>'+'<td>'+ note.Id +' </td> <td>'+ note.Note +' </td>'+'</tr>');
               rows.hide();
               
               setTimeout(function(){
               
               $('tr:last-child').after(rows);
                rows.delay(1500).fadeIn(1400);
                
               },i * 2000);
               
              });
             
            });
        }
     });  
});


