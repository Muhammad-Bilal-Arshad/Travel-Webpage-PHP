<?php
$insert = false;
$count = 0;
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['destination']) && isset($_POST['desc']))
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travelling";

    $con = mysqli_connect($server,$username,$password,$dbname);
    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    //echo "Connection Established successfully";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $destination = $_POST['destination'];
    $extra = $_POST['desc'];
    if (empty($name)) { $error_msg[]='You forgot to enter your name!'; $count++; echo '<script>alert("You forgot to enter your name!")</script>';}

    if (empty($age)) { $error_msg[]='You forgot to enter your age!'; $count++; echo '<script>alert("You forgot to enter your age!")</script>';}

    if (empty($gender)) { $error_msg[]='You forgot to enter your gender!'; $count++;echo '<script>alert("You forgot to enter your gender!")</script>';}

    if (empty($email)) { $error_msg[]='You forgot to enter your email!'; $count++;echo '<script>alert("You forgot to enter your email!")</script>';}

    if (empty($phone)) { $error_msg[]='You forgot to enter your phone number!'; $count++;echo '<script>alert("You forgot to enter your phone number!")</script>';}

    if (empty($destination)) { $error_msg[]='You forgot to enter your destination!'; $count++;echo '<script>alert("You forgot to enter your destination!")</script>';}

    if (empty($extra)) { $error_msg[]='You forgot to write a description!'; $count++;echo '<script>alert("You forgot to write a description!")</script>';}
    if($count == 0){


    $sql = "INSERT INTO trip (  name, age, gender, email, phone, destination, extra, date) VALUES ( '$name','$age','$gender','$email','$phone','$destination','$extra', current_timestamp());";
    //echo $sql;
    if($con->query($sql)==true){
        //echo "Successfully inserted"; 
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class = "image" src="pexels-stein-egil-liland-1933239.jpg" alt="Naran Kaghan">
    <div class="container">
        <h3>Welcome to Easy Travels.</h3>
        <p class = "intro">Please provide your details.</p>
        <?php
        if ($insert == true){
        echo "<p class = 'submission'>Your response has been submitted successfully</p>";  
    }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age"placeholder="Enter your age">
            <input type="text" name="gender" id="gender"placeholder="Enter your gender">
            <input type="text" name="email" id="email"placeholder="Enter your Email">
            <input type="text" name="phone" id="phone"placeholder="Enter your Phone number">
            <input type="text" name="destination" id="destination"placeholder="Enter your dream destination.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information that you deem necessary"></textarea>
            <button class = "btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>