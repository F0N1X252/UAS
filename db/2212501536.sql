/**
Ubah NIM.sql menggunakan nim kalian
Script untuk membuat database
Script untuk membuat 1 tabel (berisi kolom nim, nama, email)
 */
CREATE DATABASE IF NOT EXISTS todo_db;
USE todo_db;
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);