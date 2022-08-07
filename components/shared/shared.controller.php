<?php 

    include "components/shared/mainpane.view.php";
    include "components/shared/navbar.view.php";

    class SharedController {

        public static function renderNav(){
            echo NavbarView::print(array());
        }

        public static function renderMainPaneHead(){
            echo MainpaneView::printHeadMain(array());
        }

        public static function renderMainPaneFoot(){
            echo MainpaneView::printFootMain(array());
        }

        public static function renderSidebarHead(){
            echo MainpaneView::printHeadSidebar(array());
        }

        public static function renderSidebarFoot(){
            echo MainpaneView::printFootSidebar(array());
        }

    }

?>