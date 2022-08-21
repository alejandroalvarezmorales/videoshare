<?php 

    include "components/admin/videos/adminvideos.model.php";
    include "components/admin/videos/adminvideos.view.php";

    class AdminVideosController{

        public static function render(){

            $status = AdminVideosModel::uploadFile();
            $videolist = AdminVideosModel::getFiles();
            $data = array("status" => $status, "lista" => $videolist);
            echo AdminVideosView::print($data);

        }

     


    }

?>