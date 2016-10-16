<div class="previous">
    <h3 class="comment__title">Previous Comments:</h3>
    <?php foreach(getComments() as $value) { ?>
<!--        --><?php //  print_r($value); ?>
        <?php include __DIR__ . '/previous-comment-view.php';?>
    <?php } ?>
</div>

<?php //echo date('F d, Y') . ' at ' . date('h:ia ', strtotime($date1))?>