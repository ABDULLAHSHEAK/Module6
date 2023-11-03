CREATE TABLE `order_items` (
  `order_item_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `order_id` BIGINT(20) UNSIGNED NOT NULL,
  `product_id` BIGINT(20) UNSIGNED NOT NULL,
  `cat_id` BIGINT(20) UNSIGNED NOT NULL,
  `quantity` VARCHAR(20) NOT NULL,
  `unit_price` VARCHAR(20) NOT NULL,
  Foreign Key (`order_id`) REFERENCES `orders`(`order_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  Foreign Key (`product_id`) REFERENCES `products`(`product_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  Foreign Key (`cat_id`) REFERENCES `categories`(`cat_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) 