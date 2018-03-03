
DROP TABLE IF EXISTS `Brands`;
		
CREATE TABLE Brands (
  brand_id INTEGER(100) NOT NULL AUTO_INCREMENT,
  brand_title MEDIUMTEXT NOT NULL,
  PRIMARY KEY (brand_id)
) COMMENT 'This will store all of the brand details such as brand id and brand name etc.';

-- Table 'basket'
-- This will store all items that the user wishes to purchase.
-- ---

DROP TABLE IF EXISTS `categories`;
		
CREATE TABLE categories(
  cat_id INTEGER(100) NOT NULL AUTO_INCREMENT,
  cat_title MEDIUMTEXT NOT NULL,
  PRIMARY KEY (cat_id)
) COMMENT 'This table will store the categories and type of product tha';

-- ---
-- Table 'customer'
-- This table will store customer details.
-- ---

DROP TABLE IF EXISTS customer;
		
CREATE TABLE customer(
  customer_id INTEGER(10) NOT NULL AUTO_INCREMENT,
  customer_ip VARCHAR(255) NOT NULL,
  customer_name MEDIUMTEXT NOT NULL,
  customer_email VARCHAR(100) NOT NULL,
  customer_pass VARCHAR(100) NOT NULL,
  customer_country MEDIUMTEXT NOT NULL,
  customer_city MEDIUMTEXT NOT NULL,
  customer_contact VARCHAR(255) NOT NULL,
  customer_address MEDIUMTEXT NOT NULL,
  PRIMARY KEY (customer_id)
) COMMENT 'This table will store customer details.';

-- ---
-- Table 'products'
-- This table will store the product data.
-- ---

DROP TABLE IF EXISTS products;
		
CREATE TABLE products(
  product_id INTEGER(100) NOT NULL AUTO_INCREMENT,
  product_title VARCHAR(255) NOT NULL,
  product_price INTEGER(100) NOT NULL,
  product_desc MEDIUMTEXT NOT NULL,
  product_img MEDIUMTEXT NOT NULL,
  product_keywords MEDIUMTEXT NOT NULL,
  product_brand INTEGER(100) NOT NULL,
  product_cat INTEGER(100) NOT NULL,
  PRIMARY KEY (product_id)
) COMMENT 'This table will store the product data.';

DROP TABLE IF EXISTS Inventory;

CREATE TABLE Inventory (
    product_id CHAR(12) NOT NULL,
    reserve INT unsigned DEFAULT 0,
    PRIMARY KEY (product_id)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `products` ADD FOREIGN KEY (product_brand) REFERENCES `Brands` (`brand_id`);
ALTER TABLE `Inventory` ADD FOREIGN KEY (product_id) REFERENCES `products` (`product_id`);
ALTER TABLE `products` ADD FOREIGN KEY (product_cat) REFERENCES `categories` (`cat_id`);






