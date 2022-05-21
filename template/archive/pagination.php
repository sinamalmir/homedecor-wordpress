<div class="row">
    <div class="col-12">
        <nav class="anis-pagination">

            <ul class="pagination justify-content-center mt-5 mb-5">

                <?php
                echo paginate_links(array(
                    'base'               => str_replace(999999999,'%#%',esc_url(get_pagenum_link(999999999))),
                    'format'             => '?paged=%#%',
                    'total'              => $wp_query -> max_num_pages,
                    'current'            => max(1,get_query_var('paged')),
                    'show_all'           => false,
                    'end_size'           => 2,
                    'mid_size'           => 1,
                    'prev_next'          => true,
                    'prev_text'          => '<i class="fal fa-angle-left"></i>',
                    'next_text'          => '<i class="fal fa-angle-right"></i>',
                    'type'               => 'plain',
                    'add_args'           => false,
                    'add_fragment'       => ''
                ));
                ?>

            </ul>
        </nav>
    </div>
</div>