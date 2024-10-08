<?php



class UserValidation
{
    public function firstNameValidation($first_name)
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



    public function lastNameValidation($last_name)
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

    public function emailAddressValidation($email_address)
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

    public function addressValidation($home_address)
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

    public function ageValidation($age)
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


    public function genderValidation($gender)
    {

        $errors = [];

        if (empty($gender)) {
            $errors[] = "Gender is required";
        }

        return $errors;
    }
    public function userValidation($first_name, $last_name, $email_address, $age, $home_address, $gender)
    {
        $errors = [];
        $errors = array_merge($errors, $this->firstNameValidation($first_name));
        $errors = array_merge($errors, $this->lastNameValidation(last_name: $last_name));
        $errors = array_merge($errors, $this->emailAddressValidation($email_address));
        $errors = array_merge($errors, $this->ageValidation($age));
        $errors = array_merge($errors, $this->addressValidation($home_address));
        $errors = array_merge($errors, $this->genderValidation($gender));

        return $errors;
    }

    // form validation or error handling
    public function emptyInput($username, $email, $password, $password_repeat)
    {
        $message = '';
        $result = true;
        if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
            $result = false;
            $message = "All input fields are required.";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    public function passwordRepeat($password, $password_repeat, $username)
    {
        $message = '';
        $result = true;
        if ($password !== $password_repeat) {
            $result = false;
            $message = "Password do not match";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    // addtional validation for password 
    public function passwordRequirements($password, $username)
    {
        $message = '';
        $result = true;

        if (strlen($password) < 8) {
            $result = false;
            $message = "Password must be at least 8 characters.";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }
}
