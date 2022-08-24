<?php

    include "classes/database/DBAccessModel.php";  
    include "classes/database/SQLHelpers.php";


    class LoginModel {

        public static function authenticate(){
            $email = '';
            $password = '';

            if(isset($_POST['email']) && isset($_POST['password']) ){
                $email = $_POST['email'];
                $password = $_POST['password'];
            } else {
                return array('data' => array());
            }


            $sql = "SELECT * FROM USUARIOS WHERE email = :email AND password = :password";
            $data = DBAccessModel::find($sql,array( "email" => $email, "password" => $password) );
            

            if(sizeof($data['data'])>0){
                $_SESSION["authenticated"] = 1;
                $_SESSION["email"] = $email;
                $_SESSION["login_date"] = date('Y-m-d H:m:s');
                $_SESSION['userdata'] = $data['data'];
                $_SESSION['videosavailable'] = self::getAvailableVideos($data['data'][0]['id']);
                $_SESSION['user_id'] = $data['data'][0]['id'];
            } else {
                $_SESSION = array();
            }
            return $data;
        }

        public static function logoff(){
            $_SESSION['authenticated'] = 0;
        }

        public static function getAvailableVideos( $id ){
            $sql = '
                    select  v.id video_id,
                            v.name video_name,
                            u.id user_id,
                            u.email,
                            u.name usuario_name,
                            v.filename,
                            v.description,
                            v.size_mbytes,
                            u.id usuario_id,
                            u.permisos,
                            u.status,
                            u.vencimiento
                    
                    from videos v
                    left join videos_usuarios vu on v.id = vu.id_video
                    left join usuarios u on u.id = vu.id_usuario
                    where u.id = :id;
                    
                    ';

            $list = DBAccessModel::find($sql,array('id' => $id));

            return $list;
        }

    }

?>