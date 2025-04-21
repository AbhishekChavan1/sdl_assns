CREATE DATABASE IF NOT EXISTS grocery;
USE grocery;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    image VARCHAR(255)
);

-- INSERT INTO products (name, price, image) VALUES
-- ('Apples', 60, 'https://images.unsplash.com/photo-1567306226416-28f0efdc88ce'),
-- ('Bananas', 40, 'https://images.unsplash.com/photo-1574226516831-e1dff420e12b'),
-- ('Milk', 50, 'https://images.unsplash.com/photo-1582719478250-06a6a86b90b3'),
-- ('Bread', 30, 'https://images.unsplash.com/photo-1604909052712-1c1ffbe2cf2b');

-- INSERT INTO products (name, price, image) VALUES
-- ('Tomatoes', 25.00, 'https://via.placeholder.com/150?text=Tomatoes'),
-- ('Potatoes', 20.00, 'https://via.placeholder.com/150?text=Potatoes'),
-- ('Onions', 22.00, 'https://via.placeholder.com/150?text=Onions'),
-- ('Milk', 50.00, 'https://via.placeholder.com/150?text=Milk'),
-- ('Bread', 30.00, 'https://via.placeholder.com/150?text=Bread'),
-- ('Rice', 70.00, 'https://via.placeholder.com/150?text=Rice'),
-- ('Wheat Flour', 45.00, 'https://via.placeholder.com/150?text=Wheat+Flour'),
-- ('Sugar', 40.00, 'https://via.placeholder.com/150?text=Sugar'),
-- ('Salt', 15.00, 'https://via.placeholder.com/150?text=Salt'),
-- ('Cooking Oil', 120.00, 'https://via.placeholder.com/150?text=Cooking+Oil');

INSERT INTO products (name, price, image) VALUES
('Apples', 60.00, 'https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?auto=format&fit=crop&w=150&q=80'),
('Bananas', 40.00, 'https://images.unsplash.com/photo-1574226516831-e1dff420e12e?auto=format&fit=crop&w=150&q=80'),
('Carrots', 30.00, 'https://images.unsplash.com/photo-1582515073490-dc0c3d1b3d4b?auto=format&fit=crop&w=150&q=80'),
('Tomatoes', 25.00, 'https://images.unsplash.com/photo-1582281298051-dc9ccc9e06b3?auto=format&fit=crop&w=150&q=80'),
('Potatoes', 20.00, 'https://images.unsplash.com/photo-1582515429731-983f0461752c?auto=format&fit=crop&w=150&q=80'),
('Onions', 22.00, 'https://images.unsplash.com/photo-1611080626919-7cf5a9e1c231?auto=format&fit=crop&w=150&q=80'),
('Milk', 50.00, 'https://images.unsplash.com/photo-1587731323434-fd1803f9cf62?auto=format&fit=crop&w=150&q=80'),
('Bread', 30.00, 'https://images.unsplash.com/photo-1608198093002-ad4e00548441?auto=format&fit=crop&w=150&q=80'),
('Rice', 70.00, 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?auto=format&fit=crop&w=150&q=80'),
('Wheat Flour', 45.00, 'https://images.unsplash.com/photo-1613145990723-28a6f6fc34c1?auto=format&fit=crop&w=150&q=80'),
('Sugar', 40.00, 'https://images.unsplash.com/photo-1604908176878-624be8ac30f1?auto=format&fit=crop&w=150&q=80'),
('Salt', 15.00, 'https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?auto=format&fit=crop&w=150&q=80'),
('Cooking Oil', 120.00, 'https://images.unsplash.com/photo-1625231320386-7b2f8dc70101?auto=format&fit=crop&w=150&q=80');
