<?php include("_header.php");?>

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free E-Commerce Template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?php echo site_url()?>assets/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                        <img src="<?php echo site_url()?>assets/images/home/pricing.png"  class="pricing" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?php echo site_url()?>assets/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                        <img src="<?php echo site_url()?>assets/images/home/pricing.png"  class="pricing" alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free Ecommerce Template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?php echo site_url()?>assets/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                        <img src="<?php echo site_url()?>assets/images/home/pricing.png" class="pricing" alt="" />
                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">                            
                            <?php
                            include '_left_sidebar.php';
                            ?>
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center"><?php echo $shopObj->shop_name;?> 's Feeds</h2>                            
                            <?php
                            $i = 0;
                            foreach($pagefeed['data'] as $post) {
                                if ($post['type'] == 'photo') {
                                    $image_url  =   'https://graph.facebook.com/'.$post['object_id'].'/picture';                                     

                            ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?php echo $post['link']?>" target="_blank"><img src="<?php echo $image_url;?>" alt="" /></a>
                                            <!--<h2><?php echo $post['from']['name']?></h2>-->
                                            <p><?php echo isset($post['message'])?word_limiter($post['message'], 4, ''):""?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>
                                        </div>                                        
                                    </div>                                    
                                </div>
                            </div>
                            <?php
                                $i++;
                                }
                            }
                            if(!empty($nextFeed['data'])){
                            
                            echo "<div class=\"col-sm-12 text-center load_more_feeds\" style=\"cursor: pointer\" onclick=\"moreFeeds('".$url_more_feeds."','".$pageId."')\"><div class = \"alert alert-info\"><b>Load more feeds...</b></div></div>";
                            
                            }
                            ?>
                        </div><!--features_items-->                        
                    </div>
                </div>
            </div>
        </section>        
        <?php include("_footer.php");?>