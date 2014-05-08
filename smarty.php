<?php
define('SMARTY_DIR', 'smarty-3.1.14/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');

class Smarty_GuestBook extends Smarty {

   function __construct()
   {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates_c/');
        $this->setConfigDir('configs/');
        $this->setCacheDir('cache/');
		
		$this->caching = 0; //cache enabled = 1
		$this->compile_c = 0; //cache enabled = 1
        #$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        
   }

}

?>
