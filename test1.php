<?php

$countryData = file_get_contents('https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json');

$countryCodes = json_decode($countryData, true);


// $phoneNumbers = [
//     '+375(29)123-45-67',
//     '+7 (495) 123 45 67',
//     '7 777 123-45-67',
// ];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phone'];
} else {
    echo ('Страна не определена');
}

function getCountryNameFromPhoneNumber($phoneNumber, $countryCodes)
{
    $phoneNumber = preg_replace('/[^\d]/', '', $phoneNumber);
    foreach ($countryCodes as $country) {
        $countryCode = $country['mask'];
        $countryCodeResult = preg_replace('/[^\d]/', '', $countryCode);
        if (strpos($phoneNumber, $countryCodeResult) === 0) {
            return $country['name_ru'];
        }
    }

    return 'Неизвестно';
}


// foreach ($phoneNumbers as $phoneNumber) {
//     $countryName = getCountryNameFromPhoneNumber($phoneNumber, $countryCodes);
//     echo "Номер телефона $phoneNumber относится к стране: $countryName\n";
// }
