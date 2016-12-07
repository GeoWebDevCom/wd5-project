<?php
include __DIR__ . '/partials/header.php';
include __DIR__ . '/image-detail/image-container.php';

    if (isLoggedIn()) {
        include __DIR__ . '/image-detail/comment-container.php';
    }else {

    }

include __DIR__ . '/partials/footer.php';
?>
    













