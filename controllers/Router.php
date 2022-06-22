<?php

require_once('views/View.php');
class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {
            //Chargement automatique des classes
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url = '';

            if(isset($_GET['url']))//Si on as une url
            {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL)); //explode permet de récup les params séparément, le filtre sécurise les donnée récupérées

                $controller = ucfirst(strtolower($url[0]));//Le controlleur prend la valeur du premier paramètres
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else//Si l'url est introuvable
                throw new Exception('Page introuvable');
            }
            else//Si page d'url on renvoie vers l'accueil
            {
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }
        }
        //Gestion des erreurs
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            echo $errorMsg;
            //require_once('views/viewError.php');//Mettre erreur
        }
    }
}