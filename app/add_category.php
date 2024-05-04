<?php
    ob_start();
    include "connection.php";

    if(isset($_POST['btn'])) {
        $categoryName = $_POST['category_name'];

        $query = "INSERT INTO category_product(cat_name) VALUES (?)";
        $stmt = $connection->prepare($query);
        $stmt->execute([$categoryName]);

        header("Location: products.php");
        exit();
    }
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Category</h1>

        <form method="POST">
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" id="category_name" name="category_name" required>
            </div>
            <div class='btn'>
                <button type="submit" name="btn">Add Category</button>
            </div>
        </form>
    </div>
</body>
</html>
