<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php
session_start();

echo "<div style='text-align:center'><a href='logout.php'>Logout</a></div>";

// Detects if there someone logged in.
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
?>

<!-- Table for the users' display. -->
<table width="100%">
    <tr>
    <th>Name</th>
    <th>E-mail</th>
    <th>Actions</th>
    </tr>
    <?php

    // Sends the parameters to connect and instantiates the DB class in the $db variable.
    require 'db.php';
    require 'dbconn.php';

    // Fetches all users and sends it to the PDO.
    $db->query("SELECT * FROM users");

    if($db->rowNum() > 0){

        foreach($db->listEntries() as $user){
            echo "<tr>";
            echo "<td style='text-align:center'>".$user["name"]."</td>";
            echo "<td style='text-align:center'>".$user["email"]."</td>";
            echo '<td style="text-align:center"><a href="edit.php?id='.$user["id"].'">Edit</a> - <a href="delete.php?id='.$user["id"].'">Delete</a>';
            echo "</tr>";
        }

    }else{
        echo "There are no registered users.";
    }
    
    ?>
</table>
<br>
<h2 style="text-align:center"><a href="add.php">Add new user</a></h2>

<?php

}else{
    header("Location: login.php");
}

require 'footer.php';

?>