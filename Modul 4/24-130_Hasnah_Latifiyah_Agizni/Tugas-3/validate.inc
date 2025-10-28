<?php
// Validasi Nama (hanya huruf dan spasi)
function validateNama(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if (empty($value)) {
        $errors[$field_name] = "Nama wajib diisi";
    } elseif (!preg_match("/^[a-zA-Z\s'-]+$/", $value)) {
        $errors[$field_name] = "Nama hanya boleh huruf dan spasi";
    }
}

// Validasi NIM (12 digit angka)
function validateNIM(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if (empty($value)) {
        $errors[$field_name] = "NIM wajib diisi";
    } elseif (!preg_match("/^\d{12}$/", $value)) {
        $errors[$field_name] = "NIM harus 12 digit angka";
    }
}

// Validasi Email
function validateEmail(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if (empty($value)) {
        $errors[$field_name] = "Email wajib diisi";
    } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid";
    }
}

// Validasi Jurusan (hanya huruf dan spasi)
function validateJurusan(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if (empty($value)) {
        $errors[$field_name] = "Jurusan wajib diisi";
    } elseif (!preg_match("/^[a-zA-Z\s'-]+$/", $value)) {
        $errors[$field_name] = "Jurusan hanya boleh huruf dan spasi";
    }
}
?>
