DROP DATABASE IF EXISTS addproductDB;
CREATE DATABASE IF NOT EXISTS addproductDB;
use addproductDB;

DROP TABLE IF EXISTS products;

CREATE TABLE IF NOT EXISTS products (
  product_id INT AUTO_INCREMENT,
  sku VARCHAR(9) NOT NULL,
  name VARCHAR(128) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  type INT,
  PRIMARY KEY (product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO products (sku, name, price, type)
VALUES
('JVC200123', 'Verbatim DVD-R AZO', 3.99, 1),

('GGWP0007', 'Atomic Habits', 11.98, 2),

('TR120555', 'Bookcase', 49.00, 3);

ALTER TABLE products AUTO_INCREMENT=4;

DROP TABLE IF EXISTS dvds;

CREATE TABLE IF NOT EXISTS dvds (
  product_id INT NOT NULL,
  size INT,
  FOREIGN KEY (product_id) REFERENCES products (product_id)
  ON DELETE CASCADE
);

INSERT INTO dvds (product_id, size)
VALUES
(1, 4800);

DROP TABLE IF EXISTS books;

CREATE TABLE IF NOT EXISTS books (
  product_id INT NOT NULL,
  weight DECIMAL(5, 2),
  FOREIGN KEY (product_id) REFERENCES products (product_id)
  ON DELETE CASCADE
);

INSERT INTO books (product_id, weight)
VALUES
(2, 1.7);

DROP TABLE IF EXISTS furnitures;

CREATE TABLE IF NOT EXISTS furnitures (
  product_id INT NOT NULL,
  height INT,
  width INT,
  length INT,
  FOREIGN KEY (product_id) REFERENCES products (product_id)
  ON DELETE CASCADE
);

INSERT INTO furnitures (product_id, height, width, length)
VALUES
(3, 150, 120, 60);