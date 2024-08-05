CREATE DATABASE IF NOT EXISTS `SalesManagementDB`;
USE `SalesManagementDB`;


CREATE TABLE `customers` (
  `customer_id` integer PRIMARY KEY AUTO_INCREMENT,
  `code` integer,
  `name` string,
  `father_last_name` string,
  `mother_last_name` string,
  `business_name` string,
  `client_type` type,
  `ruc` string,
  `dni` string,
  `phone` string,
  `address` string,
  `status` tinyint,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `products` (
  `product_id` integer PRIMARY KEY AUTO_INCREMENT,
  `code` string,
  `name` string,
  `source` tinyint,
  `brand` string,
  `unit` string,
  `category` string,
  `price` string,
  `stock` integer,
  `status` tinyint,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `employees` (
  `employee_id` integer PRIMARY KEY AUTO_INCREMENT,
  `code` integer,
  `name` string,
  `father_last_name` string,
  `mother_last_name` string,
  `dni` string,
  `address` string,
  `phone` string,
  `user` string,
  `password` string,
  `status` string,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `sales_orders` (
  `sales_order_id` integer PRIMARY KEY AUTO_INCREMENT,
  `code` string,
  `customer_id` integer,
  `employee_id` string,
  `customer_dni` string,
  `customer_address` string,
  `pay_method` string,
  `currency` string,
  `branch_office` string,
  `date` datetime,
  `notes` string,
  `gross_price` string,
  `discount` string,
  `net_price` string,
  `igv` string,
  `final_price` string,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `sales_details` (
  `sales_detail_id` integer PRIMARY KEY AUTO_INCREMENT,
  `sales_order_id` string,
  `product_id` string,
  `quantity` string,
  `product_sales_price` string,
  `total_price` string,
  PRIMARY KEY (`sales_detail_id`, `sales_order_id`, `product_id`)
);

ALTER TABLE `sales_orders` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

ALTER TABLE `sales_orders` ADD FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

ALTER TABLE `sales_details` ADD FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`sales_order_id`);

ALTER TABLE `sales_details` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
