<?php
include("App_constant.php");

class Formbuilder
{
   var $form;     //Username given on sign-up
   var $elements;       //Random value generated on current login
   var $table;       //Random value generated on current login
   var $sqlcommand;    //The level to which the user pertains
   
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */
   function Formbuilder(){
     
   }

 /**
    * Note:this funcation to set the options of form
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */
   function set_options($form){
     
   }
  /**
    * Note:this funcation to set the options of form
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */  
   
function set_filds($elements){
     
   }
  
 /**
    * Note:this funcation to set the options of form
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */  
  function set_actions($actions){
     
   }

};
//$Formbuilder_cls = new Formbuilder;

/* Initialize form object */
//echo $Applogins_cls->login("mmm","engassa");
?>
