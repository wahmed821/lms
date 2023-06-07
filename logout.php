<?php
include_once("config/config.php");
session_destroy();
header("LOCATION: " . BASE_URL);
exit;
