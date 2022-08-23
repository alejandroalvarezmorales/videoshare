<?php 

    class MainpaneView {

        public static function printHeadMain($data){

            $view = '          
                <div class="container-fluid">
                    <div class="row ps-3 pt-2">
                        <div class="col-10 p-3">                           
            ';


            return $view;
        }

        public static function printFootMain($data){
            $view = '
                        </div>
            ';


            return $view;


        }

        public static function printHeadSidebar($data){

            $view = '
                        <div class="col p-3 br-1">   
            ';


            return $view;
        }

        public static function printFootSidebar($data){
            $view = '
                        </div>
                    </div>
                </div>
            ';

            return $view;


        }

    }




?>