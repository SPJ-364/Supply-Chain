# Supply-Chain Inventory Management System

## Introduction

The **Supply-Chain Inventory Management System** is a web-based application developed in PHP and MySQL that manages supplier records and supports two relational business processes: **Purchase Order Management** and **Delivery Management**.

Built on an existing single-table Supplier CRUD application, this system extends the core supplier functionality to track the full lifecycle of company procurement:

- **Supplier Management** — Maintain a master list of suppliers with full add, view, edit, and delete (CRUD) capabilities.
- **Purchase Order Management** — Each supplier can have multiple purchase orders (a **1:M** relationship). The system allows the recording of order quantity, product category, and status, and displays the purchase orders belonging to a selected supplier.
- **Delivery Management** — Each approved purchase order can have multiple delivery records (a **1:M** relationship). The system tracks delivered quantity, delivery date, and delivery status, and computes the **Total Delivered Quantity** and **Remaining Order Quantity** for each purchase order.

## Key Features

- Database migrations that correctly implement foreign key relationships:
  - `purchase_orders` table referencing the `suppliers` table.
  - `deliveries` table referencing the `purchase_orders` table.
- A **"Purchase Orders"** action button on the main supplier table that transitions to a dedicated purchase order workspace.
- A functional purchase order data entry form (Order Quantity, Product Category, and Status).
- A **"View"** action button to render all purchase orders belonging to the currently selected supplier.
- A **"Deliveries"** action button on each purchase order that transitions to a dedicated delivery workspace.
- A functional delivery data entry form (Delivered Quantity, Delivery Date, and Delivery Status).
- A **"View"** action button to render all deliveries for the selected purchase order, along with computed totals.

## Technology Stack

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Version Control:** Git & GitHub

## File Structure

```
Supplies-Chain/
├── index.php            # Main supplier table / dashboard
├── supplier.php         # Supplier workspace
├── add_supplier.php     # Add supplier form logic
├── edit_supplier.php    # Edit supplier form logic
├── delete_supplier.php  # Delete supplier logic
├── config.php           # Database connection configuration
├── database.sql         # Database schema and seed data
└── README.md            # Project documentation
```

## Setup / Installation

1. Clone the repository and import `database.sql` into your MySQL server.
2. Update database credentials in `config.php`.
3. Deploy the files to a PHP-enabled web server (e.g., Apache via XAMPP).
4. Open `index.php` in your browser to access the application.

## Team & Collaboration

This project is developed by a team of **five (5) members**, each assigned a clearly defined role:

| Role | Responsibility |
|------|----------------|
| Project Manager / Team Lead | Coordinates tasks, manages the repository, reviews merges |
| Backend Developer | Implements PHP logic, purchase order & delivery workflows |
| Frontend / UI Developer | Builds interfaces, forms, and tables |
| Database Administrator | Designs schema, migrations, and foreign keys |
| QA & Documentation Lead | Tests features and maintains documentation |

The team follows real-world collaborative practices using **Git and GitHub**, including feature **branches**, **commits**, and **pull/merge requests** for code review throughout development.
