<?php

    /**
     * @param string $phoneNumber
     * @param string $countryCode
     * @return string
     */
    function formatPhoneNumber(string $phoneNumber, string $countryCode = 'US'): string
    {
        $cleanedPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        switch ($countryCode) {
            case 'US':
                $formattedPhoneNumber = '('.substr($cleanedPhoneNumber, 1, 3).') '.substr($cleanedPhoneNumber, 4, 3).' - '.substr($cleanedPhoneNumber, 7);
                break;
            case 'MX':
                $formattedPhoneNumber = '('.substr($cleanedPhoneNumber, 2, 3).') '.substr($cleanedPhoneNumber, 5, 3).' '.substr($cleanedPhoneNumber, 8);
                //$formattedPhoneNumber = $cleanedPhoneNumber;
                break;
            case 'UK':
                // Formatting logic for UK
                break;
            case 'AU':
                // Formatting logic for Australia
                break;
            // Add more cases for other countries as needed
            default:
                // Default formatting for unknown countries
                $formattedPhoneNumber = $cleanedPhoneNumber;
        }

        return $formattedPhoneNumber;
    }
