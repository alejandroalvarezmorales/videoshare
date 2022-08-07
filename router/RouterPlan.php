<?php
    
    require_once "config/config.php";
    require_once "classes/debug.class.php";
    require_once "router/Router.php";
    require_once "classes/Authentication.php";
    require_once "classes/Authorization.php";
    require_once "components/main.controller.php";
    require_once "components/login/login.controller.php";
    require_once "components/register/register.controller.php";
    require_once "components/shared/shared.controller.php";
    require_once "components/inicio/inicio.controller.php";
    require_once "components/admin/admin.controller.php";
    require_once "components/cursos/cursos.controller.php";
    require_once "components/sidebar/sidebar.controller.php";
    require_once "components/admin/users/users.controller.php";
    require_once "components/admin/cursos/admincursos.controller.php";
    require_once "components/admin/videos/adminvideos.controller.php";


    class RoutingPlan{


        public static function routing(){    
            MainController::getHead();
 

            $router = Router::getRoutes();
            switch($router["p"]){
                case 'salir':
                    Authentication::logOff();
                    break;
                case 'login':
                    
                    self::unAuthenticatedRedirect(false);
                    LoginController::render();

                    break;
                case 'register':
                    
                    self::unAuthenticatedRedirect(false);
                    RegisterController::render();

                    break;
                case 'inicio':                 
                    
                    self::unAuthenticatedRedirect(true);
                    SharedController::renderNav();
                    SharedController::renderMainPaneHead();
                    InicioController::render();
                    SharedController::renderMainPaneFoot();
                    SharedController::renderSidebarHead();
                    SidebarController::render();
                    SharedController::renderSidebarFoot();

                    break;
                case 'cursos':

                    self::unAuthenticatedRedirect(true);
                    SharedController::renderNav();
                    SharedController::renderMainPaneHead();
                    CursosController::render();
                    SharedController::renderMainPaneFoot();
                    SharedController::renderSidebarHead();
                    SidebarController::render();
                    SharedController::renderSidebarFoot();

                    break;
                case 'admin':
                    self::unAuthenticatedRedirect(true);
                    SharedController::renderNav();

                    
                    SharedController::renderMainPaneHead();
                    AdminController::render();
                    self::adminPageOption($router);
                    SharedController::renderMainPaneFoot();


                    SharedController::renderSidebarHead();
                    SidebarController::render();
                    SharedController::renderSidebarFoot();
                    break;                

                default:
                    self::unAuthenticatedRedirect(true);
                    SharedController::renderNav();
                    SharedController::renderMainPaneHead();
                    InicioController::render();
                    SharedController::renderMainPaneFoot();
                    SharedController::renderSidebarHead();
                    SidebarController::render();
                    SharedController::renderSidebarFoot();
                    break;
            }


            MainController::getFoot();

        }

        public static function adminPageOption($router){
            switch($router["o"]){
                case "usuarios":
                    UsersController::render();
                    break;
                case "cursos":
                    AdminCursosController::render();
                    break;
                case "videos":
                    AdminVideosController::render();
                    break;
                default:
                    UsersController::render();
                    break;
            }


        }


        public static function unAuthenticatedRedirect($apply = true){
            if ( !Authentication::isAuthenticated() &&  $apply ) {
                LoginController::render();
                MainController::getFoot();
                
                exit();          
            } 
        }

    }



?>