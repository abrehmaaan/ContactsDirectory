<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Online Contacts Directory</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>        
<?php
if(isset($_POST)){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    if($fname == "" || $lname == "" || $email == "" || $phone == "" || $address == "" || $city == "" || $state == "" || $zip == ""){
        echo "<p>You must enter value in each field. Click your browser's back button to go back to form.</p>";
    }
    else{
        $contact = $fname."|".$lname."|".$email."|".$phone."|".$address."|".$city."|".$state."|".$zip."\n";
        $fptr = fopen("contacts.txt", "a");
        if($fptr){
            if(flock($fptr,LOCK_EX)){
            fwrite($fptr, $contact);
            echo "<p>Contact updated.</p><p><a href='index.html'>Return to Directory</a></p>";
            flock($fptr, LOCK_UN);
        }
        else{
            echo "<p>File can't be locked. Please try again later.</p><p><a href='index.html'>Return to Directory</a></p>";
        }
        }
        fclose($fptr);
    }
}
?>
</body>
</html>