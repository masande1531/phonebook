<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Masande
 * Create 08-Aoril-2014
 */
require_once 'database.php';

class phonebook extends Database{
    
    function __construct()
    {
        parent::mysqlConnect();
    }

    //Save phone book information entered from the form
    function save($first_name, $last_name, $email, $cell_no , $tel_no, $boxes) 
     {
        $save = mysql_query("INSERT INTO `phone_book` (`id`, `first_name`, `last_name`, `email`, `cell_no`, `tel_no`, `boxes`)
                            VALUES (NULL, '$first_name', '$last_name', '$email', '$cell_no', '$tel_no', '$boxes')") or die(mysql_error());  
            
        if(!$save)
        {
            return mysql_error();
        }
        return $save;
        
    }

    //View stored information
    function view() 
    {
        
        
        $view = mysql_query("select id, first_name, last_name, email, cell_no, tel_no from phone_book")or die(mysql_error());
      
        if($view > 1)
        {
            $results = "<table class='table table-bordered'><tr><th>id</td><th>First name</td><th>Last Name</td><th>Email</td><th>Cell No#</td><th>Tell No#</td><th>Boxes</td>";
             
        while($row=mysql_fetch_array($view)){
                        
                        $results .= "<tr><td>";
			$results .= $row['id'];
                        $results .= "</td><td>";
                        $results .= $row['first_name'];
                        $results .= "</td><td>";
                        $results .= $row['last_name'];
                        $results .= "</td><td>";
                        $results .= $row['email'];
                        $results .= "</td><td>";
                        $results .= $row['cell_no'];
                        $results .= "</td><td>";
                        $results .= $row['tel_no'];
                        $results .= "</td><td>";
                        $results .= $row['boxes']; 
                        $results .= "</td></tr>";
		}
                $results .= "</table>";
        }else{ echo "Phone book empty!";}
         return $results;
    }

    function clean($data) 
    {
        $data = trim($data);
        $data .= stripslashes($data);
        $data .= htmlspecialchars($data);
        $data .= mysql_real_escape_string($data);

        return $data;
    }
    
    function validate_text($text)
    {
        if(!preg_match("/^([a-zA-Z])+$/i", $text))
        {
            return false;
        }
        
        return $text;
    }

    function validate_email($email)
    {
       if (!filter_var($email, FILTER_VALIDATE_EMAIL))
       {
           return false;
           
       }
       
       return $email;
    }

    function validate_number($number) {
        
        if (!is_numeric($number) ||  $number <= 9 || empty($number)) 
            {
                return FALSE;
            }
            
            return $number;
    }

}

?>
