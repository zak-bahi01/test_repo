USE db_prod;

CREATE TABLE category_product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR(100)
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10, 2),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category_product(id)
);


