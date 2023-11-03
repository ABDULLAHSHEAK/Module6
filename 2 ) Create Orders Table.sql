CREATE TABLE `orders` (
  `order_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `customer_id` BIGINT(20) UNSIGNED NOT NULL,
  `order_date` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  `total_amount` BIGINT(20) NOT NULL,
  Foreign Key (`customer_id`) REFERENCES `customers`(`cust_id`) ON DELETE RESTRICT ON UPDATE CASCADE
)