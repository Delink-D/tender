<?php
// logout file
session_start();

include '../env/server.php';

session_destroy();

header('location: ' . $server);