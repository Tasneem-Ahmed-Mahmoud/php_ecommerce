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