<?php
    require('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT Username, Password_hash FROM Users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($username == $row['Username'])
            {
                if (password_verify($password, $row['Password_hash']))
                {
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: homepage.html");
                }
                else
                {
                    setcookie('auth', 'fail', time() + 60);
                    header("Location: auth.php");
                }
            }
        }
    }
    else
    {
        setcookie('auth', 'fail', time() + 60);
        header("Location: auth.php");
    }
?>