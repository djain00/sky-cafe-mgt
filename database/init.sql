CREATE DATABASE IF NOT EXISTS sky_cafe;

USE sky_cafe;

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    table_number INT NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    food_items TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'Not Prepared',
    served VARCHAR(10) DEFAULT 'No',
    billed VARCHAR(10) DEFAULT 'No',
    order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
