<div id="grid-view" class="wrapper">
    <div class="product-container">
        <!--        --><?php //$images = getImages(); var_dump($images);  ?>
        <?php foreach(getImagesByUser(getCurrentUserId()) as $image) { ?>
            <?php include __DIR__ . '/user-item-grid-view.php';?>
        <?php } ?>
    </div>
</div><!-- end susy wrapper -->