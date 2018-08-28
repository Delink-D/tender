<?php
// logout file
session_start();

session_destroy();

header('location: ../index.php');
