<script src="./js/user_infos.js"></script>

<?php
    if (isset($_SESSION['username'])) {
        echo "<script>update_username('".$_SESSION['username']."');</script>";
        $get_user_data_stmt = mysqli_prepare($con, "SELECT secur_ques, secur_ans, email, phone, addrs, gender, birthdate, fname, lname FROM user_infos WHERE username = '".$_SESSION['username']."'");
    
        if ($get_user_data_stmt) {
            mysqli_stmt_execute($get_user_data_stmt);
            mysqli_stmt_bind_result($get_user_data_stmt, $secur_ques, $secur_ans, $email, $phone, $addrs, $gender, $birthdate, $fname, $lname);
            mysqli_stmt_fetch($get_user_data_stmt);
            if (!$fname) {
                echo "Error: ";
            }
            echo '<script>bind_existing_data("'.$fname.'", "'.$lname.'", "'.$gender.'", "'.$birthdate.'", "'.$email.'", "'.$phone.'", "'.$addrs.'", "'.$secur_ques.'", "'.$secur_ans.'");</script>';
            mysqli_stmt_close($get_user_data_stmt);
        }
    }
?>