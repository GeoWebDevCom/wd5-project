<div class="user__container">
    <h3 class="comment__title">Post a Comment:</h3>
    <form action="#previous_comments" method="post">
        <input
            name="user_id"
            type="hidden"
            value="<?php echo getCurrentUserId() ?>"
        />
        <input
            name="image_id"
            type="hidden"
            value="<?php echo filter_input(INPUT_GET, 'image') ?>"
        />
        <textarea
            class="comment__input"
            rows="3"
            name="text"
        ></textarea></br>
        <button class="btn button"
                name="insert_comment"

        >submit</button>
    </form>


</div>
<hr>