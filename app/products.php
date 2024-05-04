<!DOCTYPE html>
<?php
    ob_start();
    include "connection.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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

        button {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .delete-link {
            color: #f44336;
            text-decoration: none;
            transition: color 0.3s;
        }

        .delete-link:hover {
            color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product List</h1>

        <div class="button-container">
            <button onclick="location.href='add_product.php'">Add Product</button>
            <button onclick="location.href='add_category.php'">Add Category</button>
        </div>

        <table>
            <tr>
                <th>N°</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <?php
                $stmt = $connection->query("SELECT p.id, p.name, p.price, c.cat_name FROM products p JOIN category_product c
                                            WHERE p.category_id = c.id");
                $stmt->execute();
                $i = 0;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . ++$i . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['cat_name']) . "</td>";
                    echo "<td><a class='delete-link' href='delete.php?id=$row[id]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>