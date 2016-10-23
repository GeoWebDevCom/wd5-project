<?php $image = getImage(  $GET['image']);?>
<div class="image-view">
    <h1 class="image-title"><?php echo $image->title?></h1>
    <img src="http://lorempixel.com/400/200">
    <p class="image-description"><?php echo $image->descript ?></p>
    <p class="image-user">Posted by:
        <span id="username"><?php echo $image->author ?></span></br></br>
        <span id="date-time">
        <?php
            $imageDate = new DateTime();
            $imageDate->setTimestamp($imageInfo->timestamp);
            echo $imageDate->format('F d, Y h:ia');
        ?>
    </p>
</div>

