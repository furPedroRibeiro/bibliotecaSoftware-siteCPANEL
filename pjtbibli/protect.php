<?php
    session_start();
       
    $protect = $_SESSION['prot']; 
    if(!isset($protect)){
        header('Location: index.php');
    } else{
        
    }
?>