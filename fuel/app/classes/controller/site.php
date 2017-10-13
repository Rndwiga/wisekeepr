<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */
$path_to_sucker = APPPATH . 'classes' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'sucker' . DIRECTORY_SEPARATOR . 'Sucker.class.php';

require_once($path_to_sucker);

class Controller_Site extends Controller {

    public function action_index() {
        
        die('WiseKeepr');
    }
    
    public function action_download($file = NULL) {
        //Caminho para o arquivo 
        $path_file = DOCROOT."sites" . DIRECTORY_SEPARATOR . "$file.zip";
        
        //Verifica se o arquivo existe
        if (\File::exists($path_file)) {
            //Download do arquivo        
            \Sucker::Download($path_file, "$file");
        }else{
            //Redireciona caso o arquivo não exista
            \Response::redirect('home');
        }
        
    }

}


