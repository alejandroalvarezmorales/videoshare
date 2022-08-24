<?php

    class CursosView {

        public static function print($data){

            $view = '
            
                <div class="container mt-4">
                    <video id="video" width="100%" controls controlslist="nodownload">
                        <source src="files'.$data['filename'].'" type="video/mp4">
                    </video> 
                    <div class="mt-3">
                        <div class="h3 font-weight-bold">
                            '.$data['video_name'].'
                        </div>
                        <h5>
                            '.$data['description'].'
                        </h5>
                    </div>
                </div>
                
            
            
            ';

            $view .= self::getScript();

            return $view;

        }

        public static function getScript(){

            $script = '
                <script>
                    $("#video").on("contextmenu",function(e){
                        console.log(e);
                        e.preventDefault();
                    });



                </script>
                <scrip disable-devtool-auto src="https://cdn.jsdelivr.net/npm/disable-devtool@latest/disable-devtool.min.js"></scrip>    
            
            ';

            return $script;

        }

    }


?>

