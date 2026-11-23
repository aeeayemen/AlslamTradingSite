<?php
/**
 * كلاس اخر لدوال قاعدة البيانات 
 */
class DB_Class
{
   var $db_connection;         //The MySQL database Vconnection
   var $sqlquery;   //Number of active users viewing site
   var $result;  //Number of active guests viewing site
   var $error_logs;
   /* Note: call getNumMembers() to access $num_members! */

   /* Class constructor */
   function DB_Class(){
   
   }
  

    /**
       * this funcation to create db connection db_connect.
    */
   
 protected function connect_db()
  {
  if(isset($this->db_conn)) {
         // Load configuration as an array. Use the actual location of your configuration file
       $this->disconnect_db();
    }else{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);
    // If connection was not successful, handle the error
     $connection->query('SET character_set_results=utf8');
    $connection->query("SET NAMES utf8mb4");
    $connection->query('SET character_set_client=utf8');
    $connection->query('SET character_set_connection=utf8');
    $connection->query('SET character_set_results=utf8');
    $connection->query('SET collation_connection=utf8_general_ci');      
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        $connection=mysqli_connect_error();
         return $connection;   
    }else{
         
        $this->error_logs="";
    return $connection;    
    }
    }
}
 /**
 * Thsi funcation to disconect connection 
*/
  protected  function disconnect_db($con)
    {
        if(!$con)
        {
		 $this->result="";
           $this->sqlquery=""; 
           $this->error_logs="";
        }else{
        mysqli_close($con);
           $this->result="";
           $this->sqlquery=""; 
           $this->error_logs="";
           $this->db_connection=null;
        }
	}
    
 /**
 * (1 or 2). On success it returns 0.
*/    
 protected function db_query($query) {
    // Connect to the database
    $con=$this->connect_db();
    // Query the database  
    $result = mysqli_query($con,$query);
    
      if (!$result)
  {
     $result="nonewiterror" . mysqli_error($con);
      return $result;
  }else{
   return $result;
     mysqli_free_result($result);
    $this->disconnect_db($con);
  }
    
}

  
 
};

/* Create database Appconnection */

?>
