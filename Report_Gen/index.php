<?php
$insert = false;
if (isset($_POST['Roll_No'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "main_db";

    try {
        // Create a database connection using PDO
        $con = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Collect post variables
        $Roll_No = $_POST['Roll_No'];
        $Class = $_POST['Class'];
        $T_ID = $_POST['T_ID'];
        $Student_Name = $_POST['Student_Name'];
        $Gender = $_POST['Gender'];
        $DOB = $_POST['DOB'];
        $Mobile_No = $_POST['Mobile_No'];
        $Email_ID = $_POST['Email_ID'];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO pro (`Roll_No`, `Class`, `T_ID`, `Student_Name`, `Gender`, `DOB`, `Mobile_No`, `Email_ID`) VALUES (:Roll_No, :Class, :T_ID, :Student_Name, :Gender, :DOB, :Mobile_No, :Email_ID)");
        $stmt->bindParam(':Roll_No', $Roll_No);
        $stmt->bindParam(':Class', $Class);
        $stmt->bindParam(':T_ID', $T_ID);
        $stmt->bindParam(':Student_Name', $Student_Name);
        $stmt->bindParam(':Gender', $Gender);
        $stmt->bindParam(':DOB', $DOB);
        $stmt->bindParam(':Mobile_No', $Mobile_No);
        $stmt->bindParam(':Email_ID', $Email_ID);

        // Execute the query
        if ($stmt->execute()) {
            // Flag for successful insertion
            $insert = true;
        } else {
            echo "ERROR: Unable to execute the query";
        }

        // Close the database connection
        $con = null;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TEC ERP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            margin: 0 0 20px;
            text-align: center;
            color: #333;
        }

        .container p {
            text-align: center;
            color: #666;
        }

        .container form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .container form input[type="number"],
        .container form input[type="text"],
        .container form input[type="date"],
        .container form input[type="phone"],
        .container form input[type="email"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px;
            width: calc(50% - 20px);
        }

        .container form p {
            width: 100%;
            text-align: center;
            margin: 5px 0;
        }

        .container form .btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
        }

        .submitMsg {
            text-align: center;
            color: #0d6efd;
            font-weight: bold;
            font-size: 18px;
        }

        .submitMsg a {
            color: #0d6efd;
            text-decoration: underline;
        }

        .submitMsg a:hover {
            color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <!-- "Enter Data" link to index.php -->
        <a href="index.php">Enter Data</a>
        <a href="enter_data.php">Generate Report</a>
    </div>
    <div class="container">
        <h1>Welcome to TEC ERP</h1>
        <p>Enter your details</p>
        <?php
        if ($insert == true) 
        {
            // echo "<p class='submitMsg'>Thanks for submitting !!!</p>";
            echo "<div class='submitMsg'>Thanks for submitting !!! </div>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="number" name="Roll_No" id="Roll_No" placeholder="Enter your Roll Number">
            <input type="text" name="Class" id="Class" placeholder="Enter your Class like A,B,C">
            <input type="text" name="T_ID" id="T_ID" placeholder="Enter your Terna ID">
            <input type="text" name="Student_Name" id="name" placeholder="Enter your name">
            <input type="text" name="Gender" id="Gender" placeholder="Enter your Gender">
            <p>Enter DOB</p>
            <input type="date" name="DOB" id="DOB" placeholder="Enter your DOB">
            <input type="phone" name="Mobile_No" id="phone" placeholder="Enter your Mobile Number">
            <input type="email" name="Email_ID" id="email" placeholder="Enter your email">
            <br>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
