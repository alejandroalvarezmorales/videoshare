<?php

    class UsersModel{

        public static function getData($status = 'pendiente'){


            $query = "SELECT id, name, email, phone, created_at, permisos, status, vencimiento, password from usuarios
                      where  status = :status and (name like :buscar or email like :buscar ) ";

            isset($_POST['buscar']) ? $buscar = array('status' => $status, 'buscar' => "%".$_POST['buscar']."%")
                                    : $buscar = array( 'status' => $status, 'buscar' => '%%');

            $data = DBAccessModel::find($query,$buscar);
            return $data;

        }

        public static function setData(){

            $query = SQLHelpers::get_insert(array('__p' => 'usuarios'), $_POST);


            Logger::consolelog($query);
            Logger::consolelog($_POST);

        }


    }



?>