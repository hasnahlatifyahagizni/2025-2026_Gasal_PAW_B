<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z .,'-]+$/"; // hanya huruf + spasi
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === "") {
        $errors[$field_name] = 'wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'hanya boleh huruf';
    }
}

function validatePhone(&$errors, $field_list, $field_name) {
    $pattern = "/^[0-9]+$/"; // hanya angka
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === "") {
        $errors[$field_name] = 'wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'hanya boleh angka';
    }
}

function validateNotEmpty(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === "") {
        $errors[$field_name] = 'wajib diisi';
    }
}
?>
