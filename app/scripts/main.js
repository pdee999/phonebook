 $(document).ready(function(){

     // form validation
     $("form.addcontactform").validate({
         rules : {
             firstName: {
                 required: true,
                 minlength: 2
             },
             lastName: {},
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
             lastName: {},
             phoneNumber: {
                 required: "Please enter a phone number.",
                 minlength: "Please enter at least 10 digits.",
                 maxlength: "Please enter no more than 10 digits.",
                 digits: "Please enter an unformatted phone number (i.e. 8005551234)."
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

     /*
      // AJAX for adding contacts
      $('.button').click(function(){
      var clickBtnValue = $(this).val();
      var ajaxurl = 'session_start.php',
      data =  {'action': clickBtnValue};
      $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      alert("Your contact has been saved!");
      });
      });
      */

 });