<?php 

    class InicioModel{
        public static $content;

        public static function getData(){
            return $_SESSION;
        }

        public static function setData(){
            if(isset($_POST['guardar'])){
                $cols_base = array(
                    "__id" => '',
                    'name' => '',
                    'email' => '',
                    'phone' => '',
                    'password' => ''  
                );

                $limitvalues = array(
                    'name' => '',
                    'email' => '',
                    'phone' => '',
                    'password' => ''  
                );

                $id = array('id' =>  $_POST['id']);
                $tocons = array_intersect_key( $_POST,$cols_base);
                $insertquery = SQLHelpers::get_update(array("__p" => "usuarios"), $tocons);

                $data = array_intersect_key($_POST, $limitvalues);

                $result = DBAccessModel::update($insertquery,$id,$data);
                

                return $result;
                
            }

            
        }

    }

?>