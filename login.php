<?php 

include 'conn.php';
if(isset($_SESSION['id'])){
    header("location:mainpage.php");
}



$email = $_POST['email'];
$password = $_POST['password'];

$qry="select * from companyinfo where company_email='$email' && company_password='$password' "; 
$result=mysqli_query($conn,$qry);
$count=mysqli_num_rows($result);
if($count>0){
    
    while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['key']=$row['id']; 
    $_SESSION['name'] = $row['company_name'];
	 
    }
    echo "Successfully logged in";
    header('location:mainpage.php');
    
}else{
	echo "Username/Password didnt match";
}









?>