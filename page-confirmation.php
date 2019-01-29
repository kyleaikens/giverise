<?php 
// Sets our destination URL
$endpoint_url = 'http://data.orghunter.com/v1/charitysearch';

// Creates our data array that we want to post to the endpoint
$data_to_post = [
	'user_key' => '382c46790147c7fd93f502a24973c850',
	'searchTerm' => 'Human'
	//'amount' => '5000',
	//'currency' => 'usd',
	//'source' => 'Fo4GNkpksONt7U9ZX2Rj00Y1ugQ',
	//'receipt_email' => 'kyle.aikens@gmail.com',
	//'platform_fee' => '1000',
	//'destination_ein' => '52-1481896',
];

$headerOptions = [
		        "apikey: 382c46790147c7fd93f502a24973c850",
		        "cache-control: no-cache"
		      ];

// Sets our options array so we can assign them all at once
$options = [
  	CURLOPT_URL        => $endpoint_url,
	CURLOPT_POST       => false,
	CURLOPT_POSTFIELDS => $data_to_post,
	//CURLOPT_HTTPHEADER => $headerOptions,
];

// Initiates the cURL object
$curl = curl_init();

// Assigns our options
curl_setopt_array($curl, $options);

// Executes the cURL POST
$results = curl_exec($curl);

echo $curl;

// Be kind, tidy up!
curl_close($curl);

get_header();


?>


<div class="container-fluid-980"> 
	<div class="row row-eq-height">
		<div class="col-md-12 container-padding center-container">
	
			<h1>Thank You For Your Donation</h1>		
			<h4>Share your protest with your social network to get your first sponsorship.</h4>

			<? 
			// WP_Query arguments
			$args = array(
				'post_type' => 'protests',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => '1'
			);

			// The Query
			$query = new WP_Query( $args );
			// The Loop
				while ( $query->have_posts() ) { $query->the_post(); ?>
					
					<div class="social-container">
						<a class="icon icon-facebook icon-replacement" href="#" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/facebook.svg"></a>

						<a class="icon icon-twitter icon-replacement" href="#" onclick="window.open('https://twitter.com/intent/tweet?text=Support <?php the_title() ?> by sharing or donating today! <?php the_permalink() ?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/twitter.svg"></a> 
						
						<div class="clipboard">
							<input value="<?php the_permalink() ?>" readonly><button data-clipboard-text="<?php the_permalink() ?>" class="clipbtn tooltip tooltip-bottom" data-tooltip="copied!" >
							    Copy URL
							</button>
						</div>

						<a href="<?php the_permalink() ?>">View Your Protest</a>


					</div>
			
			<? }
			wp_reset_postdata();
			?>

		</div>

	</div>
</div>

<?php get_footer();