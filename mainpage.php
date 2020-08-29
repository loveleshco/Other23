
<?php 
include"conn.php";
?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php



    $name= $_SESSION['name'];
    echo "<h1> Hello $name</h1>";
    echo '<form method="POST" action="logout.php"> 
    <button  type="submit" > 
    Logout
    </button>
    </form>';
    



?>

</body>
</html>


