
<div class="previous__container">
    <h3 class="previous__author"><span class="comment__title">User:</span></br> <?php echo $comment->user_id ?></h3>
    <p><span class="comment__title">Commented:</span></br> <?php echo $comment->text ?></p>
    <p class="image-user">
        <span class="comment__title">On:</span></br>
        <?php
        displayDate($comment->uploaded_on);;
        ?>
    </p>
</div>