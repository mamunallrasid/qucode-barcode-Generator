# QR & Bar Code Generator

## Overview

This project is a simple web application for generating QR codes and barcodes for student details. It allows users to input student information, which is then stored in a MySQL database. The application also provides the functionality to generate QR codes and barcodes for the stored student records.

## Technologies Used

- PHP
- MySQL
- JavaScript (jQuery)
- Bootstrap
- [Picqer/Barcode](https://github.com/picqer/php-barcode-generator) library

## Features

1. **Student Details Form:**
   - Collects information such as name, date of birth, phone number, email, and address.
   - Validates form data using jQuery Validation plugin.

2. **Data Storage:**
   - Stores student details in a MySQL database.

3. **QR Code Generation:**
   - Generates QR codes using the Google Chart API.
   - Displays the QR code directly on the webpage.
   - Saves the QR code image locally in the 'QrCodes' directory.

4. **Barcode Generation:**
   - Generates barcodes using the Picqer/Barcode library.
   - Displays the barcode on the webpage.
   - Saves the barcode image locally in the 'BarCodes' directory.

## Usage

1. **Install Dependencies:**
   - Make sure you have PHP and MySQL installed on your server.
   - Run `composer install` to install the required PHP libraries.

2. **Database Setup:**
   - Create a MySQL database named 'test' (or update the database name in the connection settings).
   - Import the `qr.sql` file into the database.

3. **Configuration:**
   - Update the database connection details in your PHP files (`action-data.php` and `index.php`).

4. **Run the Application:**
   - Open the project in your web server.
   - Access the application through the browser.

## Contribution

Contributions are welcome! If you'd like to contribute to this project, please follow the usual GitHub fork and pull request workflow.

## License

This project is licensed under the [MIT License](LICENSE).
