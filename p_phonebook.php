<?php
 session_start(); 
/**
 *
 * @author Masande
 * Create 08-April-2014
 */
 
require_once 'init.php';

if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $cell_no = $_POST['cell_no'];
    $tel_no = $_POST['tell_no'];
    $other_field = $_POST['boxes'];
    if(!empty($other_field))
    {   
    $boxes = implode(", ", $other_field);
    }
    
    
    if(!$object->validate_text($first_name))
    {
        $_SESSION['error'] = "Please enter your first name.";
        header("location:index.php");
        exit;
    }
    elseif (!$object->validate_text($last_name))
    {
        $_SESSION['error'] = "Please enter your last name .";
        header("location:index.php");
        exit;
    }
    elseif (!$object->validate_email($email))
    {
        $_SESSION['error'] = "Please enter your email .";
        header("location:index.php");
        exit;
    }
    elseif (!$object->validate_number($cell_no))
    {
        $_SESSION['error'] = "Please enter your Cell No .";
        header("location:index.php");
        exit;
    }
     elseif (!$object->validate_number($tel_no))
    {
        $_SESSION['error'] = "Please enter your Tell No .";
        header("location:index.php");
        exit;
    }
   
 else 
     {
         
//         $data = array(
//                "first_name"=>$object->clean($first_name), 
//                "last_name"=>$object->clean($last_name), 
//                "email"=>$object->clean($email),
//                "cell_no"=>$object->clean($cell_no), 
//                "tel_no"=>$object->clean($tel_no),
//                "boxes"=>$object->clean($boxes)
//                );
        
            if($object->save($object->clean($first_name), $object->clean($last_name), $object->clean($email), $object->clean($cell_no) , $object->clean($tel_no), $object->clean($boxes) == true)
            {
                $_SESSION['success'] = "The phone number was saved.";
                header("location:index.php");
                    exit;
            }else{
                $_SESSION['error'] = "Error please try again later.";
                header("location:index.php");
                exit;
            }
     }
        
  
    
    
}
?>
