-- Script: main_db.sql
-- Description: SQL script to create the main_db database and the pro table with specified columns.

-- Create the main_db database if it doesn't exist
CREATE DATABASE IF NOT EXISTS main_db;
USE main_db;

-- Drop the pro table if it already exists (for demonstration purposes)
-- This step is optional and depends on your specific use case
-- If you want to preserve existing data, skip this step
DROP TABLE IF EXISTS pro;

-- Create the pro table
CREATE TABLE pro (
    -- Roll_No: Unique identifier for each student, integer data type with a maximum length of 10 digits.
    Roll_No INT(10) NOT NULL,

    -- Class: Class of the student, variable-length string data type.
    Class VARCHAR(50),

    -- T_ID: Teacher ID, a primary key used to uniquely identify each record in the table.
    T_ID VARCHAR(20) PRIMARY KEY,

    -- Student_Name: Name of the student, variable-length string data type.
    Student_Name VARCHAR(100),

    -- Gender: Gender of the student, variable-length string data type.
    Gender VARCHAR(10),

    -- DOB: Date of Birth of the student, date data type.
    DOB DATE,

    -- Mobile_No: Mobile number of the student, bigint data type with a maximum length of 10 digits.
    Mobile_No BIGINT(10),

    -- Email_ID: Email address of the student, variable-length string data type.
    Email_ID VARCHAR(255)
);

-- Optional: Add any additional comments or notes below
-- For example, you can add information about the database version or author.
-- ... (previous CREATE TABLE statements)

-- Inserting sample data into the pro table
INSERT INTO pro (Roll_No, Class, T_ID, Student_Name, Gender, DOB, Mobile_No, Email_ID)
VALUES
    (1, 'Class A', 'TID001', 'John Doe', 'Male', '2000-01-01', 1234567890, 'john@example.com'),
    (2, 'Class B', 'TID002', 'Jane Smith', 'Female', '2001-02-02', 9876543210, 'jane@example.com');

-- End of main_db.sql file

-- Database: main_db
-- Table: pro
-- Author: [Your Name]
-- Date: [Current Date]

-- End of main_db.sql file
