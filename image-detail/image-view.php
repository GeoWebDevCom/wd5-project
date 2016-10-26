<?php $image = getImage($_GET['image']);?>
<div class="image-view">
    <h1 class="image-title"><?php echo $image->title?></h1>
    <img src="<?php echo $image->url ?>">
    <p class="image-description"><?php echo $image->description ?></p>
    <p class="image-user">Posted by:
        <span id="username"><?php echo getUser($image->user_id)->username ?></span></br></br>
        <span id="date-time">
        <?php
            displayDate($image->uploaded_on);
//            var_dump($image);
        ?>
    </p>
</div>

