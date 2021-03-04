<?php
require __DIR__ . '/include/config.php';
session_destroy();
header("Location: ".$url);
