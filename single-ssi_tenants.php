<?php
/**
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
 //$staff = get_posts( array('post_type' => 'ssi_staff', 'posts_per_page' => -1, 'orderby' => 'modified') );
 //wp_reset_query();

get_header('2018'); 

if( get_field( 'MX_user_ID', get_the_ID() ) ){
	$report_user_ID = get_field( 'MX_user_ID',  get_the_ID() );
	$has_user = 1;
	$user = get_userdata( $report_user_ID );
}elseif( get_field( 'MX_user_id', get_the_ID() ) ){
	$report_user_ID = get_field( 'MX_user_id',  get_the_ID() );
	$has_user = 1;
	$user = get_userdata( $report_user_ID );
}


?>


	<div class='clearfix'></div>
<?php
		$tenant_id = get_the_ID();
		
		$person = get_post(get_the_ID());
		
		
		$report_person = get_post($_GET['person']);
		
		
		$report_user = get_userdata( $report_user_ID );
		
		
		//print_r( $person );
		


		
	?>


<div class='clearfix'></div>


	
<?php if( $has_user ){ ?>
<div class='top '>


				
				
				<div class='col-xs-3 text-center'>
					<?php echo $user->display_name; ?>
									<br><br>
									
				<?php 
				
					if( get_field( 'facebook' , $lead->ID ) != '' ){
						
						
				?>
						<img src="http://graph.facebook.com/<?php echo get_field( 'facebook' , $lead->ID ); ?>/picture" class="hidden img-responsive">
					<?php 

					}
				?>
				<div class='circle'>
				<?php echo  get_avatar($user->ID, 96) . "<br>"; ?>
				
				</div>
				<?php		
				
					?>
				</div>
				<div class='col-xs-5 '>
	
		<div class='clearfix'></div>
					
					
					<br><b>Address:</b> 
			
					<?php 
					if( get_user_meta($user->ID, 'MX_user_address', "user_" . $user->ID) ){ 
						echo get_user_meta($user->ID, 'MX_user_address', "user_" . $user->ID); 
					
					}else{
						
						echo "- UNKNOWN -" ;
					}
					
					?> 
					
					
					<br>
					<b>Location: </b>
					<?php 
			
										
								$closet = 0;
								if ( get_user_meta($user->ID, 'MX_user_city', 1 ) && get_user_meta($user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '- UNKNOWN -';
}				
					
					?>
						 
					
					
					<br><b>Phone#:</b> 
			
					<?php 
					if( get_user_meta($user->ID, 'MX_user_phone', "user_" . $user->ID) ){ 
						echo get_user_meta($user->ID, 'MX_user_phone', "user_" . $user->ID); 
					
					}else{
						
						echo "- UNKNOWN -" ;
					}
					
					?> 
					<br><br><center><b><u>Email</u></b> <br>
					<?php 
					if( get_user_meta($user->ID, 'MX_user_email', "user_" . $user->ID) ){ 
						echo get_user_meta($user->ID, 'MX_user_email', "user_" . $user->ID); 
					
					}else{
						
						echo "- UNKNOWN -" ;
					}
					
					?> </center>
					<div class='clearfix'></div>

		
		
	
	</div>
				<div class=' '>

					
				
					
					<?php 
					
		
		
		$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );

		foreach( $social as $site ){ // print_r($site->post_name);				
			?>		
	
			<?php 
			//echo get_field( $lead->post_name  , $lead->ID );
			
			if( get_field( $site->post_name  , $lead->ID ) || get_field( "MX_user_" . $site->post_name , $lead->ID ) ){ 

				$social_count[$index]++;	
				$param_name = "MX_user_" . $site->post_name;
				$param_val = get_field( $site->post_name , $lead->ID );
				//update_post_meta( $lead->ID, $param_name, $param_val  );
				
			?>
				<a target='_blank' href='<?php echo get_field( 'website_link' , $site->ID ); ?><?php echo get_field( "MX_user_" . $site->post_name , $lead->ID ); ?>'><img width='20' src='
<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site->post_name; ?>.png'  class=''>/<?php echo get_field( "MX_user_" . $site->post_name , $lead->ID ); ?>
</a>
<br>

			<?php 		}
			$index++;
			?>	
			<?php 		
		}

		
					
		$index = 0;
		foreach( $social as $site => $link ){				
			?>	

			
			<?php			if( get_field( $site , $lead->ID ) ){ 

				$social_count[$index]++;	
				
				
			?>
			<a target='_blank' href='<?php echo $link; ?><?php echo get_field( $site , $lead->ID ); ?>'>
				<div class="col-xs-12 pad0">
				
					<img width='15' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site; ?>.png' class=''>
					
					/<?php echo get_field( $site , $lead->ID ); ?>

				</div>
				 
				
			</a>
			<?php 		}
			$index++;
			?>	
			<?php 		
		}
	?>
					
				</div>
				
				
			<div class='col-xs-4 well'>
			
				<div class='col-xs-6'>
					Rate (weekly)
				</div>
				<div class='col-xs-6'>
					$
					<?php 
					
						echo get_field( 'room_rate', $lead->ID );
							?>
				</div>
					<div class='clear'><br></div>
				<div class='col-xs-6'>
					Security 
				</div>
				<div class='col-xs-6'>
					$
					<?php 
						echo $security;
						
							?>
				</div>
					<div class='clear'><br></div>
				<div class='col-xs-6'>
					App Fee
				</div>
				<div class='col-xs-6'>
					$
					<?php 
							if( get_field( 'app_fee', $lead->ID ) == 0  ){ 
								echo "Waived!";
							
							}else{
								echo get_field( 'app_fee', $lead->ID );
							}
							?>
				</div>
				
				<div class='clear'><br></div>
				
				
				
					
		<div class='col-xs-6 hidden-print'><hr>
			<u>Member Since</u>:<br> 
			<?php echo mysql2date('M j, Y', $user->user_registered ); ?>
		</div>
		<div class='col-xs-6 hidden-print'><hr>
			<u>Last Logged In</u>: <br> 
			<?php
					$last_login = (int) get_user_meta( $user->ID , 'wp-last-login' , true );
					if ( $last_login ) {
						$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
						$value  = date_i18n( $format, $last_login );
						echo $value;
					}else{
						echo "Never";
					}
			
			?>
		</div>
		
		
			</div>
				

					
				
			</div>

<?php } ?>

		<div id="content" class="" role="main">
		
		
		<?php if($_GET['type'] == 'trips' ){ get_template_part('content-page', 'trips'); } ?>
		
		


<div id='p'>
			
			<?php
			
			//set_post_type( 12533 , 'ssi_contact' );
			
				
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.

			
					
				
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator', 'author');
		if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) { // LOGGED-IN Check

//echo 'CHILD OF Admin';
			if( 1 ){ 

				$clients = get_posts( array( 'post_type' => 'clients' , 'posts_per_page' => -1 ) );
				$friends = get_posts( array( 'post_type' => 'friends' , 'posts_per_page' => -1 ) );
				$family = get_posts( array( 'post_type' => 'family' , 'posts_per_page' => -1 ) );
				$leads = get_posts( array( 'post_type' => 'leads' , 'posts_per_page' => -1 ) );
				
				$tenants = get_posts( array( 'post_type' => 'tenants' , 'posts_per_page' => -1 ) );
			
				$leads = array_merge($clients,$friends,$leads,$family,$tenants);

			}


	
		$tenant_id = get_the_ID();
		
		$person = get_post(get_the_ID());
		
		//print_r( $person );

		
	
	$leads = get_posts( array( 'post_type' => $person->post_type , 'post__in' => array($tenant_id) ) );

	//$leads = get_post( $tenant_id , ARRAY_A );

	//print_r( $leads );
	foreach( $leads as $lead ){


			?>


		<div class='  info'>
		<div class='  info'>
	<?php if( !$has_user ){ ?>		
			<div class='col-sm-8 '>


				
				<?php if($lead->post_title){ 

								echo "<strong>" . $lead->post_title . "</strong>"; 
							
								//array_push( $names, $lead->post_title );

							}else{ echo 'New Request'; } 
				?>
				<div class='col-sm-3 '>
				<?php 
				
					if( get_field( 'facebook' , $lead->ID ) != '' ){
						
						
				?>
						<img src="http://graph.facebook.com/<?php echo get_field( 'facebook' , $lead->ID ); ?>/picture" class="hidden img-responsive">
					<?php 

					}
				
				$report_user_ID = 0;
				if( get_field( 'MX_user_ID', $lead->ID ) ){
					$report_user_ID = get_field( 'MX_user_ID', $lead->ID );
					echo get_avatar( $report_user_ID );
				}
				else
				  if ( has_post_thumbnail($tenant_id) ) {
			
					
 					$thumbnail_id = get_post_thumbnail_id( $tenant_id );
					if( $thumbnail_id == 10286  ){
				?>
						
				<img src='http://shamanshawn.com/wp-content/uploads/2015/11/blank-face.jpe' class='img-responsive'>
				<?php

							
    					 }else{	echo get_the_post_thumbnail( $tenant_id ); }
				  } 
							
					?>
				</div>
				<div class='col-sm-9 '>

					<div class='clearfix'></div>
					
					<br>
					<b>Address: </b>
					<?php 
							if(get_field( 'address', $lead->ID )){
								
								echo get_field( 'address', $lead->ID ) . ", ";
							}
 ?><?php echo get_field( 'MX_user_city', $lead->ID ); ?>
						 <?php echo get_field( 'MX_user_state', $lead->ID ); ?>, 
						 <?php echo get_field( 'zip_code', $lead->ID ); ?>
						 
					
					
					<br><b>Phone#:</b> 
					
					<?php 
					if( get_field( 'MX_user_phone', $lead->ID ) ){ 
						echo get_field( 'MX_user_phone', $lead->ID ); 
					
					}else{
						
						echo " - N/A" ;
					}
					
					?> 
					<br><b>Email:</b> 
					<?php 
					if( get_field( 'MX_user_email', $lead->ID ) ){ 
						echo get_field( 'MX_user_email', $lead->ID ); 
					
					}else{
						
						echo " - N/A" ;
					}
					
					?> 
					<div class='clearfix'></div><br>
					<?php 
					
		
		
		$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );

		foreach( $social as $site ){ // print_r($site->post_name);				
			?>		
	
			<?php 
			//echo get_field( $lead->post_name  , $lead->ID );
			
			if( get_field( $site->post_name  , $lead->ID ) || get_field( "MX_user_" . $site->post_name , $lead->ID ) ){ 

				$social_count[$index]++;	
				$param_name = "MX_user_" . $site->post_name;
				$param_val = get_field( $site->post_name , $lead->ID );
				//update_post_meta( $lead->ID, $param_name, $param_val  );
				
			?>
				<a target='_blank' href='<?php echo get_field( 'website_link' , $site->ID ); ?><?php echo get_field( "MX_user_" . $site->post_name , $lead->ID ); ?>'><img width='20' src='
<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site->post_name; ?>.png'  class=''>/<?php echo get_field( "MX_user_" . $site->post_name , $lead->ID ); ?>
</a>
<br>

			<?php 		}
			$index++;
			?>	
			<?php 		
		}

		
					
		$index = 0;
		foreach( $social as $site => $link ){				
			?>	

			
			<?php			if( get_field( $site , $lead->ID ) ){ 

				$social_count[$index]++;	
				
				
			?>
			<a target='_blank' href='<?php echo $link; ?><?php echo get_field( $site , $lead->ID ); ?>'>
				<div class="col-xs-12 pad0">
				
					<img width='15' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site; ?>.png' class=''>
					
					/<?php echo get_field( $site , $lead->ID ); ?>

				</div>
				 
				
			</a>
			<?php 		}
			$index++;
			?>	
			<?php 		
		}
	?>
					
				</div>
					
				
			</div>
			
	<?php } ?>			
			<div class='col-sm-4  hidden'>
			
				
				
				<?php 
				
				$date_format = get_option( 'date_format' );
				
				//echo get_the_modified_date( $date_format ,$lead->ID); 
				
				?>
				<b>Updated:</b> <?php echo date( $date_format ); ?>
				<div class='clearfix'></div><hr class='hidden-print'>
				
				<div class='col-xs-6'>

					<button id='payments' class='btn btn-default btn-block hidden-print'>Payments</button>
					<button id='taskslist' class='btn btn-default btn-block hidden-print'>Taskslist</button>
					<button id='budget' class='btn btn-default btn-block hidden-print'>Budget</button>
					<button id='notes' class='btn btn-default btn-block hidden-print'>Notes</button>
				</div>
				<div class='col-xs-6'>
					<button id='rental' class='btn btn-default btn-block hidden-print'>Rental Info</button>
					<button id='forms' class='btn btn-default btn-block hidden-print'>Forms</button>
					<button id='wishlist' class='btn btn-default btn-block hidden-print'>Wishlist</button>
					<button id='details<?php echo $lead->ID; ?>' class='btn btn-default btn-block hidden-print'>More</button>
					
				</div>

					<div class='clearfix'></div>

			</div>
		</div>

		<div class='admin'>
			<?php 
				echo "<div id='details" . $lead->ID .  "' class='details' style='display: none;'>";
				?>
				<?php

				if( !get_field( "move-out_date", $lead->ID ) ){ 
					?>
		<form method="post" action="" class='pull-left1'>
			<button name="update" type="submit" class='btn btn-block btn-danger' value="Remove Lead" />Move Out</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="move_out" type="hidden" value="true" />
			<input name="move_out_date" type="hidden" value="<?php echo current_time( 'm/d/y' );  ?>" />
		</form>
					<?php 
				}
				?>
		

		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>

				<?php
					echo "<a target='_blank' href='/wp-admin/post.php?post=" . $lead->ID . "&action=edit' class='btn btn-default pull-left'>Edit Lead</a>";
				
				


			?>
			<br></div><div class='clearfix'></div><hr>
			
		</div>
		
		</div>
		
		<div id='taskslist' style='display: none; '>
		<h4>Tasklist</h4> 
		
			<?php 
	if( get_field( 'ssi_tasklist_ID', get_the_ID() ) ){
		
		//echo "TaskilistID=" . get_field( 'ssi_tasklist_ID', get_the_ID(), 1 );
		$tasklistID = get_field( 'ssi_tasklist_ID', get_the_ID(), 1 );
		
		$person = get_post( $tasklistID );
		//print_r($person->post_name);
		$person = $person->post_name;
		get_template_part('content','tasklist'); 
	}else{
		if( !empty($_GET['person']) ){ $person = $_GET['person']; }
		?>
		
		<div class='clearfix'></div>
<div id='all-tasklists' class='text-center'>			
	<div class='clearfix'></div><hr>
		<h3>All Tasklists</h3>
	<div class='clearfix'></div><hr>
	<div id='all-lists' style='display: none;'>
	<button id='all-lists'>View All</button>	
	<div class='clearfix'></div><hr>			
	</div>
	<div id='all-lists' style='display: block;'>
		
		<?php 
		
		
			foreach( $staff as $lead ){
				
				$person = $lead->post_name;
				
				?>
				<div class='col-md-6'>
				<a href='/tasklist?person=<?php echo $person; ?>' class='btn btn-info btn-block btn-lg' target='_blank'>		
						<?php echo $lead->post_title; ?> >>
				</a><br>
				</div>
				<?php
			}
		?>
		<div class='clearfix'></div><hr>
			<button id='all-lists'>close</button>	
	</div>
</div>
<div class='clearfix'></div>
		<form>
			<div class='col-sm-12' >
					<b>Tasklist ID: </b> 
					
					<input type="text" name="ssi_tasklist_ID" placeholder="Enter ID" value="<?php echo get_field( 'ssi_tasklist_ID', $lead->ID ); ?>">
				</div>
				<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
			<button name="ssi_update_cf" type="submit" class='btn btn-info btn-block' value="Update" />Update</button>
		</form>
		<?php
	}
			
			
			
			?>
			
			<div class='clearfix'></div>
		</div>		
		
		<div class='clearfix'></div>
		
	<?php 
	
		$rate = get_field( 'room_rate', $lead->ID );	
		
		$app_fee = get_field( 'app_fee', $lead->ID );

		$security = get_field( 'security_deposit', $lead->ID ); 
			
			
			$deposit = ($security + $rate + $app_fee);
	?>
		
		<div id='payments' class=' payment report col-md-12' style='display: block;'>
			<h4>Payment Info</h4> 
			<div class=''>
				<?php 
								
				// ####################   Service Log	#########

				$client_profit = 0;

				?>
				<div class='clear'><br><br></div>
				<div class='col-xs-3 col-sm-2'><b>Date</b></div>
				<div class='col-xs-2 col-sm-2 hidden xs'><b>Time</b></div>
				<div class='col-xs-6 col-sm-5'><b>Description</b></div>

				<div class='col-xs-3 col-sm-2 text-center'><b>Rate</b></div>
				<div class='hidden-xs col-sm-1'><b>-</b></div>
				<div class='clearfix'></div>

				<hr>
				
				
				
				

				<?php 

				// check if the repeater field has rows of data
				if( have_rows('service_log' , $lead->ID ) ):

			 	// loop through the rows of data
				    while ( have_rows('service_log', $lead->ID ) ) : the_row();
				
				?>

			       <div class='col-xs-2 col-sm-2 '><?php echo get_sub_field('date'); ?></div>
				<div class='col-xs-2 col-sm-2 hidden-xs'><?php the_sub_field('time'); ?></div>

				<div class='col-xs-6 col-sm-4'><?php the_sub_field('service'); ?></div>
				
				
				<div class='col-xs-3 col-sm-3 text-center'>
				
				
				<?php the_sub_field('income_expense');?> $ <?php the_sub_field('rate'); ?></div>
				<div class='hidden-xs  col-sm-1'>
				
					<button id='trans<?php the_sub_field('trans_id'); ?>'> >> </button>
				</div>
				
				<?php 
					
						
				if( get_sub_field( 'flex_pay' ) == 'Yes' ){ 

				//echo " "; 

				$flex_count++;
				$flex_total += get_sub_field( 'rate' );
				

			}else if( get_sub_field( 'income_expense' ) == '-' ){ 

				//echo "- "; 


				$expense_count++;
				$client_profit -= str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				$total_amount -= str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				$tot_expense += get_field( 'trans_amount', $lead->ID );
				$trans_total = $trans_total - get_field( 'trans_amount', $lead->ID );

			}else{  

				//echo "+ ";  


				$income_count++;
				$client_profit += str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				
				$total_amount += str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				
				$tot_income += get_field( 'trans_amount', $lead->ID );
				$trans_total = $trans_total + get_field( 'trans_amount', $lead->ID );

			}
					
					
					
					?>
				<div class='clearfix'></div>

				
				<div id='trans<?php echo get_sub_field('trans_id'); ?>' class='well' style='display: none;'>
					<div class='clearfix'></div>
					<div class='col-xs-2 col-sm-2'><b>Location</b></div>
					<div class='col-xs-2 col-sm-2'><b>Service</b></div>
					<div class='col-xs-2 col-sm-2'><b>Trans ID</b></div>
					
					<div class='clearfix'></div>
					
					<div class='col-xs-2 col-sm-2'><?php the_sub_field('location'); ?></div>
				
					<div class='col-xs-2 col-sm-2'><?php the_sub_field('service'); ?></div>
				
					<div class='col-xs-2 col-sm-2'><?php the_sub_field('trans_id'); ?></div>
					<div class='clearfix'></div>
				</div>
				<hr>
				

				<?php
				    endwhile;

				else :

				    // no rows found

				endif;

?>
<div id='details<?php echo $lead->ID; ?>' style='display: block;'>
	<button id='add_payment' class='btn btn-info btn-block hidden-print'>Add Payment</button><br>
</div>
	<div id='add_payment' class='' style='display: none;'>
		<form method="post" action="" name="add_transaction">
				<div class='col-xs-6 col-sm-2'><input  type="text" name="trans_date" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" ></div>
				<div class='col-xs-6 col-sm-2'><input type="text" name="trans_time" placeholder="Time" value="<?php echo current_time( 'g:i' ); ?> pm" ></div>
				<br class='visible-xs'>
				<div class='col-sm-2'><input type="text" name="trans_location" placeholder="Location" value="My Place"></div>
				<div class='col-sm-4'><input type="text" name="trans_service" placeholder="Service" Value="Service"></div>
				
				<div class='col-md-1'><input type="text" name="trans_amount" placeholder="Rate"></div>
		<div class='col-md-1'>
			<input type="radio" name="income_expense" value="+">+<br>
			<input type="radio" name="income_expense" value="-">-
		</div>		
				<input type="hidden" name="client_name" value="<?php echo $lead->post_title; ?>">
				<input type="hidden" name="client_city" value="<?php echo get_field( 'MX_user_city', $lead->ID ); ?>">
				<input type="hidden" name="client_phone" value="<?php echo get_field( 'MX_user_phone', $lead->ID ); ?>">
				<input type="hidden" name="client_state" value="<?php echo get_field( 'MX_user_state', $lead->ID ); ?>">
				
				<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
				<input name="client_id" type="hidden" value="<?php echo $lead->ID; ?>" />

				<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
				<input type='hidden' name='insert_transaction' value='true'>
				<input type='hidden' name="update" value='true'>
				<input type="submit" class="pull-right">
			</form>
		</div>



				<div class='clearfix'></div>
			
			<?php 
				// #################### END Service Log	#########


				?>
			</div>
		</div>
		
		
		
		
				<div class='clearfix'></div>
		
			<div id='wishlist' style='display: none; '>
			<h4>Wishlist</h4> 
		
		</div>
		<div class='clearfix'></div>
		<div id='budget' style='display: none; '>
			<h4>Budget</h4> 
			<?php get_template_part('content','budgets');  ?>
		</div>
		
		<div class='clearfix'></div>
		
	

		<div id='rental' class=' rental col-md-12' style='display: block;'>
			
			
			<div class='col-sm-4 col-md-4 hidden1'>
										
<!--  ///////////////////////////////  DATE MAGIC  ///////////////////////////////   -->
	<?php  			
		
			echo "MOVEIN: " . get_field( "move-in_date", $lead->ID );

		if( get_field( "move-out_date", $lead->ID ) ){ echo "<br>MOVEOUT: " . get_field( "move-out_date", $lead->ID ); }
			
			
			$rate = get_field( 'room_rate', $lead->ID );

			//$s_date = mysql2date('n/j/y', $lead->post_date );

			$s_date = date('Y-m-d H:i:s', strtotime(  $lead->post_date  ) );
			
			if( get_field( "move-out_date", $lead->ID ) != "" ){

				$s_date = date('Y-m-d', strtotime(  $lead->post_date  ) );
				$e_date = date("Y-m-d H:i:s", strtotime( get_field( "move-out_date", $lead->ID ) ));

				$e_date = get_field( "move-out_date", $lead->ID );
				$e_date = date('Y-m-d', strtotime(  $e_date ) );

			}else{
				
				$e_date = strtotime( "today" );
				
				$e_date = date('Y-m-d H:i:s',  $e_date );
			}
			//echo "SD==>" . $s_date . "ED==>" . $e_date;

			$date1 = date_create( $s_date );
			$date2 = date_create( $e_date );

			$diff=date_diff($date1,$date2);
	
			$tot_days = $diff->format("%a");
			//echo "TOTAL DAYS--->" . $tot_days;

			$weeks = floor($tot_days/7);

			$days = $tot_days - ($weeks*7);

			$app_fee = get_field( 'app_fee', $lead->ID );

			echo "<br>WEEKS-> " . $weeks . " DAYS-> " . $days;

	
			

	?>

<!--  ///////////////////////////////  #DATE MAGIC  ///////////////////////////////   -->


			<?php 
				//echo "<div class='col-sm-12' ><b>Last Seen: </b> " . date('n/j/y', strtotime( get_field( 'last_seen', $lead->ID ) ) ) . "</div>"; 
				//	echo "<div class='col-sm-12' ><b>Last Contacted: </b> " . date('n/j/y', strtotime( get_field( 'last_contacted', $lead->ID ) ) ) . "</div>"; 
				//	echo "<div class='col-sm-12' ><b>Added: </b> " . mysql2date('n/j/y', $lead->post_date ) . "</div>"; 
			?>
				<div class='clear'><br></div>
			</div>
	
			<div class='col-sm-3 '>
				<b>Payment Summary</b><br>

				<div class='pull-right'>
					<?php 
						
						$due = ((($weeks) * $rate)+($security + $rate + $app_fee));
						echo "DUE--->$" . $due;


						$tot_owed  += $due;

						echo "<br>PAID--->$" . $client_profit;
						$owed = ($due - $client_profit);

					$banked = $loss = 0;
					

					if( $owed < 0 || get_field( "move-out_date", $lead->ID ) ){
						if( $owed < 0 ){ 
							$banked = (-$owed);
							echo "<br>BANKED: $" . $banked;
						 }
						else{ 
							$loss = $owed; 
							echo "<br>LOSS: $" . $loss;

							
						}
						if( get_field( 'security_applied', $lead->ID ) == "yes"  ){ 
								echo "<br>SECURITY APPLIED!!";
								$final = ((-$loss) + $security);
								echo "<br>FINAL: $" . $final;
							}

						$owed = 0; 
					}
						echo "<br><br>Owed: $" . $owed; 
				
						

						$tot_due += $owed;
					?>
				
				</div>
				<div class='clear'><br></div>
			</div>


		</div>
		
		<div id='forms' style='display: none;'>
				<div class='clearfix'></div><br><hr>
			
			<h3 class=''>Forms</h4>
			<br>
			
			
							<?php 

				// check if the repeater field has rows of data
				if( have_rows('ssi_forms_uploader' , $lead->ID ) ):

			 	// loop through the rows of data
				    while ( have_rows('ssi_forms_uploader', $lead->ID ) ) : the_row();
				
				?>

			       <div class='col-xs-2 text-center'>
				   <a href='<?php the_sub_field('ssi_form_upload'); ?>' target='_blank'> <img src='http://shamanshawn.com/wp-includes/images/media/document.png' class=''><br><br>
				   (<?php echo get_sub_field('ssi_form_date'); ?>)
				   <br><?php the_sub_field('ssi_form_title'); ?></a>
				   </div>
						
				
				
				

				<?php
				    endwhile;

				else :

				    // no rows found

				endif;

?>

<div class='clearfix'></div>
				<hr>

					<div class='col-xs-2'>
						<img src='<?php echo get_field( 'file_1', $lead->ID ); ?>' class='img-responsive'>
					</div>
					<div class='col-xs-2'>
						<img src='<?php echo get_field( 'file_2', $lead->ID ); ?>' class='img-responsive'>
					</div>
					<div class='col-xs-2'>
						<img src='<?php echo get_field( 'file_3', $lead->ID ); ?>' class='img-responsive'>
					</div>
					
					
						<div class='clearfix'></div><br>		
	
		</div>
		<div id='notes' class='  summary' style='display: none;'>
			<hr>
			<div class='col-md-6 '>
				<h4>Notes</h4>

				<?php echo "<div class='col-xs-12' > " . $lead->post_content . "</div><br>";		
				?>
			</div>
			
		</div>
	<?php

////////////////////////// TENANT REPORT /////////////////////////	

					if( get_field( "move-out_date", $lead->ID ) != "" ){ 

						
						//array_push( $moved_out, $lead );
						


					 }else{
					
					$tot_count++;

					$public = 1;

					

		if(  get_field( 'public_private_request', $lead->ID ) == 0  ||  is_user_logged_in()  ){ 
					if( $lead->post_status == 'publish' ){
					?>
					
					
				<?php
					
					

					}// #END IF Published
				}else{  echo "Private<hr><br>" ; } 
				


				}	//END ELSE MOVE OUT
				}// END FOR EACH LEADS

////////////////////////// #TENANT REPORT /////////////////////////
				//the_content();
				echo '</div>';
					
		}else{
			
			
			get_template_part('content' , 'member-area');
		} //END LOGGED-IN Check
					
				
					
				endwhile;
			?>
		<br><br><br>
		

	<div class='clearfix'></div>


<?php

	$leads = get_posts( array( 'post_type' => $person->post_type , 'post__in' => array($tenant_id) ) );
	
	foreach( $leads as $lead ){

?>


<div id='details<?php echo $lead->ID; ?>' class='details' style='display: none;'>

					<?php //echo mysql2date('n/j/y', $lead->post_date ); ?><span class=' '><?php if(  get_field( 'public_private_request', $lead->ID ) == 1 ){ echo "PRIVATE"; } ?></span>

				<?php
					
					/*if( $lead["2.3"] ){
					echo "<b>Location: </b> " . $lead["2.3"] . ", " . $lead["2.4"] . " " . $lead["2.5"] . "<br><br>";
					}else	{
					echo "<b>Location:</b> Philadelphia, PA<br>";
					}*/

				?>
				
				
		<form id="update" method='post'>	

					
				<div class='col-sm-3' >
					<b>Name: </b> 
					
					<input type="text" name="post_title" placeholder="<?php echo $lead->post_title; ?>" value="<?php echo $lead->post_title; ?>">
				</div>
				<div class='col-sm-2' >
					<b>Phone: </b> 
					
					<input type="text" name="MX_user_phone" placeholder="Phone"  value="<?php echo get_field( 'MX_user_phone', $lead->ID ); ?>">
				</div>
				<div class='col-sm-3' >
					<b>Email: </b> 
					
					
					<input type="text" name="MX_user_email" placeholder="Email" value="<?php echo get_field( 'MX_user_email', $lead->ID ); ?>">

				</div>
				<div class='col-sm-2' >
					<b>Rate: </b> 
					
					<input type="text" name="MX_user_rate" placeholder="Rate"  value="<?php echo get_field( 'MX_user_rate', $lead->ID ); ?>">
				</div>
				<div class='col-sm-2'>
					<b>Type: </b> 
					<br>
					<?php 
				
					
					
					$categories = get_the_category($lead->ID);
					$att = $categories[0]->name;
					//echo $att;
					
					$options = array( '-', 'Client', 'Lead',  'Friend',  'Follower', 'Family', 'Landscape', 'Other' );

				?>
				<select name="contact_type" >
					
				<?php 
					foreach($options as $option){
						
						?>
						
						<option value="<?php echo $option; ?>" <?php if ($att == $option) echo "selected='selected'"; ?>><?php echo $option; ?></option>
						<?php
					}
				?>
				</select>
		</div>
				
					<div class='clearfix'></div><hr>
					
				<div class='col-sm-12'> 
						<b>Location: </b> <br>
						
						<div class='col-sm-2'> 
								
						
						 <input type="text" name="area_code" placeholder="Area Code" value="<?php echo get_field( 'area_code', $lead->ID ); ?>">
					</div>
					<div class='col-sm-3 hidden1'>
						
						 <input type="text" name="address" placeholder="Address" value="<?php echo get_field( 'address', $lead->ID ); ?>">

					</div>
					
					
					<div class='col-sm-2'>
	
						<input type="text" name="MX_user_city" placeholder="City" Value="<?php echo get_field( 'MX_user_city', $lead->ID ); ?>">

					</div>
					<div class='col-sm-1'>

						<input type="text" name="MX_user_state" placeholder="State" value="<?php echo get_field( 'MX_user_state', $lead->ID ); ?>">

					</div>
					<div class='col-sm-2'>
						 <input type="text" name="zip_code" placeholder="Zip Code" value="<?php echo get_field( 'zip_code', $lead->ID ); ?>">
					</div>
					<div class='col-sm-2'>
						 <input type="text" name="apt_num" placeholder="Apt #" value="<?php echo get_field( 'apt_num', $lead->ID ); ?>">
					</div>
				</div>	
					
					<div class='clearfix'></div><hr>
	
					
	<div class=' col-xs-12'>			
				<div class='info'>
				<u>Details</u><br>
				
				
						
				<div class='col-sm-4' >
					<b>Last Seen: </b> 
					
					<input type="text" name="last_seen" value="<?php echo date('n/j/y', strtotime( get_field( 'last_seen', $lead->ID ) ) ); ?>">
				</div>
				<div class='col-sm-4' >
					<b>Last Contacted: </b> 
					
					<input type="text" name="last_contacted" placeholder="Last Contacted" value="<?php echo date('n/j/y', strtotime( get_field( 'last_contacted', $lead->ID ) ) ); ?>">
				</div>
				<div class='col-sm-4' >
					<b>Added: </b> 
					
					
					<input type="text" name="date_added" placeholder="Date Added" value="<?php echo mysql2date('n/j/y', $lead->post_date ); ?>">
				</div>
				
				
				<div class='col-sm-12' >
					<b>D.O.B: </b> 
					
					<input width="100" type="text" name="MX_user_dob" placeholder="D.O.B" value="<?php echo get_field( 'MX_user_dob', $lead->ID ); ?>">
				</div>
				<div class='col-sm-12' >
					<b>Tasklist ID: </b> 
					
					<input type="text" name="ssi_tasklist_ID" placeholder="Enter ID" value="<?php echo get_field( 'ssi_tasklist_ID', $lead->ID ); ?>">
				</div>
		</div>		
	</div>			
			<div class='clearfix'></div><br><br>
				
				<input type='hidden' name='ID' value='<?php echo $lead->ID; ?>'>
				<input type='hidden' name='edit_profile' value='1'>
				
	<div class=' col-xs-12'>			
			<h3>Basic Stats</h3><hr>	
				<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				 <input type='text' name='MX_user_age' value='<?php echo get_post_meta(  $lead->ID, 'MX_user_age', 1); ?>'>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
			<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_height_ft', 1);
					$options = array( '-', '4', '5',  '6',  '7' );

				?>
				<select name="MX_user_height_ft" >
					
				<?php 
					foreach($options as $option){
						
						?>
						
						
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			
				ft
				
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_height_in', 1);
					$options = array( '-', '1', '2',  '3',  '4', '5',  '6',  '7', '8', '9', '10', '11');

				?>
				<select name="MX_user_height_in" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
				
						 in
				
				
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<input type='text' name='MX_user_weight' value='<?php echo get_post_meta($lead->ID, 'MX_user_weight', 1); ?>'>
			</div>	
				
				
		</div>			
				
			<div class='clearfix'></div><br><br>	
	<div class="col-xs-12">		
					<h3>Full Details</h3><div class='clearfix'></div><hr>
					
	<div class="prof-info col-sm-6">
			
			<div class="col-xs-6">
				<b>Orientation</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_sexual_orientation', 1);
					$options = array( '-', 'Gay', 'Bi', 'Trans', 'DL' );

				?>
				<select name="MX_user_sexual_orientation" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>

		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Ethnicity</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_ethnicity', 1);
					$options = array('-', 'Native American', 'Asian', 'Black', 'Latino', 'Middle Eastern', 'Mixed', 'Pacific Islander', 'White', 'Other' );

				?>
				<select name="MX_user_ethnicity" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Sex</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_sex', 1);
					$options = array('-', 'Guy', 'Girl', 'Trans' );

				?>
				<select name="MX_user_sex" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
				
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Hair Color</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_hair_color', 1);
					$options = array('-', 'Black', 'Blond', 'Red' , 'Gray', 'White', 'Bald', 'Mixed', 'Shaved');

				?>
				<select name="MX_user_hair_color" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Out?</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_out', 1);
					$options = array('-', 'Yes', 'No');

				?>
				<select name="MX_user_out" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>		
				
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Body Hair</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_body_hair', 1);
					$options = array('-', 'Smooth', 'Shaved', 'Buzzed', 'Some Hair', 'Hairy', 'Bear');

				?>
				<select name="MX_user_body_hair" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>	
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Body Type</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_body_type', 1);
					$options = array('-', 'Slim', 'Average', 'Swimmers', 'Athletic', 'Muscular', 'Bodybuilder', 'Large');

				?>
				<select name="MX_body_type" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Eye Color</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_eye_color', 1);
					$options = array('-', 'Brown', 'Green', 'Gray', 'Hazel', 'Blue', 'Other');

				?>
				<select name="MX_eye_color" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
	</div>								
						
				<div class='clearfix'></div>		
				<br>		
						
						
						
						
		<div class="prof-info col-sm-6">
											<h3>Adult Stats</h3>
											<hr>
											
			<div class=' col-xs-6'>
				Position:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_position', 1);
					$options = array( '-', 'Top', 'Vers/Top', 'Vers', 'Vers/Bttm', 'Bottom');

				?>
				<select name="MX_user_position" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
			<div class=' col-xs-6'>
				Endowment:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_endowment', 1);
					$options = array('-',  '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5', '11', '11.5', '12', '12.5', '13+');

				?>
				<select name="MX_user_endowment" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
					 inches
			</div>
											
			<div class=' col-xs-6'>
				Cut / Uncut:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_post_meta($lead->ID, 'MX_user_circumcised', 1);
					$options = array('-',  'Cut', 'Uncut');

				?>
				<select name="MX_user_circumcised" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
												
												
	</div>
											
								<!--					<div class="prof-info col-sm-6">
														<h3>Style</h3>
														<hr>
															 <input type='text' name='MX_user_style' value='<?php echo get_post_meta($lead->ID, 'MX_user_style', 1); ?>'>
														</div>	
								-->
													
																		
																	

		<div class='clearfix'></div><hr>
		

<?php 
		//$index = 0;
		
		
		
		
		foreach( $social as $site ){ // print_r($site->post_name);				
			?>		
	
			<?php 
			//echo get_field( $lead->post_name  , $lead->ID );
			
			if(/* get_field( $site->post_name  , $lead->ID ) || get_field( "MX_user_" . $site->post_name , $lead->ID ) */ 1){ 

				//$social_count[$index]++;	
				$param_name = "MX_user_" . $site->post_name;
				$param_val = get_field( $site->post_name , $lead->ID );
				//update_post_meta( $lead->ID, $param_name, $param_val  );
				
			?>
				<br>
				<a target='_blank' href='<?php echo get_field( 'website_link' , $site->ID ); ?><?php echo get_field( "MX_user_" . $site->post_name , $lead->ID ); ?>'><img width='20' src='
<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site->post_name; ?>.png'  class=''><?php echo get_field( "MX_user_" . $site->post_name , $lead->ID ); ?>
</a>
			<input type='text' name='MX_user_<?php echo $site->post_name; ?>' value='<?php echo get_field( $param_name , $lead->ID ); ?>'>


			<?php 		}
			//$index++;
			?>	
			<?php 		
		}
		
	?>			

			
			
			<div class='col-xs-12' >
			
					<b>Notes: </b> 
					<?php If( !isset($lead->post_content) ){ echo "- No Notes -"; }else{ echo $lead->post_content; } ?>
					<textarea name="post_content" placeholder='More Notes..'></textarea>

					
					</div><br>
			
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
			<button name="ssi_update_cf" type="submit" class='btn btn-info btn-block' value="Update" />Update</button>
			</form>	
				
	<div class=' col-xs-12'>			
			<h3>Service Log:</h3><hr>				
				
				<?php 
					
					
				// ####################   Service Log	#########

				$client_profit = 0;

				?>
				<div class='clear'><br><br></div>
				<div class='col-xs-6 col-sm-2'><b>Date</b></div>
				<div class='col-xs-6 col-sm-2'><b>Time</b></div>
				<div class='col-sm-2'><b>Location</b></div>
				<div class='col-sm-2'><b>Service</b></div>
				<div class='col-sm-2'><b>Trans ID</b></div>
				<div class='col-sm-2'><b>Rate</b></div>
				<div class='clearfix'></div>

				<hr>

				<?php 
			$services = 0; 
				// check if the repeater field has rows of data
				if( have_rows('service_log' , $lead->ID ) ):

			 	// loop through the rows of data
				    while ( have_rows('service_log', $lead->ID ) ) : the_row();
				$services++;
				?>

			    <div class='col-xs-6 col-sm-2'>
				   <?php echo get_sub_field('date'); ?>
				</div>
				<div class='col-xs-6 col-sm-2'><?php the_sub_field('time'); ?></div>
				<div class='visible-xs'><br><br></div>
				<div class='col-sm-2'><?php the_sub_field('location'); ?></div>
				<div class='visible-xs'><br></div>
				<div class='col-sm-2'><?php the_sub_field('service'); ?></div>
				<div class='visible-xs'><br></div>
				<div class='col-sm-2'><?php the_sub_field('trans_id'); ?></div>
				<div class='visible-xs'><br></div>
				<div class='col-sm-2'>$<?php the_sub_field('rate'); ?></div>
				
				<?php 
				
				
				if( get_sub_field( 'flex_pay' ) == 'Yes' ){ 

				echo " "; 

				$flex_count++;
				$flex_total += the_sub_field( 'rate' );
				

			}else if( get_sub_field( 'income_expense' ) == '-' ){ 

				echo "- "; 


				$expense_count++;
				$client_profit -= str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				$total_amount -= str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				$tot_expense += get_field( 'trans_amount', $lead->ID );
				$trans_total = $trans_total - get_field( 'trans_amount', $lead->ID );

			}else{  

				echo "+ ";  


				$income_count++;
				$client_profit += str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				
				$total_amount += str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
				
				$tot_income += get_field( 'trans_amount', $lead->ID );
				$trans_total = $trans_total + get_field( 'trans_amount', $lead->ID );

			}
					

					
					?>
				<div class='clearfix'></div>
				<hr>
				

				<?php
				    endwhile;

				else :

				    // no rows found

				endif;

?>

		<button id='add_payment' class='btn btn-info btn-block'>Add Payment</button><br>

	<div id='add_payment' class='' style='display: none;'>
		<form method="post" action="" name="add_transaction">
				<div class=' col-sm-2'>
						
					<input  type="text" name="trans_date" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" >
					<div class='clearfix'></div>
				</div>
				<div class=' col-sm-2'>
					<input type="text" name="trans_time" placeholder="Time" value="<?php echo current_time( 'g:i' ); ?> pm" >
					<div class='clearfix'></div>
				</div>
				<div class='col-sm-2'>
					<div class='clearfix'></div>
					<input type="text" name="trans_location" placeholder="Location" value="My Place">
					<div class='clearfix'></div>
				</div>
				<div class='col-sm-4'>
					<div class='clearfix'></div>
					<input type="text" name="trans_service" placeholder="Service" Value="Service">
					<div class='clearfix'></div>
				</div>
				
				<div class='col-xs-6 col-sm-1'>
					<div class='clearfix'></div>
					<input type="text" name="trans_amount" placeholder="Rate">
					<div class='clearfix'></div>
				</div>
		<div class='col-xs-6 col-sm-1'>
			<div class='clearfix'></div>
			<input type="radio" name="income_expense" value="+">+<br>
			<input type="radio" name="income_expense" value="-">-
		</div>		
				<input type="hidden" name="client_name" value="<?php echo $lead->post_title; ?>">
				<input type="hidden" name="client_city" value="<?php echo get_field( 'MX_user_city', $lead->ID ); ?>">
				<input type="hidden" name="client_phone" value="<?php echo get_field( 'MX_user_phone', $lead->ID ); ?>">
				<input type="hidden" name="client_state" value="<?php echo get_field( 'MX_user_state', $lead->ID ); ?>">
				
				<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
				<input name="client_id" type="hidden" value="<?php echo $lead->ID; ?>" />

				<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
				<input type='hidden' name='insert_transaction' value='true'>
				<input type='hidden' name="update" value='true'>
				
				<input type="submit" class="pull-right">
				<div class='clearfix'></div>
			</form>
			
			<div class='clearfix'></div>
		</div>
		
			<div class='clearfix'></div>
	</div>
				<div class='clearfix'></div>
				<hr>
			<?php 
				// #################### END Service Log	#########

				?>
				<div class='clearfix'></div>
				<div class='col-xs-6 col-sm-3'>&nbsp;</div>
				
				<div class='col-sm-3'>&nbsp;</div>
				
				<div class='col-sm-3'>&nbsp;</div>
				
				<div class='col-sm-3'><div class='pull-right'><?php echo "Total: $" . $client_profit; ?></div></div>
				<?php 
					
				update_post_meta( $lead->ID ,'client_profit' , $client_profit );
				
				
					echo "<div class='clearfix'></div><br>";
						
			/*		echo "Forms:<br>";
			?>
			
			
		
			
		<?php if( get_field( 'file_1', $lead->ID ) ){ ?>
			<a target="_blank" href="<?php echo get_field( 'file_1', $lead->ID ); ?>">Client Intake (Front) </a><br>
		<?php } ?>
		<?php if( get_field( 'file_2', $lead->ID ) ){ ?>
			<a target="_blank" href="<?php echo get_field( 'file_2', $lead->ID ); ?>">Client Intake (Back)</a><br>
		<?php } ?>

		
			
			<div class='clearfix'></div>
					<div class='col-xs-6'>
					
						
						
						<img src='<?php echo get_field( 'file_1', $lead->ID ); ?>' class='img-responsive'>	
					</div>
					<div class='col-xs-6'>
					
						<img src='<?php echo get_field( 'file_2', $lead->ID ); ?>' class='img-responsive'>
					</div>
					<img src='<?php echo get_field( 'file_3', $lead->ID ); ?>' class='img-responsive'>
			<?php 	
					echo "<div class='clearfix'></div><br>";
					*/
			?>
			
<div class='clearfix'></div>

		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>
		
	

				<?php
					echo "<a target='_blank' href='/wp-admin/post.php?post=" . $lead->ID . "&action=edit' class='btn btn-default pull-left'>Edit Lead</a>";
				

?> 
	<div class='clearfix'></div><hr>
</div>
	<?php } 
	
	?>
	<div class='clearfix'></div><hr>
<?php	
get_footer();
?>