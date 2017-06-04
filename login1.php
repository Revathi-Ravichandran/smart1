<?php include "dbConfig.php";
session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $name = $_POST["username"];
    $password = ($_POST["password"]);

        if ($name == '' || $password == '') 
    {
        echo "You must enter all fields";
    }
 else
    {
        $sql = "SELECT * FROM login WHERE user = '$name' AND pwd = '$password'";
        $query = mysqli_query($link,$sql);
        $row=mysqli_fetch_array($query);
       
 
        if (mysqli_num_rows($query) > 0) {
            $_SESSION["user"]= $row[user];
             
            if ($row[type]== "admin")
            {
            header("Location: home.php?action=yes");
            }
            elseif ($row[type]== "user")
             {
             header("Location: userhome.php?action=yes");
             }
            else
                {
               header("Location: nurhome.php?action=yes");
                    }

                                  }
            
        echo "Username and password do not match";
    }
    mysqli_close($link);
    //if(isset($_SESSION["user"]))
   // {
    //  header('Location: profile.php');
    // }
}

?>
