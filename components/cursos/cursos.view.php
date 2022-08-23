<?php

    class CursosView {

        public static function print($data){

            $view = '
            
                <div class="container mt-4">
                    <video id="video" width="100%" controls controlslist="nodownload">
                        <source src="files/7_1030_R5Ub" type="video/mp4">
                    </video> 
                    <div class="mt-3">
                        <div class="h5">
                            <strong>
                                Curso de contabilidad.
                            </strong>
                        </div>
                        <p>
                            Recomposicion oficial de contabilidad impuesto y libros diarios.
                        </p>
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
                <script disable-devtool-auto src="https://cdn.jsdelivr.net/npm/disable-devtool@latest/disable-devtool.min.js"></script>    
            
            ';

            return $script;

        }

    }


?>

