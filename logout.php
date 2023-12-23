<?php

require 'admin/config/config.php';
session_start();
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../fp/login.php");
