CREATE TABLE `customers`(
`cust_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`email` VARCHAR(50) NOT NULL,
`location` VARCHAR(255) NOT NULL
)