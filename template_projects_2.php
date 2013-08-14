<?php
/**
 * Template Name: All Projects 2
 *
 */

get_header(); ?>


<div class="bigcontainer4">
		<div class="container">
        
        <div class="subpage_line2">
        
          <?php 
                            $featured = new ATCF_Campaign_Query( array( 
                                'posts_per_page' => 1,
                                'meta_query'     => array(
                                    array(
                                        'key'     => '_campaign_featured',
                                        'value'   => 1,
                                        'compare' => '=',
                                        'type'    => 'numeric'
                                    )
                                )
                            ) ); 

                            while ( $featured->have_posts() ) : $featured->the_post();
                                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-single-image' );
                            $campaign = new ATCF_Campaign( $post ); ?>
            <div class="homepage_featured">
                <div class="homepage_featured_title">
                    <div class="ftitle"><p>Featured</p><span>Campaign</span></div>
                </div>
                <div class="homepage_featured_img">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>"></a>
                </div>
                <div class="homepage_featured_content">
                    <div class="homepage_featured_content_left">
                        <div class="homepage_featured_content_left_data">
                            <ul>
                                <li>
                                    <?php echo $campaign->days_remaining(); ?>
                                </li>
                                <li>
                                    <?php echo $campaign->current_amount(); ?>
                                </li>
                                <li>
                                    <?php echo $campaign->backers_count(); ?>
                                </li>
                            </ul>
                        </div>
                        <div class="homepage_featured_content_left_data_name">
                            <ul>
                                <li>Days to go
                                </li>
                                <li>Pledged
                                </li>
                                <li>Funders
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="homepage_featured_content_right">
                     <div class="homepage_featured_content_right_title">
                    <a href="<?php the_permalink(); ?>"><?php echo short_title('...', 6);?></a>
                </div>
                        <?php echo wp_trim_words(get_the_excerpt(), 65); ?>
                        <div class="top_info_line_box_button" id="homepage_featured_button">
                            <a href="<?php the_permalink(); ?>">view project</a>
                        </div>
                    </div>
                </div>
            </div><?php endwhile; ?>
        
        
        <div class="homepage_browse" id="projectbrowse">
        <div class="homepage_browse_top">Discover Projects</div>
        <div class="homepage_browse_content">
        <div class="homepage_browse_content_title"><p>Top</p><span>Categories</span></div>
        <div class="homepage_browse_content_left"> <ul>
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
                            'number'             => 8,
                            'echo'               => 0,
                            'depth'              => 0,
                            'current_category'   => 0,
                            'pad_counts'         => 0,
                            'taxonomy'           => 'download_category',
                            'walker'             => null
                        );
                        $top_categories = wp_list_categories( $args ); 
                        $top_categories = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span>+$1</span>', $top_categories);
                        echo $top_categories;
                        ?> 
                        </ul>
                            
                    </div>
                   
                </div>
                
        <div class="homepage_browse_search"><form method="get" id="searchform" action="<?php echo home_url(); ?>/"><div class="browse_search_input"><input type="text" size="" name="s" id="s" value="search project..." onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/></div><div class="browse_search_submit"><input type="submit" id="searchsubmit" value="" class="browse_search_button" /></div></form></div>
        </div>
        </div>
        
        
        <div class="subpage_line">
        <div class="projects_list_line2"><ul>
        
         <?php
        $wp_query = new ATCF_Campaign_Query( array( 
            'posts_per_page' => 9,
            'paged' => ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 )
        ) ); 

        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), '240' );
        $campaign = atcf_get_campaign( $post ); ?>
                    <li>
                    <div class="project_list_sub_box">
                        <div class="project_list_box_title">
                            <div class="project_list_box_img">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>"></a>
                            </div>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php echo short_title('...', 6);?></a>
                            </h3>
                        </div>
                        <div class="project_list_box_loader">
                            <div class="project_list_box_loaderbar"></div>
                        </div>
                        <div class="project_list_box_dataline">
                            <div class="project_list_box_dataline_left">
                                <p>
                                    Backers
                                </p><span><?php echo $campaign->backers_count(); ?></span>
                            </div>
                            <div class="project_list_box_dataline_right">
                                <div class="project_list_box_dataline_right_top">
                                    <div class="project_list_box_dataline_right_line1">
                                        <p>
                                            Pledged:
                                        </p><span><?php echo $campaign->current_amount(); ?></span>
                                    </div>
                                    <div class="project_list_box_dataline_right_line2">
                                        <p>
                                            Time Left:
                                        </p><span><?php echo $campaign->days_remaining(); ?> d</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project_list_box_content_bg">
                            <div class="project_list_box_content_bg2">
                                <div class="project_list_box_content">
                                    <?php echo wp_trim_words(get_the_excerpt(), 23); ?>
                                </div>
                            </div>
                            <div class="project_list_box_nav">
                                <p>
                                    <?php echo $campaign->location(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    </li>
                <?php endwhile; 
                    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    
                    $pagination = array(
                        'base' => @add_query_arg('page','%#%'),
                        'format' => '',
                        'total' => $wp_query->max_num_pages,
                        'current' => $current,
                        'show_all' => true,
                        'type' => 'list',
                        'next_text' => '&raquo;',
                        'prev_text' => '&laquo;'
                        );
                    
                    if( $wp_rewrite->using_permalinks() )
                        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
                    
                    if( !empty($wp_query->query_vars['s']) )
                        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
                    
                    echo paginate_links( $pagination );
                    wp_reset_postdata();
                ?>
      
        </ul></div>
        
        <div class="projects_sidebar">
        <div class="projects_sidebar_title">Categories</div>
        <div class="projects_sidebar_content">
        <ul>
       <?php 
                        $args = array(
                            'orderby'            => 'count',
                            'order'              => 'desc',
                            'style'              => 'list',
                            'title_li'           => '',
                            'show_count'         => 0,
                            'hide_empty'         => 0,
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
                        $top_categories = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span>+$1</span>', $top_categories);
                        echo $top_categories;
                        ?> 
        </ul>
        </div>        
        </div>
        
        </div>
        
        </div>
        
         </div>
    </div>

<?php get_footer(); ?>