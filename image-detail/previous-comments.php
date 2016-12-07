<div class="previous">

    <?php $comments = getComments( $image->id ); ?>
    <?php if ( ! empty( $comments ) ) { ?>
        <h3 id="previous_comments" class="comment__title">Previous Comments:</h3>
        <?php foreach ( getComments( $image->id ) as $comment ) { ?>
            <?php include __DIR__ . '/previous-comment-view.php'; ?>
        <?php } ?>
    <?php } ?>
</div>

