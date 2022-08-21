<?php

    class RegisterModel{

        public static function register(){
            $fields = array(
                'email' => 0,
                'name' => 0,
                'phone' => 0,
                'password' => 0
            );

            

            $data = array_intersect_key($_POST,$fields);
            $sql = SQLHelpers::get_insert(array('__p'=>'usuarios'),$data);
            Logger::consolelog($_POST);
            Logger::consolelog($sql);

            return DBAccessModel::create($sql,$data);
        }

    }

?>