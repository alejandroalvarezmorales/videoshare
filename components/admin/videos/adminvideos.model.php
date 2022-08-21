<?php 

    class AdminVideosModel {

        public static function uploadFile(){
            Logger::consolelog($_POST);
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

        public static function getFiles(){

            isset($_POST['filtro']) ?  $filtro = '%'.$_POST['filtro'].'%' : $filtro = '%%';            
            $sql = "SELECT * FROM videos where name like :filtro or filename like :filtro or description like :filtro";
            $result = DBAccessModel::find($sql,array('filtro' => $filtro));
            return $result;

        }

    }
    

?>


