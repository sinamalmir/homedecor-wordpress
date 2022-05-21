
<div class="search-form">
    <form action="<?php echo home_url(); ?>" id="search-form" method="get">
        <input type="text" name="s" id="s" class="form-control " placeholder="search..."
               value="<?php esc_attr(apply_filters('the_search_query', get_search_query())); ?>">
        <button type="submit" class="btn icon-search">
            <i class="fal fa-search"></i>
        </button>
    </form>
</div>



