<?php
require('connect.php');
try
{
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = "SELECT Username, Password_hash FROM Users";
    $result = $conn->query($sql);
    $flag = FALSE;
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($user == $row['Username'])
            {
                $flag = TRUE;
                if (password_verify($password, $row['Password_hash']))
                    header("Location: homepage.html");
                else
                    echo '<br><span style="color: red">Incorrect password!</span>';
            }
        }
    }
    if (!$flag)
        echo '<br><span style="color: red">Invalid username!</span>';
}
catch (Exception $e)
{
    echo $e;
}
?>