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
                                        <img src="assets/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                        <img src="assets/images/home/pricing.png"  class="pricing" alt="" />
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
                                        <img src="assets/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                        <img src="assets/images/home/pricing.png"  class="pricing" alt="" />
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
                                        <img src="assets/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                        <img src="assets/images/home/pricing.png" class="pricing" alt="" />
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
                        <div id="shop_list"><!--features_items-->
                            <h2 class="title text-center">Shop Lists</h2>
                            <?php
                            if(!empty($shops)){
                            $i = 0;
                            foreach($shops as $shop){
                                $i++;
                            echo "<h4 class=\"title\"><a href=\"".  site_url('shop/index/'.$shop->id_fb)."\">".$i.". ".$shop->shop_name."</a></h4>";
                            ?>
                            <div id="HighlightFeeds_<?php echo $i;?>">                                
                            </div>
                            <div style="clear: both;"><hr/></div>
                            <script>
                                getHighlightFeeds(<?php echo $i?>,<?php echo $shop->id_fb?>);
                            </script>                            
                            <?php
                            }
                            ?>
                            <?php
                                if($i>=$limit){
                            echo "<div class=\"col-sm-12 text-center load_more_shops\" style=\"cursor: pointer\" onclick=\"moreShops('".$shop->cate_id."','".$limit."','".$offset."','".$page."')\"><div class = \"alert alert-info\"><b>Load more shops...</b></div></div>";
                                }
                            }
                            ?>
                        </div><!--features_items-->                        
                    </div>
                </div>
            </div>
        </section>        
        <?php include("_footer.php");?>