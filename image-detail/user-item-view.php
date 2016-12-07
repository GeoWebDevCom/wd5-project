<div id="grid-view" class="wrapper">
    <div class="product-container">

        <?php $images = getImagesByUser(getCurrentUserId() );  ?>

        <?php if(empty($images)){ ?>

                    <div class="emptyMsg">
                        <p>Looks like you have no images! <a href="<?php echo APP_HOST?>/upload.php">Upload</a> one now!</p>
                    </div>

        <?php }else{ ?>

                        <?php foreach($images as $image) { ?>
                            <?php include __DIR__ . '/user-item-grid-view.php';?>
                        <?php } ?>

        <?php } ?>
    </div>
</div><!-- end susy wrapper -->