CREATE DATABASE ecommerce;
USE ecommerce;

CREATE TABLE ecommerce_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    category VARCHAR(100),
    color VARCHAR(50),
    price DECIMAL(10,2),
    description TEXT,
    image VARCHAR(255)
);

INSERT INTO ecommerce_products (name, category, color, price, description, image) VALUES
('Wireless Headphones', 'Electronics', 'Black', 2999.00, 'Bluetooth noise-cancelling headphones.', 'https://images.unsplash.com/photo-1585386959984-a4155224a1a0'),
('Running Shoes', 'Footwear', 'Red', 1999.00, 'Comfortable shoes for daily runs.', 'https://images.unsplash.com/photo-1584531903267-635b88a5f2fc'),
('Smart Watch', 'Wearable', 'Gray', 3499.00, 'Fitness tracker with heart rate monitor.', 'https://images.unsplash.com/photo-1612817154854-befc7a5a0c5d'),
('Backpack', 'Accessories', 'Blue', 1499.00, 'Durable travel backpack with multiple compartments.', 'https://images.unsplash.com/photo-1578517787690-4400a4c9c3c1');
