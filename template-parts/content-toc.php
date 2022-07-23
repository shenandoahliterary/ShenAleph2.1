<?php
/**
 *
 *
 */
?>
<section class="container">
<div class="row cover-row">
	<?php
$uploads = wp_upload_dir();
$upload_path =  $uploads['baseurl'];
/* need to set image in admin dashboard */
	?>
	<div class="col-md-12">
		<div class="text-center">
<img class="" src="<?php echo $upload_path ?>/2022/06/572x700.jpg">
		</div>
<p class="d-flex justify-content-center"><em>[artwork title]</em>,&nbsp;&nbsp; <a href="">[artist name]</a></p>
	</div>
</div>


</section>

<section class="container TOCsection">

	<div class="row justify-content-center">
		<div class="col-md-8 single-space-paragraphs">
			<p><a href="https://shenandoahliterary.org/712/editors-note/">Editor&rsquo;s Note</a><br /><span class="author_name">[Editor Name]</span></p>
		</div>
	</div> 

	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<div class="row">
		<div class="col-5 TOC-column-1" style="background-color:lightblue">
			<h3 style="font-size: 4.3vw">Fiction</h3>
		</div>
		
		<div class="col-md-5" style="background-color:lightpink">

			<?php
				remove_all_filters('posts_orderby');
				$fiction_args = array(
					'category_name' => 'fiction',
					'order' => 'ASC',
					'meta_key' => 'TOC_order',
					'orderby' => 'meta_value_num',
					'meta_type' => 'NUMERIC',
					'nopaging' => 'true',
				);
				$fiction_loop = new WP_Query($fiction_args);
				$authornames = array();

				while ($fiction_loop->have_posts()) : $fiction_loop->the_post();
					$this_author= get_post_meta($post->ID, 'author_lastname', true);
					$this_author_id =get_the_author_meta('ID');
					$authornames[$this_author_id] = $this_author;

				//print statement of title and author just below worked but put each work and author separately

				endwhile;

				//group posts by author

				foreach ($authornames as $author_id=>$author_lastname) {
					$args = array(
						'category_name' => 'fiction',
						'author' => $author_id,
						'orderby' => 'date',
						'order' => 'asc',
						'nopaging' => 'true'
					);
		
					//start WP loop
					$fiction_loop_single = new WP_Query($args);

					$i = 0;

					//open paragraph for title(s)/author
					echo "<p>";
					while ($fiction_loop_single->have_posts()) : 				
						$fiction_loop_single->the_post();
						//for each author, print title,  author
			
			?>

					<a href="<?php the_permalink(); ?>">

			<?php the_title(); ?>
					
					</a><br/>

			<?php
					//check for author's note

					$custom_fields = get_post_custom();
					$has_author_note = $custom_fields['has_author_note'];

					$i++;
						
					endwhile;
					$custom_fields_test = get_post_custom();
					$has_author_note_test = $custom_fields_test['has_author_note'];

					if (! empty($has_author_note)) {
						$author_note_url = site_url();

						//echo "test: $has_author_note_test[0]";
						echo <<<URLLINK

						<a href="$author_note_url/$has_author_note[0]/">Author's Note</a><br />
						URLLINK;
					}
			?>

					<span class="author_name"><?php the_author(); ?> </span>
					
			<?php
						wp_reset_postdata();
				}
			?>

		</div> <!-- ends 2nd column -->


	</div> <!-- closes row -->

	<div class="row">
		<div class="col-md-8 offset-md-2 single-space-paragraphs">
			<p><a href="https://shenandoahliterary.org/712/masthead/">Masthead</a></p>
			<p><a href="https://shenandoahliterary.org/712/contributors/">List of Contributors</a></p>
		</div>
	</div>

</section>

<!--  Quote section -->
<section class="container TOC-quote">
<div class="row">
	<div class="col-md-11 offset-md-1 h-100">
<?php

$args = array(
    'meta_key'         => 'add-quote-to-toc',
		'meta_value'   => 'Yes',
		'compare' => 'Like',
		'post_type'        => 'page',
    'post_status'      => 'publish',

);
$query = new WP_Query($args);

if ($query->have_posts()) :
		 while($query->have_posts()) :
				$query->the_post();
?>

				<?php the_content() ?>

<?php
		 endwhile;
	else:
		
?>

		 Oops, there is no quote. 

<?php

	endif;
	wp_reset_postdata();

?>
		</div>
	</div>
</section>
<!--  Features section -->

</div>
</div>
