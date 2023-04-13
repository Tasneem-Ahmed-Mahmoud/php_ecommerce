<?php

// $conn=mysqli_connect('localhost','root','root');
// $sql='CREATE DATABASE IF NOT EXISTS `ecommerce`';
// $res=mysqli_query($conn,$sql);
// $conn=mysqli_connect('localhost','root','root','ecommerce');
const DB_HOST="localhost";
const DB_USERNAME="root";
const DB_PASSWORD="root";
const DB_NAME="ecommerce";
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$conn){
    echo "connection filed:".mysqli_connect_error();
    die;
}
//  create catgory table
$sql='CREATE TABLE IF NOT EXISTS `categories`(
    `id` INT  PRIMARY KEY  AUTO_INCREMENT   NOT NULL,
    `name` VARCHAR(20) Not NULL  UNIQUE

)';
$res=mysqli_query($conn,$sql);



//  create  product  table
$sql='CREATE TABLE IF NOT EXISTS `products`(
    `id` INT  PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(20) Not NULL,
    `description` TEXT NOT NULL,
    `image` VARCHAR(300) NOT NULL,
    `price` FLOAT NOT NULL,
    `offer` FLOAT NOT NULL,
    `category_id` int not null,
    FOREIGN  KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE 

)';
$res=mysqli_query($conn,$sql);

//create user




$sql="CREATE TABLE IF NOT EXISTS `users`(
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(90) NOT NULL,
    `email` VARCHAR(100) NOT NULL  UNIQUE,
    `phone` VARCHAR(20) NOT NULL  UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    `image` VARCHAR(300) NOT NULL,
   )";

$res=mysqli_query($conn,$sql);

//cerate view

//product_category view
$sql="CREATE VIEW  `product_category` 
AS SELECT products.id as product_id ,products.name product_name ,price ,offer ,image, description,categories.id as category_id ,categories.name as category_name

FROM products INNER JOIN categories WHERE categories.id=products.category_id";

// $res=mysqli_query($conn,$sql);