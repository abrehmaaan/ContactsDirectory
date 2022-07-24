<?php
if(isset($_GET)){
    $fn = $_GET['fname'];
    $ln = $_GET['lname'];
    $found = false;
    $arr = array();
    if($fn == "" || $ln == ""){
        echo "<p>You must enter value in each field. Click your browser's back button to go back to form.</p>";
    }
    else{
        $fptr = fopen("contacts.txt", "r");
        if($fptr){
            if(flock($fptr,LOCK_EX)){
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
        <h1>Online Contacts Directory</h1>
        <h3>Contact Found</h3>
        <form action="updateEntry.php" method="post">
            <table>
                <tr>
                    <td>
                    <label for="fname">First Name</label>
                    </td>
                    <td>
                    <input type="text" name="fname" id="fname" value="<?php echo $fname ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="lname">Last Name</label>
                    </td>
                    <td>
                    <input type="text" name="lname" id="lname" value="<?php echo $lname ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="email">Email Address</label>
                    </td>
                    <td>
                    <input type="email" name="email" id="email" value="<?php echo $email ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="phone">Phone Number</label>
                    </td>
                    <td>
                    <input type="tel" name="phone" id="phone" value="<?php echo $phone ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="address">Address</label>
                    </td>
                    <td>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="city">City</label>
                    </td>
                    <td>
                    <input type="text" name="city" id="city" value="<?php echo $city ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="state">State</label>
                    </td>
                    <td>
                    <select id="state" name="state">    
                <option value="<?php echo $state ?>" selected><?php echo $state ?></option>
                <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Arizona">Arizona</option>
                <option value="Arkansas">Arkansas</option>
                <option value="Baker Island">Baker Island</option>
                <option value="California">California</option>
                <option value="Colorado">Colorado</option>
                <option value="Connecticut">Connecticut</option>
                <option value="Delaware">Delaware</option>
                <option value="District of Columbia">District of Columbia</option>
                <option value="Florida">Florida</option>
                <option value="Georgia">Georgia</option>
                <option value="Guam">Guam</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Howland Island">Howland Island</option>
                <option value="Idaho">Idaho</option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Jarvis Island">Jarvis Island</option>
                <option value="Johnston Atoll">Johnston Atoll</option>
                <option value="Kansas">Kansas</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Kingman Reef">Kingman Reef</option>
                <option value="Louisiana">Louisiana</option>
                <option value="Maine">Maine</option>
                <option value="Maryland">Maryland</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Michigan">Michigan</option>
                <option value="Midway Atoll">Midway Atoll</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option>
                <option value="Montana">Montana</option>
                <option value="Navassa Island">Navassa Island</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Nevada">Nevada</option>
                <option value="New Hampshire">New Hampshire</option>
                <option value="New Jersey">New Jersey</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New York">New York</option>
                <option value="North Carolina">North Carolina</option>
                <option value="North Dakota">North Dakota</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Ohio">Ohio</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oregon">Oregon</option>
                <option value="Palmyra Atoll">Palmyra Atoll</option>
                <option value="Pennsylvania">Pennsylvania</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Rhode Island">Rhode Island</option>
                <option value="South Carolina">South Carolina</option>
                <option value="South Dakota">South Dakota</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas">Texas</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="United States Virgin Islands">United States Virgin Islands</option>
                <option value="Utah">Utah</option>
                <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Washington">Washington</option>
                <option value="West Virginia">West Virginia</option>
                <option value="Wisconsin">Wisconsin</option>
                <option value="Wyoming">Wyoming</option>
            </select>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="zip">Zip</label>
                    </td>
                    <td>
                    <input type="text" name="zip" id="zip" value="<?php echo $zip ?>"/>
                    </td>
                </tr>
            <tr>
                <td colspan="2">
                <button type="submit">Update Entry</button>
                </td>
            </tr>
            </table>
        </form>        
        <p><a href="index.html">Return to Directory</a></p>
    </body>
</html>
                    <?php
                }
                else{
                    $arr[] = $contact;
                }
            }
            if(!$found){
                echo "<p>Contact not found.</p><p><a href='index.html'>Return to Directory</a></p>";
            }
            else{
                $ffptr = fopen("contacts.txt", "w");
                if($ffptr){
                    foreach ($arr as $contact) {
                        fwrite($ffptr, $contact);
                    }
                }
                fclose($ffptr);
            }
            flock($fptr, LOCK_UN);
        }
        else{
            echo "<p>File can't be locked. Please try again later.</p><p><a href='index.html'>Return to Directory</a></p>";
        }
        }
        else{
            echo "<p>File can't be opened.</p><p><a href='index.html'>Return to Directory</a></p>";
        }
        fclose($fptr);
    }
}
?>