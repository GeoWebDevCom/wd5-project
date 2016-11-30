<a href="detail.php?image=<?php echo $image->id; ?>" class="product product--hover">
    <figure style="background-image: url('<?php echo $image->url;?>');">
        <h2><?php echo $image->title ?></h2>
    </figure>
    <form method="post">
        <input
            type="submit"
            class="delete"
            value="Delete"
            name="delete_image"
        />
        <input
            type="hidden"
            value="<?php echo $image->id ?>"
            name="image_id"
        />
    </form>
</a>
