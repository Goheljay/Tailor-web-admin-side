<?php
function email_exists($email,$conn)
{
    # code...
    $row=mysqli_query($conn,"SELECT email FROM admin_login WHERE email='$email'");
    // print_r($row);
    {
        if (mysqli_num_rows($row)==1) {
            # code...
            return true;
        }else {
            return false;
        }
    }
}

function logged_in(){
    if ($_SESSION['mail'] == '') {
        # code...
        return true;
    }else {
        return false;
    }
}

?>