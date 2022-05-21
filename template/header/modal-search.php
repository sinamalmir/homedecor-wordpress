
<!-- start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex" action="<?php echo home_url(); ?>" id="search-form" method="get">
                    <input class="form-control me-2" name="s" id="s" type="search" placeholder="Search for product" aria-label="Search"
                           value="<?php esc_attr(apply_filters('the_search_query', get_search_query())); ?>" >
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->