<?php 

    include "components/sidebar/sidebar.model.php";
    include "components/sidebar/sidebar.view.php";


    class SidebarController{

        public static function render(){

            $data = SidebarModel::getData();
            echo SidebarView::print($data);


        }

    }

?>