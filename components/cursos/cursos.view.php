<?php

    class CursosView {

        public static function print($data){

            $view = '
            
                <div class="container mt-4">
                    <video width="100%" controls>
                        <source src="movie.mp4" type="video/mp4">
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


            return $view;

        }

    }


?>

