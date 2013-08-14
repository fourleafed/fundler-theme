		<div class="bigcontainer5">
			<div class="container">			
				<div class="footer_widgets">
					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footerwidgets') ) : ?><?php else : ?><?php endif; ?>
				</div>
			</div>
		</div> 
		<div class="bigcontainer6">
			<div class="container">	         
				<footer class="footer" role="contentinfo">
					<div id="inner-footer" class="wrap clearfix">
						<div class="footer_credits">
							&copy; <?php echo date('Y'); ?> All Rights Reserved
						</div>
						<div class="footer_navigation">
							<nav role="navigation">
								<?php fundler_footer_links(); ?>
							</nav>
						</div>
						<div class="footer_logo">
							<?php bloginfo('name'); ?>
						</div>
					</div>
				</footer>
			</div>
		</div> 
		<?php wp_footer(); ?>
	</body>
</html>