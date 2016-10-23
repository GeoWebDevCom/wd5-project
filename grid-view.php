<?php include __DIR__ . '/pagination.php'; ?>
<div id="grid-view" class="wrapper">
    <div class="product-container">
        <?php foreach(getImages() as $index => $image) { ?>
            <?php include __DIR__ . '/grid-item-view.php';?>
       <?php } ?>
    </div>
</div><!-- end susy wrapper -->
<hr>