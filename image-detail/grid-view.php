
<div id="grid-view" class="wrapper">
    <div class="product-container">
<!--        --><?php //$images = getImages(); var_dump($images);  ?>
        <?php foreach(getImages(12, getCurrentOffset()) as $image) { ?>
            <?php include __DIR__ . '/grid-item-view.php';?>
       <?php } ?>
    </div>
</div><!-- end susy wrapper -->
<?php include __DIR__ . '/../partials/pagination.php'; ?>
