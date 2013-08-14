<?php
/**
 * Template Name: Display Categories
 *
 */
get_header(); ?>
<div class="bigcontainer4">
    <div class="container">
           <div class="all_categories_title"><p>All</p><span>Categories</span></div>
          <div class="all_categories_list"> <ul>
                        <?php 
                        $args = array(
                            'orderby'            => 'count',
                            'order'              => 'desc',
                            'style'              => 'list',
                            'title_li'           => '',
                            'show_count'         => 1,
                            'hide_empty'         => 1,
                            'use_desc_for_title' => 1,
                            'child_of'           => 0,
                            'show_option_none'   => __('No categories'),
                            'number'             => 0,
                            'echo'               => 0,
                            'depth'              => 0,
                            'current_category'   => 0,
                            'pad_counts'         => 0,
                            'taxonomy'           => 'download_category',
                            'walker'             => null
                        );
                        $top_categories = wp_list_categories( $args ); 
                        $top_categories = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span>$1 Campaigns</span>', $top_categories);
                        echo $top_categories;
                        ?> 
                        </ul>
                            
                    </div>
        
        
        
        </div>
      </div>

<?php get_footer(); ?>