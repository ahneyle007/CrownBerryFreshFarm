<?php

    $customerInfo = $_POST['customerInfo'];
    $firstItem = $_POST['firstItem'];
    $secondItem = $_POST['secondItem'];
    $thirdItem = $_POST['thirdItem'];
    $fourthItem = $_POST['fourthItem'];

    if(!empty($customerInfo)){
        if(!empty($firstItem)){
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "market_orders";

            //creating a connection

            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

            // check for connection error

            if(mysqli_connect_error()){
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            } else{
                    $sql = "INSERT INTO order-list(customerInfo,firstItem,secondItem,thirdItem,fourthItem)
                    values ($customerInfo,$firstItem,$secondItem,$thirdItem,$fourthItem)"  ;
                    
                    if(conn->query($sql)){
                        echo "Order received";
                    } else {
                        echo "Error: ".$sql ."<br>".$conn->error;
                    }

                    $conn->close();
            }


        } else{
            echo "Atleast First item should be filled";
            die();
        }

    }else {
        echo "Customer's info is required";
        die();
    }





    /*
    //Database connection

    $conn = new mysqli("localhost","root","","market_orders");

    if($conn-> connect_error){
        echo "failed connection";
        die('Connection Failed : '.$conn->connect_error);
    }else {
        $stmt = $conn->prepare("INSERT INTO order-list(customerInfo,firstItem,secondItem,thirdItem,fourthItem)
                values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$customerInfo, $firstItem, $secondItem, $thirdItem, $fourthItem );
        
    // execute the query
        $stmt->execute();
        echo "orders accepted successfully...";
        $stmt->close();
        $conn->close();     
    }
*/

?>