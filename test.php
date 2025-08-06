<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "POST request received. Server supports PHP.";
} else {
    echo "This is a GET request. Try submitting a POST form.";
}
?>
