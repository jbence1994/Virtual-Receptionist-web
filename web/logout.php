<?php

require_once('../config/connect.php');
session_start();
session_destroy();
header('Location: index.php');
