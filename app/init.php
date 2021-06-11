<?php
if (!session_id()) {
    session_start();
}
require_once 'lib/constant.php';
require_once 'lib/helpers.php';
require_once 'core/App.php';
require_once 'core/Database.php';
require_once 'core/Model.php';
require_once 'core/Controller.php';
