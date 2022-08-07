<?php

    class Debug  {

        public static function getPost(){
            print_r($_POST);
        }

        public static function getGet(){
            print_r($_GET);
        }

        public static function getSession(){
            print_r($_SESSION);
        }

        public static function getServer(){
            print_r($_SERVER);
        }

        public static function getCookie(){
            print_r($_COOKIE);
        }

    }


?>