<?php

session_start();
require_once('../config/connect.php');
session_destroy();
$connection->close();
header('Location: index.php');
