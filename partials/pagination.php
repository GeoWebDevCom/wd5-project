

<?php if(getTotalPageCount() > 1){ ?>
<div class="row">
    <nav aria-label="Page navigation">
        <ul class="pagination pull-right">
<!--            <li>-->
<!--                <a href="#" aria-label="Previous">-->
<!--                    <span aria-hidden="true"></span>-->
<!--                </a>-->
<!--            </li>-->

            <?php
                for ($i = 1; $i<=getTotalPageCount(); $i ++){
                    echo '<li><a href="?page='. $i .'"> '. $i .'</a></li>';
                }
            ?>
<!--            <li>-->
<!--                <a href="#" aria-label="Next">-->
<!--                    <span aria-hidden="true"></span>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </nav>
</div><!-- end row -->
</div><!-- end container -->
<?php } ?>