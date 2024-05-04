<?php
    ob_start();
    include "connection.php";
    if(isset($_POST['btn'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        $select = $connection->query("SELECT id FROM category_product WHERE cat_name = '$category'");
        $id = $select->fetchColumn();

        $query = "INSERT INTO products(name, price, category_id) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->execute(array($name, $price, $id));

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
    <title>Add Product</title>
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
            max-width: 800px;
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

        input[type="text"],
        input[type="number"] {
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

        .select-wrapper {
            display: flex;
        }

        select {
            flex: 1;
            padding: 8px;
            border-radius: 4px 0 0 4px;
            border: 1px solid #ccc;
        }

        button[type="button"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="button"]:hover {
            background-color: #45a049;
        }

        .btn {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>

        <form method="POST">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" min="0" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <div class="select-wrapper">
                    <select id="category" name="category" required>
                        <option value="">Select a category</option>
                        <?php
                            $stmt = $connection->query("SELECT cat_name FROM category_product");
                            $stmt->execute();

                            while($row = $stmt->fetchColumn()){
                                echo "<option value='$row'>". $row . "</option>";
                            }
                        ?>
                    </select>
                    <button type="button" onclick="location.href='add_category.php'">Add Category</button>
                </div>
            </div>
            <div class='btn'>
                <button type="submit" name="btn">Add Product</button>
            </div>
        </form>
    </div>
</body>
</html>
