<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('facebook', array(
            'appId' => config_item('appId'),
            'secret' => config_item('secret'),
        ));
        $this->load->model('m_shop');        
        $this->pageid = $this->m_shop->random();
    }

    public function index() {
        $pageid = $this->pageid;
        //http://callmenick.com/post/displaying-a-custom-facebook-page-feed        
        $pagefeed = $this->facebook->api("/" . $this->pageid . "/feed");        
        $jsonFb = getFbPageInfoByUrl('https://www.facebook.com/PinengPOWERBANKCambodia/',$accessToken='');        
        //$jsonFb = getFbId('https://www.facebook.com/KhmerCarMarket');       
         
        /*
        echo "<pre>";
        print_r($json);
        echo "</pre>";
         * 
         */
        /*
        echo "<pre>";
        print_r($pagefeed);
        echo "</pre>";
         */
        //echo $pagefeed['paging']['next'];
        $arr_paging_feed = explode("?",$pagefeed['paging']['next']); 
        $url_more_feeds = $arr_paging_feed[1];
        $data['nextFeed'] = $this->facebook->api("/" . $pageid . "/feed?".$url_more_feeds);        
        $data['pagefeed'] = $pagefeed;
        $data['url_more_feeds'] = $url_more_feeds;
        $data['pageId'] = $pageid;
        $this->load->model('m_category');
        $data['categories'] = $this->m_category->get_categories_tierd();        
        $this->load->view('index',$data);
    }    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */