# JobConnect

JobConnect is a Laravel-based job portal web application that connects job seekers with employers. The platform allows users to browse jobs and apply online, while administrators can manage job postings and applications through a secure dashboard.

## Key Features

### User Panel
- Browse available job listings
- View job details
- Apply for jobs with resume upload
- Simple and user-friendly interface

### Admin Panel
- Secure admin login
- Add, edit, and delete job postings
- View all job applicants
- Approve or reject applications
- Automatically deactivate expired jobs

## Technology Stack
- Laravel (PHP Framework)
- PHP
- MySQL
- Blade Template Engine
- HTML, CSS, JavaScript

## Project Structure
- MVC architecture using Laravel
- Separate user and admin modules
- Clean and maintainable codebase

## Installation Guide

1. Clone the repository
```bash
git clone https://github.com/SejalKanojiya7566/jobconnect.git

Navigate to the project directory

cd jobconnect


Install dependencies

composer install


Create environment file

cp .env.example .env


Generate application key

php artisan key:generate


Configure database credentials in .env

Import the database

Import jobconnect.sql into MySQL

Run the application

php artisan serve

Database

MySQL database used

SQL file included: jobconnect.sql

Security Notes

.env file is excluded from the repository

vendor directory is not uploaded to GitHub

Purpose

This project is created for learning, practice, and portfolio purposes to demonstrate Laravel-based web application development skills.

Author

Sejal Kanojiya
