<?php
        /*** begin the session ***/
        

        /*** check all expected variables are set ***/
        if(!isset($_POST['form_token'], $_SESSION['form_token']))
        {
                $message = 'Invalid Submission';
        }
        /*** check the form tokens match ***/
        elseif($_POST['form_token'] != $_SESSION['form_token'])
        {
                $message = 'Access denied';
        }
        /*** check the input name is a string between 1 and 50 characters ***/
        elseif(strlen(trim($_POST['fname'])) == 0 || strlen(trim($_POST['fname'])) > 50)
        {
                $message = 'Invalid First Name';
        }
        else
        {
                /*** sanitize the input ***/
                $first_name = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);

                /*** assign the input ***/
                $message = 'Thank you ' . $first_name;

                /*** unset the form token in the session ***/
                unset( $_SESSION['form_token']);
        }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>My Form</title>
</head>
<body>

<h1>Submit Page</h1>
<p><?php echo $message; ?></p>
</body>
</html>