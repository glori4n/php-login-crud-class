<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php 
session_start();

// Detects if there is someone logged in.
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
    
    // Detects if there was a submission from forms.
    if(isset($_POST["submit"])){

        $email = addslashes($_POST["email"]);
        $password = md5(addslashes($_POST["password"]));

        // Sends the parameters to connect and instantiates the DB class in the $db variable.
        require 'db.php';
        require 'dbconn.php';

        // Sends the query to DB's query class with the form's data.
        $db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
        
        // Counts the row for the provided user to see if it exists.
        if($db->rowNum() > 0){

            // Stores user's id on the session's id, therefore loggin in the user.
            $_SESSION["id"] = true;
            
            header("Location: index.php");

        }else{
            echo "Incorrect password, please try again.";
        }
    }

?>

    <h2>Please login before you can access the system:</h2>

    <form method="POST">
        <label>E-mail:</label>
        <input type="email" name="email">
        <label>Password:</label>
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>

<?php

}else{
    echo "<h1> You are already logged in.</h1>";
    echo "<a href='logout.php'>Click here to log out</a>";
    header("Refresh:3; url=list.php");
}

require 'footer.php';

?>