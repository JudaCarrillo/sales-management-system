CREATE TABLE `customers` (
  `id` integer PRIMARY KEY,
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
  `id` integer PRIMARY KEY,
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
  `id` integer PRIMARY KEY,
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
  `id` integer PRIMARY KEY,
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
  `igv` string,
  `final_price` string,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `sales_details` (
  `id` integer,
  `sales_order_id` string,
  `product_id` string,
  `quantity` string,
  `product_sales_price` string,
  `total_price` string,
  PRIMARY KEY (`id`, `sales_order_id`, `product_id`)
);

CREATE TABLE `bills` (
  `id` integer PRIMARY KEY,
  `sales_order_id` string UNIQUE,
  `sales_order_details` json,
  `customer_dni` string,
  `customer_name` string,
  `address` string,
  `date_issue` datetime,
  `igv` bool,
  `final_price` integer,
  `currency` string,
  `created_at` datetime,
  `updated_at` datetime
);

ALTER TABLE `sales_orders` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `sales_orders` ADD FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

ALTER TABLE `sales_details` ADD FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`);

ALTER TABLE `sales_details` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `bills` ADD FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`);
