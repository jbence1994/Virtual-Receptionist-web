<?php

require_once('../config/connect.php');
session_start();
session_destroy();

$connection->close();
header('Location: index.php');
