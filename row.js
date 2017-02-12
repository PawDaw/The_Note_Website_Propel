
$(function(){

        $.ajax({
        type: 'GET',
        url: 'JSON_Notes.php' ,
        success: function(data) {
        
              var array = $.parseJSON(data);
              console.log('successs',array);

              $.each(array, function(i, notes) {
                  $.each(notes, function(i,note){ 
                  var rows = $('<tr>'+'<td>'+ note.Id +' </td> <td>'+ note.Note +' </td>'+'</tr>');
                  rows.hide();
               
                  setTimeout(function(){
               
                     $('tr:last-child').after(rows);
                     rows.delay(1000).fadeIn(1000);
                     }, i * 1500);
               
                   });
             });
       }
       
     });  
});



 