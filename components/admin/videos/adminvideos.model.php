<?php 

    class AdminVideosModel {

        public static function uploadFile(){
            if (!isset( $_POST['add']) ){
                return;
            }

            $file_dir = CONFIG['filesdir'];
            $fn = "/".$_FILES['file']['name'];
            $fs = $_FILES['file']['size'];
            $ftemp = $_FILES['file']['tmp_name'];
            $ft = $_FILES['file']['type'];
            $is_mp4 = is_numeric(strpos($ft, 'mp4'));
            
            
            if($is_mp4) {
                if ( move_uploaded_file($ftemp, $file_dir.$fn) ){
                    $data = array(
                        'filename' => $fn,
                        'path' => $file_dir.$fn,
                        'size_mbytes' => $fs / 1024 / 1024
                    );
    
                    $sql = SQLHelpers::get_insert(array('__p'=> 'videos'), $data);
                
                    $result = DBAccessModel::create($sql,$data);

                    return array('ok' => true, 'file' => $_FILES, 'data' => $result);
    
                } else {
                    return array('ok' => false, 'error' => $_FILES['error']);
                }
                  
                
            }  else {
                return array('ok' => false, 'error' => 'File is not MP4.');
            }
        }


        public static function updateName(){
            if(isset($_POST['hidden']) && $_POST['hidden'] == 'hidden'){
                $filter = array('id' => '','name' =>'', 'description' => '');
                $data = array_intersect_key($_POST, $filter);
                $data['__id'] = 'id';
                $sql = SQLHelpers::get_update(array('__p' => 'videos'),$data);
                $result = DBAccessModel::update($sql,array('__id' => 'id'),$data);
                return $result;

            }
            return array("ok" => 'false');
        }

        public static function deleteVideo(){
            if(isset($_POST['eliminar']) && is_numeric($_POST['eliminar'])) {
                $_POST['__id'] = 'id';
                $sql = SQLHelpers::get_delete(array('__p' => 'videos'),$_POST);
                $result = DBAccessModel::delete($sql,$_POST['eliminar']);
            }
            return array('ok' => false);
        }

        public static function getFiles(){
            isset($_POST['filtro']) ?  $filtro = '%'.$_POST['filtro'].'%' : $filtro = '%%';            
            $sql = "SELECT * FROM videos where name like :filtro or filename like :filtro or description like :filtro";
            $result = DBAccessModel::find($sql,array('filtro' => $filtro));
            return $result;
        }

        public static function addUserVideo(){
            if (isset($_POST['adduservideo']) && isset($_POST['email']) && strlen( $_POST['email'] ) > 0){
                $sql = "SELECT id from usuarios where email = :email";
                $user_id = DBAccessModel::find($sql, array('email' => $_POST['email']));

                
                if ($user_id > 0 && isset($user_id['data'][0]['id'])){
                    $filterfields = array('id_video' => '', 'id_usuario' => '');
                    $_POST['id_usuario'] = $user_id['data'][0]['id'];
                    $data = array_intersect_key($_POST,$filterfields);
                    $sql_insert = SQLHelpers::get_insert(array('__p' => 'videos_usuarios'), $data);

                    
                    $result = DBAccessModel::create($sql_insert,$data);
                    return $result;
                }


            }
            return array('ok' => false);
        }

        public static function delUserVideo(){
            if (isset($_POST['delUserVideo'])) {
                $sql = "DELETE FROM videos_usuarios where id = :id";
                $result = DBAccessModel::delete($sql, $_POST['delUserVideo']);
                return $result;
            }
            return array('ok' => false);
        }

    }
    

?>


