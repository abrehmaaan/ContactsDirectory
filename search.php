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
if(isset($_GET)){
    $fn = $_GET['fname'];
    $ln = $_GET['lname'];
    $found = false;
    if($fn == "" || $ln == ""){
        echo "<p>You must enter value in each field. Click your browser's back button to go back to form.</p>";
    }
    else{
        $fptr = fopen("contacts.txt", "r");
        if($fptr){
            while($contact = fgets($fptr)){
                $details = explode("|",$contact);
                $fname = $details[0];
                $lname = $details[1];
                $email = $details[2]; 
                $phone = $details[3];
                $address = $details[4];
                $city = $details[5];
                $state = $details[6];
                $zip = $details[7];
                if($fn == $fname && $ln == $lname){
                    $found = true;
                    ?>
                    <h3>Contact Found</h3>
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><?php echo $fname ?></td>
                        <td>Last Name:</td>
                        <td><?php echo $lname ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $email ?></td>
                        <td>Phone:</td>
                        <td><?php echo $phone ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?php echo $address ?></td>
                        <td>City:</td>
                        <td><?php echo $city ?></td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td><?php echo $state ?></td>
                        <td>Zip:</td>
                        <td><?php echo $zip ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="index.html">Return to Directory</a></td>
                        <td><a href="update.php?fname=<?php echo$fname ?>&lname=<?php echo$lname ?>">Update Entry</a></td>
                        <td></td>
                    </tr>
                </table>
                <?php
                }
            }
            if(!$found){
                echo "<p>Contact not found.</p><p><a href='index.html'>Return to Directory</a></p>";
            }
        }
        else{
            echo "<p>File can't be opened.</p><p><a href='index.html'>Return to Directory</a></p>";
        }
        fclose($fptr);
    }
}
?>
</body>
</html>