<?php
require_once('_config.php');

unset($_SESSION["authenticated"]);
header('Location: /');
