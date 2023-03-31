<?php
if (have_posts()):
	echo'<div class="row">';
        echo'<div class="col-12 col-md-12 col-lg-12">';
            /**
            * woocommerce_before_shop_loop hook.
            *
            * @hooked wc_print_notices - 10
            * @hooked woocommerce_result_count - 20
            * @hooked woocommerce_catalog_ordering - 30
            */
            do_action('woocommerce_before_shop_loop');
             
            woocommerce_product_subcategories();

	    echo'</div>';
    echo'</div>';

    woocommerce_product_loop_start();
    
		while (have_posts()): the_post();

            /**
            * woocommerce_shop_loop hook.
            *
            * @hooked WC_Structured_Data::generate_product_data() - 10
            */
            do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');

		endwhile; // end of the loop.

	woocommerce_product_loop_end();

        /**
        * woocommerce_after_shop_loop hook.
        *
        * @hooked woocommerce_pagination - 10
        */
        do_action('woocommerce_after_shop_loop');

            elseif (!woocommerce_product_subcategories(
                        array(
                            'before' => woocommerce_product_loop_start(false), 
                            'after' => woocommerce_product_loop_end(false)
                        )
                    )
            ): 

        /**
        * woocommerce_no_products_found hook.
        *
        * @hooked wc_no_products_found - 10
        */
        do_action('woocommerce_no_products_found');

endif;