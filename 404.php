<?php get_header(); ?>

		<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					
<div class="page_404">

								<h1 class="big404"><?php _e("404 - Something Missing", "fundler"); ?></h1>



							<section class="content_404">

								<p><?php _e("The content you were looking for was not found, but maybe try looking again with the search form below!", "fundler"); ?></p>

							</section> <!-- end article section -->

							<section class="search">

									<div class="content_404_search"><form method="get" id="searchform" action="<?php echo home_url(); ?>/"><div class="content_404_search_input"><input type="text" size="" name="s" id="s" value="search here..." onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/></div><div class="content_404_search_submit"><input type="submit" id="searchsubmit" value="" class="content_404_search_button" /></div></form></div>

							</section> <!-- end search section -->

							

						</article> <!-- end article -->
                       </div>
	             </div> <!-- end #inner-content -->

			</div> <!-- end #content -->
</div></div>

<?php get_footer(); ?>
