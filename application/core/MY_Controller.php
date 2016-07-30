<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

//end __construct()
}

//end Base_Controller

class Admin_Controller extends Base_Controller {

    function __construct() {

        parent::__construct();        
    }

}

class Frontend_Controller extends Base_Controller {

    function __construct() {
        parent::__construct();        
    }

}
?>
