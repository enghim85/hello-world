<?php
if(!empty($shops)){
$i = $offset;
foreach ($shops as $shop) {
    $i++;
    echo "<h4 class=\"title\"><a href=\"" . site_url('shop/index/' . $shop->id_fb) . "\">" . $i . ". " . $shop->shop_name . "</a></h4>";
    ?>
    <div id="HighlightFeeds_<?php echo $i; ?>">                                
    </div>
    <div style="clear: both;"><hr/></div>
    <script>
        getHighlightFeeds(<?php echo $i ?>,<?php echo $shop->id_fb ?>);
    </script>                            
    <?php
}
?>
<?php
echo "<div class=\"col-sm-12 text-center load_more_shops\" style=\"cursor: pointer\" onclick=\"moreShops('" . $shop->cate_id . "','" . $limit . "','" . $offset . "','" . $page . "')\"><div class = \"alert alert-info\"><b>Load more shops...</b></div></div>";
}
?>