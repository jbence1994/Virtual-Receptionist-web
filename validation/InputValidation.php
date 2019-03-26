<?php

/**
 * Felhasználó input ellenőrző függvénykönyvtár
 */
class InputValidation {

    public function __construct() {
        
    }

    public function is_empty($input) {

        if (empty($input)) {
            return true;
        }

        return false;
    }

    public function contains_digit_characters($input) {

        $criticalIndex = false;

        for ($i = 0; $i < count($input); $i++) {

            if (is_numeric($input[$i])) {

                $criticalIndex = true;
            }

            return criticalIndex;
        }
    }

    public function contains_letter_characters($input) {

        $criticalIndex = false;

        for ($i = 0; $i < count($input); $i++) {

            if (is_string($input[$i])) {

                $criticalIndex = true;
            }
        }

        return criticalIndex;
    }

    public function contains_uppercase_characters($input) {

        $criticalIndex = false;

        for ($i = 0; $i < count($input); $i++) {

            if (ctype_upper($input[$i])) {

                $criticalIndex = true;
            }
        }

        return $criticalIndex;
    }

    public function contains_lowercase_character($input) {

        $criticalIndex = false;

        for ($i = 0; index < count($input); $i++) {

            if (ctype_lower($input[$i])) {

                $criticalIndex = true;
            }
        }

        return $criticalIndex;
    }

    public function firstLetter_is_uppercase_character($input) {

        if (ctype_upper($input[0])) {

            return true;
        }

        return false;
    }

    public function first_letter_is_lowercase_character($input) {

        if (ctype_lower($input[0])) {

            return true;
        }

        return false;
    }

    public function is_valid_email_address($input) {

        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {

            $valid = false;
        }

        return $valid;
    }

}
