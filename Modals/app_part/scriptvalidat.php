<script type="text/javascript">
	
   $(document).ready(function() {

 $('#fromcontact').validate({
  
   
         rules: {   

                    Mobile: { 
                       number: true
                       
                    },


         	email: {
                       required: true,
                       email: true
                       
                    }
                  },

                submitHandler: function (form) {
                 
                       // form.submit();
                }
 });

 $('#careerForm').validate({
  
   rules: {
                    MobileNo: {
                       required: true,
                       number: true
                       
                    },


                    Email: {
                       required: true,
                       email: true
                       
                    }
                  },

                submitHandler: function (form) {
                 
                       // form.submit();
                }
 });

 
$("#NewsletterSubscribe_ancJoin").click(function() {
  
 
   var form3 = $("#subscribForm");  
     form3.validate();
      var issuccesss= form3.valid();
       if (issuccesss) {


      
 
var Email = $('#txtNLEmail').val();
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if(Email.match(mailformat))
{
 
       $('#subscribForm').submit();           
 
    
 
}
else
{
    
   alert("<?php  echo $langs["Validation_Email_Msg"]; ?>");
 
} 

}   
 

});


 
$("#submitfromcontact").click(function() {
  
   var form3 = $("#fromcontact");  
     form3.validate();
      var issuccesss= form3.valid();
    
      if(issuccesss==true){  
         $boolemail=false;
var Email = $('#email').val();
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if(Email.match(mailformat))
{
   $boolemail=true;
 $('#Email-complete').hide(); 
   form3.submit();
 
}
else
{
   $boolemail=false;
  $('#Email-complete').html("<p style=color:red> <?php  echo $langs["Validation_Email_Msg"]; ?> </p>");
 
}    
//if ($boolemail) {  form3.submit();}
 }

});

$("#submitCareerform").click(function() {
  
   var form3 = $("#careerForm");  
     form3.validate();
      var issuccesss= form3.valid();
    
      if(issuccesss==true){  
         $boolemail=false;
var Email = $('#Email').val();
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if(Email.match(mailformat))
{
   $boolemail=true;
 $('#Email-complete').hide(); 
   //form3.submit();
 
}
else
{
   $boolemail=false;
  $('#Email-complete').html("<p style=color:red> <?php  echo $langs["Validation_Email_Msg"]; ?> </p>");
 
}    
if ($boolemail) {  form3.submit();}
 }

});

   (function( factory ) {
  if ( typeof define === "function" && define.amd ) {
    define( ["jquery", "jquery.validate"], factory );
  } else {
    factory( jQuery );
  }
}
(function( $ ) { 
$.extend($.validator.messages, {
  required: "<strong style='color:#ff0000;font-size:15px'><?php  echo $langs["Validation_Required_Msg"]; ?></strong>",
  email: "<strong style='color:#ff0000;font-size:15px'><?php  echo $langs["Validation_Email_Msg"]; ?></strong>",
  number: "<strong style='color:#ff0000;font-size:15px'><?php  echo $langs["Validation_Number_Msg"]; ?></strong>"
});

}));                





 $('#accountstatementrequest').validate({
  
   
         rules: {   

                    Mobile: { 
                       number: true
                       
                    },

                    Date: { 
                        
                        required: true
                       
                    },

                    branchbank: { 
                       required: true
                       
                    },

                    Currency1: { 
                       number: true
                       
                    },

                    Currency2: { 
                       number: true
                       
                    },

                    Currency3: { 
                       number: true
                       
                    },

                    Currency4: { 
                       number: true
                       
                    },

                    Currency5: { 
                       number: true
                       
                    },

                    anthcurrncy1: { 
                       number: true
                       
                    },

                    anthcurrncy2: { 
                       number: true
                       
                    },

                    anthcurrncy3: { 
                       number: true
                       
                    },

                    anthcurrncy4: { 
                       number: true
                       
                    },

                    anthcurrncy5: { 
                       number: true
                       
                    },

                    movement: { 
                       required: true
                       
                    },


                    process: { 
                       required: true
                       
                    },
                    FromDate: { 
                       required: true
                       
                    },
                    EndDate: { 
                       required: true
                       
                    },
                    inanthcurrcy: { 
                       required: true
                       
                    } 
                    
                    
                  }
 });


 $('#websurferForm').validate({
  
   
         rules: {   

                    numbercard: { 
                       number: true
                       
                    },

                    money: { 
                        number: true
                        
                       
                    },

                    money1: { 
                        number: true
                       
                    } 
                    
                  }
 });


$("#submitacountstatment").click(function() {
  
   var form3 = $("#accountstatementrequest");  
     form3.validate();
      var issuccesss= form3.valid();
    
      if(issuccesss==true){ form3.submit(); }

}); 


$("#websurfersubmit").click(function() {
  
   var form3 = $("#websurferForm");  
     form3.validate();
      var issuccesss= form3.valid();
    
      if(issuccesss==true){ form3.submit(); }

}); 



});



 
  $(document).ready(function(e) {

  	
            $("#fromcontact").submit(function(e){ 
                
                e.preventDefault();
                var formData =$(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "Modals/app_part/emailSendContact.php",
                  data: formData,
                  success: function(html){
                 
                 
                  $('#alert_notif').show();
                 
                 $('#alert_notif').html(html);
                    
               
                   }
                });
                return false;
              });

            $("#careerForm").submit(function(e){ 
                
                e.preventDefault();
                var formData =$(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "Modals/app_part/emailSendCareer.php",
                  data: formData,
                  success: function(html){
                 
                 
                  $('#alert_notif').show();
                 
                 $('#alert_notif').html(html);
                    
               
                   }
                });
                return false;
              });

            

            $("#subscribForm").submit(function(e){ 
                
                e.preventDefault();
                var formData =$(this).serialize();

                $.ajax({
                  type: "POST",
                  url: "techcms/Models/App_Classes/subscribadd.php",
                  data: formData,
                  success: function(html){
                    alert(html);
                 
                   
                    
               
                   }
                });
                return false;
              });


            $("#accountstatementrequest").submit(function(e){ 
                
                e.preventDefault();
                var formData =$(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "Modals/emailform/sentacountstatment.php",
                  data: formData,
                  success: function(html){
                 
                 
                  $('#alert_notif').show();
                 
                 $('#alert_notif').html(html);
                    
               
                   }
                });
                return false;
              });


            $("#websurferForm").submit(function(e){ 
                
                e.preventDefault();
                var formData =$(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "Modals/emailform/websurferemail.php",
                  data: formData,
                  success: function(html){
                 
                 
                  $('#alert_notif').show();
                 
                 $('#alert_notif').html(html);
                    
               
                   }
                });
                return false;
              });



  });
</script>