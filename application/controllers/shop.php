<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shop extends CI_Controller {

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
            'appId' => '741889032584710',
            'secret' => 'd893603e527c5167e9a2fed1817abe7a',
        ));         
        $this->load->model('m_shop');
    }
    
    public function index($pageId) {        
        $pageid = $pageId;
        //http://callmenick.com/post/displaying-a-custom-facebook-page-feed        
        $pagefeed = $this->facebook->api("/" . $pageid . "/feed");
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
        $data['shopObj'] = $this->m_shop->get_shop_by_fbId($pageId, $related = true);
        /*
        echo "<pre>";
        print_r($data['shop']->shop_name);
        echo "</pre>";
         * 
         */
        //Categorie menu
        $this->load->model('m_category');
        $data['categories'] = $this->m_category->get_categories_tierd(); 
        $this->load->view('shop',$data);
    }
    public function moreFeeds($pageId){
        $pageid = $pageId;
        $urlFeeds = $_POST['jSonFeeds'];
        $pagefeed = $this->facebook->api("/" . $pageid . "/feed?".$urlFeeds);
        
        $arr_paging_feed = explode("?",$pagefeed['paging']['next']);
        $url_more_feeds = $arr_paging_feed[1];
        $data['nextFeed'] = $this->facebook->api("/" . $pageid . "/feed?".$url_more_feeds);
        $data['pagefeed'] = $pagefeed;
        $data['url_more_feeds'] = $url_more_feeds;
        $data['pageId'] = $pageid;
        $this->load->view('load_more_feeds',$data);
    }
    public function category($cate_id,$page=1){
        if($cate_id!=""){            
            $this->load->model('m_category');
            $this->load->model('m_shop');
            $data['categories'] = $this->m_category->get_categories_tierd();
            $limit=2;
            $data['shops'] = $this->m_shop->get_shops($cate_id,$limit,$offset = false, $by = 'id_shop', $sort = 'desc');
            /*
            echo "<pre>";
            print_r($data['shops']);
            echo "</pre>";
             * 
             */
            $offset = ($page - 1) * $limit;
            $data['limit'] = $limit;
            $data['offset'] = $offset;
            $data['page'] = $page;
            $this->load->view('shop_category',$data);
        }
    }
    public function moreShops(){
        $id_cate = $this->input->post('id_cate');
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $page = $this->input->post('page');
        $page = $page+1;
        $offset = ($page - 1) * $limit;
        $this->load->model('m_shop');        
        $data['shops'] = $this->m_shop->get_shops($id_cate,$limit,$offset, $by = 'id_shop', $sort = 'desc');                
        $data['limit'] = $limit;
        $data['offset'] = $offset;
        $data['page'] = $page;
        $this->load->view('ajax_more_shops',$data);
    }
    public function ajaxGetHighlightFeeds(){
        $pageid = $this->input->post('fb_pageId');
        $pagefeed = $this->facebook->api("/" . $pageid . "/feed");
        $data['pagefeed'] = $pagefeed;        
        $this->load->view('ajax_feeds_by_shop',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */