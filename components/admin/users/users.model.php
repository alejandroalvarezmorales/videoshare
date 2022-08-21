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
            $_POST['__id'] = 'id';
            $dataconst = array_diff_key($_POST,array('save'=>''));
            $query = SQLHelpers::get_update(array('__p' => 'usuarios'), $dataconst);
            $data = array_diff_key($_POST,array('__id'=>'','save' => ''));
            
            switch(self::getOption()){
                case 'adduser':
                    $sql = 'INSERT INTO usuarios (name, password) values (:email, :password)';
                    $data = array_diff_key($_POST,array('__id'=>'','adduser' => ''));
                    $response = DBAccessModel::create($sql,$data);
                    break;
                case 'save':
                    $response = DBAccessModel::update($query,array('id' => $_POST['save']),$data);
                    break;
                case 'autorizar':
                    $sql = "UPDATE usuarios set status = :status  where id = :id";
                    $response = DBAccessModel::update($sql,array('id' => $_POST['autorizar']),array('status' => 'autorizado'));
                    break;
                case 'bloquear':
                    $sql = "UPDATE usuarios set status = :status  where id = :id";
                    $response = DBAccessModel::update($sql,array('id' => $_POST['bloquear']),array('status' => 'rechazado'));
                    break;
                case 'pendiente':
                    $sql = "UPDATE usuarios set status = :status  where id = :id";
                    $response = DBAccessModel::update($sql,array('id' => $_POST['pendiente']),array('status' => 'pendiente'));
                    break;
                default:
                    break;
            }
 

        }

        private static function getOption(){
            if (isset($_POST['adduser'])){
                return 'adduser';
            }
            if (isset($_POST['save'])){
                $_POST['id'] = $_POST['save'];
                return 'save';
            }
            if (isset($_POST['autorizar'])){
                return 'autorizar';
            }
            if (isset($_POST['pendiente'])){
                return 'pendiente';
            }
            if (isset($_POST['bloquear'])){
                return 'bloquear';
            }
            return '';
        }


    }



?>