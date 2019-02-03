<?php

require_once 'app/helpers.php';
sess_start('fakebook');
session_destroy();
header('location: signin.php');
exit;