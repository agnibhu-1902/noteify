<?php
        require('connect.php');
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if ($password == $cpassword)
        {
            $sql = "INSERT INTO Users(Username, Email, Password_hash) VALUES('$username', '$email', '$hash')";
            $result = $conn->query($sql);
            if (!$result)
            {
                setcookie('insert', 'fail', time() + 60);
                header("Location: auth.php");
            }
            else
                header("Location: auth.php");
        }
        else
        {
            setcookie('password_match', 'fail', time() + 60);
            header("Location: auth.php");
        }
    ?>