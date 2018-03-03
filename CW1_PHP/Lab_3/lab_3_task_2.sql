     SELECT product_title, product_cat 
     FROM products p
     INNER JOIN categories c
     ON p.product_cat=c.cat_id;