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
                <p><?php echo isset($post['message'])?word_limiter($post['message'], 4, ''):""?></p>
            </div>                                        
        </div>                                    
    </div>
</div>
<?php
    $i++;
    if($i==3)break;
    }
}
?>