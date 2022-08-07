<?php 

    include "components/admin/videos/adminvideos.model.php";
    include "components/admin/videos/adminvideos.view.php";

    class AdminVideosController{

        public static function render(){
            echo AdminVideosView::print(array());

        }


    }

?>