# Warehouse Management System

A full-stack web application for managing warehouse operations — built with PHP, MySQL, and a custom dark theme UI.

## Overview
WareHMS is a CRUD-based warehouse management system that handles product cataloging, inventory tracking, stock transactions, and location management. Built as a DBMS course project at IIITDM Jabalpur.

## Features
- 🔐 **User Authentication** — secure login/logout with session management
- 📦 **Product Management** — add, edit, delete, and view products with category linking
- 🏷️ **Category Management** — organize products into categories
- 📍 **Location Management** — manage warehouse zones and storage locations
- 📊 **Inventory Tracking** — track stock levels per product per location in real-time
- 🔄 **Stock Transactions** — record stock inflow (receiving) and outflow (shipping) with reference numbers
- 📈 **Dashboard** — summary cards showing total products, categories, locations, and transactions

## Tech Stack
- **Frontend:** HTML, CSS (custom dark theme), Bootstrap Icons
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache (XAMPP)

## Project Structure
- `auth/` — Login and logout
- `dashboard/` — Main dashboard with summary stats
- `products/` — Product CRUD
- `category/` — Category CRUD
- `inventory/` — Inventory stock CRUD
- `transactions/` — Stock transaction management
- `locations/` — Warehouse location CRUD
- `includes/` — Shared header, navbar, sidebar, footer
- `config/` — Database connection
- `assets/css/style.css` — Custom dark theme stylesheet
- `warehouse_db.sql` — Database schema and setup

## Setup Instructions
1. Install [XAMPP](https://www.apachefriends.org/)
2. Clone or extract this repo into `htdocs/warehouse/`
3. Start Apache and MySQL from XAMPP Control Panel
4. Open `localhost/phpmyadmin` → Create a new database named `warehouse_db`
5. Import `warehouse_db.sql` into that database
6. Visit `localhost/warehouse/auth/login.php`

## Database Schema
6 core tables: `product`, `product_category`, `inventory_stock`, `stock_transaction`, `warehouse_location`, `users`

