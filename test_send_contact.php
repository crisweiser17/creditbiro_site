<?php
// Mock POST request
$_SERVER["REQUEST_METHOD"] = "POST";
$_POST["name"] = "Test User";
$_POST["email"] = "test@example.com";
$_POST["subject"] = "Test Subject";
$_POST["message"] = "This is a test message from CLI.";

// Capture output
ob_start();
require 'send_contact.php';
$output = ob_get_clean();

echo "Output:\n" . $output . "\n";
