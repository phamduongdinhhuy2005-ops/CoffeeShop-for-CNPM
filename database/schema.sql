CREATE DATABASE IF NOT EXISTS coffeeshop_php
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE coffeeshop_php;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS order_details;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    price DECIMAL(18,2) NOT NULL,
    description TEXT NULL,
    image_url VARCHAR(500) NULL,
    is_on_sale TINYINT(1) NOT NULL DEFAULT 0,
    discount_percent DECIMAL(5,2) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_products_categories
        FOREIGN KEY (category_id) REFERENCES categories(id)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(18,2) NOT NULL,
    shipping_address VARCHAR(500) NOT NULL,
    note VARCHAR(500) NULL,
    payment_method VARCHAR(50) NOT NULL DEFAULT 'COD',
    status VARCHAR(30) NOT NULL DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_orders_users
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(18,2) NOT NULL,
    item_note VARCHAR(500) NULL,
    CONSTRAINT fk_order_details_orders
        FOREIGN KEY (order_id) REFERENCES orders(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_order_details_products
        FOREIGN KEY (product_id) REFERENCES products(id)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

INSERT INTO users (full_name, email, password_hash, role) VALUES
('Quan Tri Vien', 'admin@goclang.vn', '$2y$10$D.zO.6BH2yQMNHnmFwqR6.dSZyjAUhsyHgzNAEscj9ORKCs2gTjV6', 'admin');

INSERT INTO categories (id, name) VALUES
(1, 'Trà & Thảo Mộc'),
(2, 'Cà Phê'),
(3, 'Bánh Sáng');

INSERT INTO products (category_id, name, price, description, image_url, is_on_sale, discount_percent) VALUES
(1, 'Trà Hoa Cúc Mật Ong', 55000, 'Hoa cúc hữu cơ dịu nhẹ, pha cùng mật ong rừng địa phương và một chút vani.', '/assets/images/1ab0405c-6c09-4f79-9609-42a71a350846.webp', 0, NULL),
(1, 'Trà Hoa Atiso Đỏ', 58000, 'Cánh atiso đỏ giàu vitamin, kết hợp hoa hồng Bulgaria khô cho hương thơm thanh nhẹ.', '/assets/images/1e886a73-0899-4634-9dd1-42972e1397b2.jpg', 0, NULL),
(1, 'Earl Grey Hoàng Gia', 55000, 'Trà đen thượng hạng ướp tinh dầu bergamot và cánh hoa ngô xanh.', '/assets/images/26f9dd67-8c9a-45fe-95d5-f050b8256972.jpg', 1, 10),
(2, 'Cà Phê Trứng Hà Nội', 65000, 'Robusta đậm đà, phủ lớp lòng đỏ trứng đánh bông cùng sữa đặc.', '/assets/images/6ff62bb2-36b6-46c5-9458-9c4503d60b2a.jpg', 0, NULL),
(2, 'Espresso Truyền Thống', 35000, 'Blend Arabica & Robusta, chiết xuất chuẩn mực với crema vàng óng.', '/assets/images/75924f1f-9ab3-493a-9bba-13f1e439d333.jpg', 0, NULL),
(2, 'Cold Brew 18 Giờ', 50000, 'Ủ lạnh suốt 18 tiếng, vị mượt mà, ít đắng, thoảng hương sô-cô-la.', '/assets/images/cd5137b7-85ec-44f9-bd88-a9c911185a9a.jpg', 1, 15),
(2, 'Latte Nhung', 45000, 'Sữa tươi đánh bọt mịn như nhung, rót trên hai shot espresso.', '/assets/images/cf792b2e-4614-4152-afc8-d109303df310.jpg', 0, NULL),
(3, 'Croissant Hạnh Nhân', 38000, 'Nướng hai lần, nhân kem hạnh nhân, rắc hạnh nhân lát lên trên.', '/assets/images/menu-hero.jpg', 0, NULL),
(3, 'Bánh Trái Cây Mùa', 35000, 'Mứt trái cây theo mùa trên nền bánh ngàn lớp giòn rụm.', '/assets/images/fd31bc0f-01e9-4dd8-89e2-961ae33fd146_47a408_8087342c4fbb496292d0fc5de2ee92ac~mv2.avif', 0, NULL);
