<?php

    class CursosModel {

        public static function getData(){

            if (! isset($_POST['id']) && isset($_SESSION['videosavailable']['data'][0]['video_id']) ){
                $_POST['id'] = $_SESSION['videosavailable']['data'][0]['video_id'];
            }

            $video = array(
                'video_id' => 0,
                'video_name' => 'Muestra',
                'description' => 'Descripción muestra',
                'filename' => '/muestra.mp4'
            );

            foreach($_SESSION['videosavailable']['data'] as $key => $value) {
                if($value['video_id'] == $_POST['id']){
                    $video = $value;
                }
            }

            

            return $video;
        }

    }


?>