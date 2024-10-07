<?php

function firstNameValidation($first_name)
{
    $errors = [];
    // validation for first name input
    if (empty($first_name)) {
        $errors[] = "First name is required";
    } else if (preg_match("/[a-zA-Z]/", $first_name) && preg_match("/[0-9]/",  $first_name)) {
        $errors[] = "First name must not contain both letters and numbers.";
    } else if (preg_match("/[0-9]/", $first_name)) {
        $errors[] = "First name must not contain numbers.";
    }
    return $errors;
}

function lastNameValidation($last_name)
{
    $errors = [];
    // validation for last name input
    if (empty($last_name)) {
        $errors[] = "Last name is required";
    } else if (preg_match("/[a-zA-Z]/", $last_name) && preg_match("/[0-9]/", $last_name)) {
        $errors[] = "Last name must not contain both letters and numbers.";
    } else if (preg_match("/[0-9]/", $last_name)) {
        $errors[] = "Last name must not contain numbers.";
    }
    return $errors;
}

function emailAddressValidation($email_address)
{
    $errors = [];
    // validation for email address
    if (empty($email_address)) {
        $errors[] = "Email address is required";
    } else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    }
    return $errors;
}

function addressValidation($home_address)
{
    $errors = [];
    // validation for address
    if (empty($home_address)) {
        $errors[] = "Address is required";
    } else if (preg_match("/[0-9]/", $home_address)) {
        $errors[] = "Address should not consist only of numbers";
    }
    return $errors;
}

function ageValidation($age)
{
    $errors = [];
    // validation for age
    if (empty($age)) {
        $errors[] = "Age is required";
    } else if (preg_match("/[a-zA-Z]/", $age) && preg_match("/[0-9]/",  $age)) {
        $errors[] = "Age must not contain both letters and numbers.";
    } else if (preg_match("/[a-zA-Z]/", $age)) {
        $errors[] = "Age must not contain letters";
    } else if ($age < 18 || $age > 60) {
        $errors[] = "You must be between 18 and 60 years old.";
    }
    return $errors;
}


function genderValidation($gender)
{

    $errors = [];

    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    return $errors;
}
function allFieldsValidation($first_name, $last_name, $email_address, $age, $home_address, $gender)
{
    $errors = [];
    if (
        empty($first_name) || empty($last_name) || empty($email_address) || empty($home_address)
        || empty($age) || empty($gender)
    ) {
        $errors[] = "All fields are required";
    }
    return $errors;
}
