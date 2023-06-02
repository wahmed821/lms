<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define("BASE_URL", "http://localhost/web-dev-2023/lms/");
    define("DIR_URL", $_SERVER['DOCUMENT_ROOT'] . "/web-dev-2023/lms/");
} else {
    define("BASE_URL", "https://lms.com");
    define("DIR_URL", $_SERVER['DOCUMENT_ROOT']);
}
