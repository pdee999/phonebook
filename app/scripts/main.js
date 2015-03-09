 $(document).ready(function(){

     // form validation
     $("form.addcontactform").validate({
         rules : {
             firstName: {
                 required: true,
                 minlength: 2
             },
             phoneNumber: {
                 required: true,
                 minlength: 10,
                 maxlength: 10,
                 digits: true
             }
         },
         messages : {
             firstName: {
                 required: "Please enter a first name.",
                 minlength: "Please enter a name that's at least 2 characters long."
             },
             phoneNumber: {
                 required: "Please enter a phone number.",
                 minlength: "Please enter at least 10 digits.",
                 maxlength: "Please enter no more than 10 digits.",
                 digits: "Please enter a phone number (i.e. 8005551234)."
             }
         }
     });

     // tablesorter
     $(".tablesorter").tablesorter({
         sortList: [ [0,0] ],
         headers: {
             1: { sorter: false },
             2: { sorter: false }
         }
     });

     // swap name column icon
     $('.nameCol').click(function(){
         $('.nameCol span').toggleClass('glyphicon-sort-by-alphabet glyphicon-sort-by-alphabet-alt')
     });

      // AJAX for adding contacts
      $('.addbutton').click(function addContact (e){
          e.preventDefault();
          var firstName = $('.addcontactform').find('input[name="firstName"]').val(),
              lastName = $('.addcontactform').find('input[name="lastName"]').val(),
              phoneNumber = $('.addcontactform').find('input[name="phoneNumber"]').val();
          $.ajax({
              url: 'add.php',
              type: 'post',
              data: {
                  'firstname': firstName,
                  'lastname': lastName,
                  'phone': phoneNumber
              },
              success: function(data) {
                  if(data == "ok") {
                  alert('Your contact has been saved.');
                  }
              },
          error: function(xhr, desc, err) {
              console.log(xhr);
              console.log("Details: " + desc + "\nError:" + err);
              alert('Contact not saved.');
              }
          }); // end ajax call
          location.reload();
      });

     // AJAX for deleting contacts
     $('body').on('click', '[name="Delete"]', function deleteContact (e) {
         e.preventDefault();
         var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode) || NEED TO FIX
         var pbid = clickedID[1]; //and get number from array
         $.ajax({
             url: 'delete.php',
             type: 'post',
             data: {
                 'pb_Id': pbid
             },
             success: function(data) {
                 if(data == 'ok') {
                     alert('Your contact has been deleted.');
                 }
             },
             error: function(xhr, desc, err) {
                 console.log(xhr);
                 console.log('Details: ' + desc + '\nError:' + err);
                 alert('Contact not deleted.');
             }
         }); // end ajax call
         location.reload();
     });

 });