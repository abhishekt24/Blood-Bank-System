<?php
    session_start();
    include_once 'connection.php';
    $username1 = $_SESSION['username'];
    $password = $_SESSION['password'];
    $d_id = $_SESSION['login_id'];
    
    $sql = "SELECT aadhar_no FROM donor where d_id='$d_id'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $aadhar_no = $row['aadhar_no'];
    
    $stmt3 = $conn->prepare("DELETE FROM user where username=?");
    $stmt3->bind_param("s",$username1);
    if($stmt3->execute())
    {
        echo '<center style="margin-top:150px;"><h1>Thank you for being with us!</h1><center><br>';
        echo '<a href="index.html"><input type="button" value="Go to Home" style="background-color: #f44336;box-shadow: 0 1px 4px black;border: none;height:35px;color:white;"></a>';
        session_unset();
    }
    else
        echo "<h1>Deletion Failed</h1>";
?>
