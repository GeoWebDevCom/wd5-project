
<div class="previous__container">
    <h3 class="previous__author"><span class="comment__title">User:</span></br> <?php echo $value->author ?></h3>
    <p><span class="comment__title">Commented:</span></br> <?php echo $value->comment ?></p>
    <p class="image-user">
        <span class="comment__title">On:</span></br>
        <?php
        $commentDate = new DateTime();
        $commentDate->setTimestamp($value->timestamp);
        echo $commentDate->format('F d, Y h:ia');
        ?>
    </p>
</div>