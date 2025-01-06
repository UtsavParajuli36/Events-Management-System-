<?php
        $conn=mysqli_connect('localhost','root','','summer_project');
        if(!$conn){
            die("Connection failed: ".
            mysqli_connect_errno() );
        }

        // Creating a new database
        $sql1="CREATE DATABASE summer_project";
        if(mysqli_query($conn,$sql1)){
            echo "Database banyo.";
        }
        else{
            echo "Database banena";
        }

        // Creating new tables
        $sql2="CREATE TABLE customers
            (
            customer_id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            address VARCHAR(30) NOT NULL,
            contact BIGINT NOT NULL
            )";
        if(mysqli_query($conn,$sql2)){
            echo "Table customers created successfully.";
        }
        else{
             echo "Table customers not created.";
        }
        $sql3="CREATE TABLE photographers
            (
            photographer_id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            address VARCHAR(30) NOT NULL,
            contact BIGINT NOT NULL,
            std_rate_per_hr INT NOT NULL
            )";
        if(mysqli_query($conn,$sql3)){
            echo "Table photographers created successfully.";
        }
        else{
             echo "Table photographers not created.";
        }
        $sql4="CREATE TABLE events
            (
            event_id INT AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(30) NOT NULL,
            event_start_date DATE NOT NULL,
            event_end_date DATE NOT NULL,
            venue VARCHAR(30) NOT NULL,
            customer_id INT NOT NULL,
            FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
            )";
        if(mysqli_query($conn,$sql4)){
            echo "Table events created successfully.";
        }
        else{
             echo "Table events not created.";
        }
        $sql5="CREATE TABLE photgraphers_events
            (
                photographer_id INT NOT NULL,
                event_id INT NOT NULL,
                PRIMARY KEY (photographer_id, event_id),
                FOREIGN KEY (photographer_id) REFERENCES photographers(photographer_id),
                FOREIGN KEY (event_id) REFERENCES events(event_id)
            
            )";
        if(mysqli_query($conn,$sql5)){
            echo "Table photgraphers_events created successfully.";
        }
        else{
             echo "Table photgraphers_events not created.";
        }
        $sql6="CREATE TABLE payments
            (
            payment_id INT AUTO_INCREMENT PRIMARY KEY,
            payment_date DATE,
            mode VARCHAR(30) NOT NULL,
            photographer_id INT NOT NULL,
            event_id INT NOT NULL,
            INDEX(photographer_id, event_id),
                FOREIGN KEY (photographer_id) REFERENCES photographers(photographer_id),
                FOREIGN KEY (event_id) REFERENCES events(event_id)
            )";
        if(mysqli_query($conn,$sql6)){
            echo "Table payments created successfully.";
        }
        else{
             echo "Table payments not created.";
        } 
        mysqli_close($conn);
?>