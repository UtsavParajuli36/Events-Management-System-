<?php
    if(isset($_POST['submit'])){
        if(($_POST['submit']) != false){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $eventType=$_POST['eventType'];
        $start_date=$_POST['startDate'];
        $end_date=$_POST['endDate'];
        $venue=$_POST['venue'];
        $conn=mysqli_connect('localhost','root','','summer_project');
        if(!$conn){
            die("Connection failed: ".mysqli_connect_errno() );
        }
        if(empty($name) || !(preg_match("/^[a-zA-Z ]*$/",$name)) 
        || empty($address)
        || empty($phone)  
        || !(preg_match("/^98[0-9]{8}$/",$phone)) 
        || $eventType==1
        || $start_date==null
        || $end_date==null
        || empty($venue)){
            die("Data not submitted.");
        }
        
        $sql1 = "INSERT INTO customers(name,address,contact)
            VALUES 
            ('$name','$address','$phone')";
        if(mysqli_query($conn, $sql1)) {
            echo "Your information has been submitted. <br>";
        }
        else{
            echo "Error";
        }
        $id=mysqli_insert_id($conn);
        $sql2 = "INSERT INTO events(type,event_start_date,event_end_date
        ,venue,customer_id)
            VALUES 
            ('$eventType','$start_date','$end_date','$venue','$id')";
        if(mysqli_query($conn, $sql2)) {
            echo "Please await our reply patiently.";
        }
        else{
            echo "Error";
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <style type="text/css">
        *{
            text-decoration:none;
        }
    </style>
</head>
<body>
    <br>
    <button><a href="../HTML/homepage.html">Back To HomePage</a></button>
</body>
</html>