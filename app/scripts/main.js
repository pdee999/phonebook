 $(document).ready(function(){

     // add regex method
     $.validator.addMethod(
         "regex",
         function(value, element, regexp) {
             var re = new RegExp(regexp);
             return this.optional(element) || re.test(value);
         },
         "Please check your input."
     );

     // form validation
     $("form.addcontactform").validate({
         submitHandler: function addContact (){ // AJAX for adding contacts
             $(".addbutton").hide(); //hide submit button
             $(".addcontactform .loadingImage").show(); //show loading image
             var firstName = $('.addcontactform').find('input[name="firstName"]').val(),
                 lastName = $('.addcontactform').find('input[name="lastName"]').val(),
                 phoneNumber = $('.addcontactform').find('input[name="phoneNumber"]').val();
             $.ajax({
                 url: 'add.php',
                 type: 'post',
                 dataType:"text",
                 data: {
                     'firstname': firstName,
                     'lastname': lastName,
                     'phone': phoneNumber
                 },
                 success: function(data) {
                     alert('Your contact has been saved.');
                     $(".addbutton").show(); //show submit button
                     $(".addcontactform .loadingImage").hide(); //hide loading image
                 },
                 error: function(xhr, desc, err) {
                     console.log(xhr);
                     console.log("Details: " + desc + "\nError:" + err);
                     alert('Contact not saved.');
                     $(".addbutton").show(); //show submit button
                     $(".addcontactform .loadingImage").hide(); //hide loading image
                 }
             }); // end ajax call
             location.reload();
         },
         invalidHandler: function(event, validator) {
             // 'this' refers to the form
             var errors = validator.numberOfInvalids();
             if (errors) {
                 var message = errors == 1
                     ? 'You missed 1 field. It has been highlighted'
                     : 'You missed ' + errors + ' fields. They have been highlighted';
                 $("div.error span").html(message);
                 $("div.error").show();
             } else {
                 $("div.error").hide();
             }
         },
         rules : { // validation rules
             firstName: {
                 required: true,
                 minlength: 2
             },
             phoneNumber: {
                 required: true,
                 minlength: 14,
                 maxlength: 14,
                 digits: true,
                 regex: /^\([0-9][0-9][0-9]\)-[0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/
             }
         },
         messages : { //validation messages
             firstName: {
                 required: "Please enter a first name.",
                 minlength: "Please enter a name that's at least 2 characters long."
             },
             phoneNumber: {
                 required: "Please enter a phone number.",
                 minlength: "Please enter a phone number in the following format: (800)-555-1234.",
                 maxlength: "Please enter a phone number in the following format: (800)-555-1234.",
                 digits: "Please enter a phone number.",
                 regex: "Please enter a phone number in the following format: (800)-555-1234."
             }
         }
     });

     // AJAX for deleting contacts
     $('body').on('click', '[name="Delete"]', function deleteContact (e) {
         e.preventDefault();
         var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode) || NEED TO FIX
         var pbid = clickedID[1]; //and get number from array
         //$('#Delete-' + pbid).hide(); //hide delete button
         //$(".loadingImage-" + pdid).show(); //show loading image
         $.ajax({
             url: 'delete.php',
             type: 'post',
             data: {
                 'pb_Id': pbid
             },
             success: function() {
                 alert('Your contact has been deleted.');
             },
             error: function(xhr, desc, err) {
                 console.log(xhr);
                 console.log('Details: ' + desc + '\nError:' + err);
                 alert('Contact not deleted.');
             }
         }); // end ajax call
         location.reload();
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

 });