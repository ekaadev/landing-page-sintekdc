<?php

// load env file without library
function loadEnv($path)
{
    if (!file_exists(($path))) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') === false || str_starts_with(trim($line), '#')) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
        putenv("$name=$value");
    }
}

loadEnv(__DIR__ . '/.env');

/**
 * Database Configuration File
 * 
 * This file establishes multiple database connections using different PHP extensions:
 * - MySQLi (Procedural & Object-Oriented)
 * - PDO (PHP Data Objects)
 */

// Database credentials
$db_host = $_ENV['DB_HOST'];                // Database server address
$db_name_only = $_ENV['DB_NAME'];           // Database name
$user_name = $_ENV['DB_USER'];              // MySQL username (default for local development)
$user_password = $_ENV['DB_PASS'];          // MySQL password (empty for default XAMPP/WAMP setup)

// PDO DSN (Data Source Name) string
$db_name = "mysql:host={$db_host};dbname={$db_name_only}";

/**
 * Connection 1: MySQLi Procedural Connection
 * Used by: Most of the application (index.php, login.php, etc.)
 * Better for: Simple queries, legacy code
 */
$conn = mysqli_connect($db_host, $user_name, $user_password, $db_name_only)
    or die('MySQLi connection failed: ' . mysqli_connect_error());

/**
 * Connection 2: PDO Connection (using variables)
 * Alternative connection method using PDO
 * Better for: Prepared statements, object-oriented approach
 */
$conn1 = new PDO($db_name, $user_name, $user_password);
$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/**
 * Connection 3: PDO Connection (direct)
 * Duplicate PDO connection - could be consolidated with $conn1
 * Note: Having multiple connections to the same database is inefficient
 */
// Koneksi ke MySQL dengan PDO
$pdo = new PDO("mysql:host={$db_host};dbname={$db_name_only}", $user_name, $user_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/**
 * RECOMMENDATIONS FOR IMPROVEMENT:
 * 
 * 1. Security:
 *    - Never commit credentials to version control
 *    - Use environment variables or a separate config file
 *    - Add proper error handling instead of die()
 * 
 * 2. Efficiency:
 *    - Choose ONE connection method (MySQLi OR PDO, not both)
 *    - Remove duplicate PDO connections ($conn1 and $pdo are redundant)
 * 
 * 3. Character Encoding:
 *    - Add UTF-8 charset for proper international character support:
 *      mysqli_set_charset($conn, "utf8mb4");
 *      Or in PDO DSN: charset=utf8mb4
 * 
 * 4. Production Settings:
 *    - Disable error display in production
 *    - Use strong passwords
 *    - Restrict database user privileges
 */
