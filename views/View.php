<?php
class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'views/view'.$action.'.php';
    }

    //Génére et affiche la vue
    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));

        echo $view;
    }

    //Gérnére un fichier vue et renvoie le résultat
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            //temporisation
            ob_start();

            require $file;

            return ob_get_clean();
        }
        else
        {
            throw new Exception('Fichier '.$file.' introuvable');
        }
            
    }
}