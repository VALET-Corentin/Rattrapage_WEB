<?php

require_once('views/View.php');

class ControllerAccueil
{
    private $_piloteManager;
    private $_view;

    public function __construct($url)
    {
        // if(isset($url) && count($url) > 1)
        //     throw new Exception('Page introuvable');
        // else
        //     $this->articles();
        $this->pilotes();
    }

    private function pilotes()
    {
        $this->_piloteManager = new PiloteManager;
        $pilotes = $this->_piloteManager->getPilotes();

        $this->_view = new View('Accueil');
        $this->_view->generate(array('pilotes' => $pilotes));
        //require_once('views/viewAccueil.php');
    }
}