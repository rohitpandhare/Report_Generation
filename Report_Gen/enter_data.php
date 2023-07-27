<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter T_ID</title>
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

        .container form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .container form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex-grow: 1;
        }

        .container form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .container form button:hover {
            background-color: #555;
        }

        .container p {
            text-align: center;
            color: #666;
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
        <h1>Enter T_ID</h1>
        <form action="print.php" method="get">
            <input type="text" name="id" id="T_ID" placeholder="Enter your T_ID" required>
            <button type="submit">Submit</button>
        </form>
        <!-- Add the "Print All Data" button -->
        <form action="print_all.php" method="get">
            <button type="submit">Print All Data</button>
        </form>
    </div>
</body>
</html>
