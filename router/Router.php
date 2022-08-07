<?php

    class Router{


        public static function getRoutes(){
            $route = array();
            isset($_GET["p"]) ? $route["p"] = $_GET["p"] : $route["p"] = ""; //p = page
            isset($_GET["o"]) ? $route["o"] = $_GET["o"] : $route["o"] = ""; //o = page option (submenu)
            isset($_GET["a"]) ? $route["a"] = $_GET["a"] : $route["a"] = ""; //a = action
            isset($_GET["i"]) ? $route["i"] = $_GET["i"] : $route["i"] = ""; //i = id
            return $route;
        }

    }

?>