<?php
session_start();
include "router/RouterPlan.php";
include "classes/logger.class.php";


RoutingPlan::routing();

?>