

INSERT INTO `Brands` (brand_id, brand_title) 
VALUES (NULL,'Apple');

INSERT INTO `categories` (cat_id, cat_title) 
VALUES (NULL,'Smartphones');

INSERT INTO `products` (product_id, product_title, product_price, product_desc, product_img, product_keywords, product_brand, product_cat) 
VALUES (NULL, 'Apple iPhone 7', 720,'This is the iPhone 7','iPhone.jpg','iPhone, Apple',1,1); 

INSERT INTO `customer` (customer_id, customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image) 
VALUES (NULL,'127.0.0.1','John Cena','JCena@gmail.com','pass123','US','NYC','1234','123 example street','avatar.jpg');
