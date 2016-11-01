<div class="previous">

    <h3 class="comment__title">Previous Comments:</h3>
    <?php var_dump($image, getComments($image->id))?>
    <?php foreach(getComments($image->id) as $image_id) { ?>
        <?php include __DIR__ . '/previous-comment-view.php';?>
    <?php } ?>
</div>

<?php //echo date('F d, Y') . ' at ' . date('h:ia ', strtotime($date1))?>