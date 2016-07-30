<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->                                                               
    <?php
    categoriesDropdown($categories);

    function categoriesDropdown($categories) {
        foreach ($categories as $cat) {
            $category = $cat['category'];
            $children = $cat['children'];
            $title_cat = "<a href=\"" . $category->slug . "\">"
                    . $category->name . "</a>";
            if (!empty($children)) {
                $title_cat = "<a data-toggle=\"collapse\" data-parent=\"#accordian\" href=\"#" . url_title($category->name) . "\">"
                        . "<span class=\"badge pull-right\"><i class=\"fa fa-plus\"></i></span>" . $category->name . "</a>";
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
        <?php echo $title_cat; ?>
                    </h4>
                </div>
                <?php
                if (!empty($children)) {
                    //categoriesDropdown($children,$parent_id=url_title($category->name),$class="panel-collapse collapse");
                    ?>                                            
                    <div id="<?php echo url_title($category->name) ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <?php
                                foreach ($children as $child) {
                                    $child = $child['category'];
                                    echo "<li><a href=\"" . site_url($child->slug) . "\">" . $child->name . " </a></li>";
                                }
                                ?>                                                                      
                            </ul>
                        </div>
                    </div>                                            
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
    ?>
</div><!--/category-products-->                            
<div class="shipping text-center"><!--shipping-->
    <img src="assets/images/home/shipping.jpg" alt="" />
</div><!--/shipping-->