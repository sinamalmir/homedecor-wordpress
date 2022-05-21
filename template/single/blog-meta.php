
<ul class="d-flex list-none blog-meta">
    <li class="date-pub">
        <i class="far fa-calendar"></i>
        <!-- for showing date we using this function -->
        <span> <?php echo get_the_date(); ?> </span>
    </li>
    <li class="ps-5 comment-numbers">
        <i class="far fa-comment"></i>
        <span> <?php echo show_count_comments($post->ID); ?> </span>
<!--        <span>  Comments</span>-->
    </li>
</ul>



