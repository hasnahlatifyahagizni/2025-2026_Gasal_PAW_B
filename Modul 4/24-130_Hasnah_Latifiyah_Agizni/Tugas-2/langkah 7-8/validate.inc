<?php
function validateName(&$errors, $data, $field) {
    $value = trim($data[$field] ?? '');
    if ($value === '') {
        $errors[$field] = 'is required.';
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $value)) {
        $errors[$field] = 'must contain only letters.';
    }
}

function validateEmail(&$errors, $data, $field) {
    $value = trim($data[$field] ?? '');
    if ($value === '') {
        $errors[$field] = 'is required.';
    } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field] = 'is not a valid email.';
    }
}

function validatePassword(&$errors, $data, $field) {
    $value = trim($data[$field] ?? '');
    if ($value === '') {
        $errors[$field] = 'is required.';
    } elseif (strlen($value) < 6) {
        $errors[$field] = 'must be at least 6 characters.';
    }
}
?>