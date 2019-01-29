<?php get_header(); ?>
	<?php
		$protestID = get_field('protest');
		
		$now = time(); // or your date as well
		$your_date = strtotime(get_field('date', $protestID));
		$datediff = $your_date - $now;

		$daysLeft = round($datediff / (60 * 60 * 24)) + 1;
	?>

	<main id="main" class="container-fluid protestContainer">

		<div class="row protest">
			<div class="col-md-9">
				<div class="protesterInfo">
					<img src="<?php the_post_thumbnail_url('full'); ?> " alt="<? the_field('name'); ?> activist photo" title="<? the_field('name'); ?> activist photo"  />
					<div class="h4"><? the_field('name'); ?></div>
					<p class="location">Los Angeles, CA &nbsp;&bull;&nbsp; 11 Protests Participated</p>
				</div>
				<div class="protestInfo">
					<p class="date"><?= date('l, M j Y', strtotime(get_field('date', $protestID))); ?></p>
					<p class="name"><?= get_the_title( $protestID ); ?></p>
					<p class="location"><? the_field('location', $protestID); ?></p>
				</div>
			</div>
			<div class="col-md-3 charityInfo">
				<h5>Charity of Choice</h5>
				<img src="<?php bloginfo('template_directory'); ?>/images/charity_logo.jpg" alt="" title=""/>
				<p>Fight for the Future is dedicated to protecting and expanding the Internet’s transformative power in our lives by creating civic campaigns that are engaging for millions of people.</p>
				<p><a href="#">learn more</a></p>
			</div>
		</div>


		<div class="donateContainer">
			<div class="amount">
				<div class="amountDonate">
					<span>$8,500</span>
					<a href="#"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/switch.svg" alt="switch donation type" title="switch donation type" /></a>
					<p>pledged of <?= substr(get_field('goal'), 0, -3); ?> goal</p>
				</div>
				<div class="amountDonate amountTotal amountHidden">
					<span>$50,000</span>
					<a href="#"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/switch.svg" alt="number of protest supporters" title="number of protest supporters" /></a>
					<p>total pledged to this protest</p>

				</div>
			</div>

			<div class="icon">
				<img class="svg" src="<?php bloginfo('template_directory'); ?>/images/heart.svg" alt="switch donation type" title="switch donation type" />
				<div>
					<span>59</span>
					<p>supporters</p>
				</div>
			</div>

			<div class="icon">
				<img class="svg" src="<?php bloginfo('template_directory'); ?>/images/calendar.svg" alt="switch donation type" title="switch donation type" />
				<div style="margin-left:12px;">
					<span><?= $daysLeft; ?></span>
					<p>days left</p>
				</div>
			</div>

			<a href="#" class="btn supportbtn"><span>Support This Activist</span></a>

			<div class="donationProgressBar">
				<div class="bar" data-percentage="85">
					<span>0%</span>
				</div>
			</div>
		</div>

		<div class="tab_container protest_tabs">
			<div class="tabs">
				  <ul id="tabs-nav">
				    <li><a href="#tab1">About The Cause</a></li>
				    <li><a href="#tab2">Live Updates</a></li>
				    <li><a href="#tab3">Supporters</a></li>
				    <div class="underbar"></div>
				    <div class="spread-the-word">
						<span>Spread The Word</span>
						<a href="http://www.facebook.com/share.php?u=<? the_permalink(); ?>" title="Share on Facebook" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/facebook.svg"></a>

						<a href="http://twitter.com/share?text=Support <? the_title(); ?>&amp;hashtags=WeGiveRise, Activist&amp;via=wegiverise&amp;url=<? the_permalink(); ?>" title="Share on Twitter" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/twitter.svg"></a>

						<a href="javascript: void(0);" data-clipboard-text="<?php the_permalink() ?>" class="clipbtn tooltip tooltip-bottom link" data-tooltip="copied!"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/web-link.svg"></a>
				

				    </div>
				  </ul> <!-- END tabs-nav -->
				  <div id="tabs-content">
					    <div id="tab1" class="tab-content tab-info">
					    	<div class="row">
								<div class="col-md-8">
									<? the_field('description', $protestID); ?>

									<div class="questions">
										<p>Questions About How This Works? <a href="/how-it-works">Check Out The FAQs</a></p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="sidebar_title"><?= substr(get_field('name'), 0, strrpos(get_field('name'), ' ')); ?>'s Top Supporters</div> 
									<div class="supporters">
										<div class="num">1</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>							
										</div>
									</div>
									<div class="supporters">
										<div class="num">2</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>
										</div>
									</div>
									<a href="#tab2" class="moredonors">Show All Donors</a>
								</div>
					    	</div>
					    </div>

					    <!-- LIVE UPDATES -->
					    <div id="tab2" class="tab-content tab-updates">
							<div class="sidebar_title"><?= substr(get_field('name'), 0, strrpos(get_field('name'), ' ')); ?>'s Live Updates</div>
							<span class="bytwitter">Brought To You By <img class="svg" src="<?php bloginfo('template_directory'); ?>/images/twitter.svg"></span> 
					    	<?= do_shortcode('[custom-twitter-feeds screenname=SocialPowerOne1 num=20]'); ?> 
					      
					    </div>

					    <!-- SPONSORS -->
					    <div id="tab3" class="tab-content tab-supporters">
					    	<div class="sidebar_title"><?= substr(get_field('name'), 0, strrpos(get_field('name'), ' ')); ?>'s Most Recent Supporters</div>

					    	<div class="row">
					    		<div class="col-md-4">
					    			<div class="supporters">
										<div class="num">1</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>
											<!--<p>"Morbi non tellus eu felis molestie interdum quis eu velit. Suspendisse sed lacus est. Suspendisse rutrum dui non sapien suscipit, a dolor egestas."</p>-->
										</div>
									</div>
								</div>
								<div class="col-md-4">
					    			<div class="supporters">
										<div class="num">2</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
					    			<div class="supporters">
										<div class="num">3</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span> 
										</div>
									</div>
								</div>
								<div class="col-md-4">
					    			<div class="supporters">
										<div class="num">4</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
					    			<div class="supporters">
										<div class="num">5</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
					    			<div class="supporters">
										<div class="num">6</div>
										<div class="supporter_content">
											<span class="amount">$1,000<span class="time">5 days ago</span></span>
											<span class="donor">Sergio Geanders</span>
										</div>
									</div>
								</div>
							
					    </div>
				  </div> <!-- END tabs-content -->
			</div> <!-- END tabs -->
		</div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
