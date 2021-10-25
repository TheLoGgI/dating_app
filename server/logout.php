<?php
session_start();

session_unset();
session_destroy();

$url = "http://localhost:3000/login/";

header("Location: $url?msg=user logged out");
