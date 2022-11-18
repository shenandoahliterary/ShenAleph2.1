<?php
/**
 *
 *
 */
?>

<!--   style="background-color:#303B35" -->

<section class="container">
    <div class="row cover-row d-flex justify-content-center img-container">

       <img style="width: 90vw; height: auto; padding-right: 1.25vw" draggable="false" src="<?php echo get_stylesheet_directory_uri(); ?>/volumeIssueBanner.png" alt="" itemprop="">
        <p class="d-flex justify-content-center" ><em>Guadalicue, 2019</em>, detail.&nbsp; <a href="https://estebanramonperez.com/">Esteban Ramón Pérez</a>. Leather, acrylic, and gold flake, approximately 6.5 x 12 feet.</p>

<!--
        <div class="col-4" style="left-margin: 4vw; z-index: 1">
            <div class="align-self-center volumeIssueText" style="background-color:#303B35">
                Volume 72, Number 1 &middot; Fall 2022
            </div>
        </div>

        <div class="col-8 volumeIssueImage">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/cover1.jpg" alt="" itemprop="">
            <p class="d-flex justify-content-center" ><em>The Mistake Room</em>,&nbsp;&nbsp; <a href="">Esteban Ramón Pérez</a></p>
        </div>
-->

    </div>

    </section>

        <div class="row sticky-top genreNav-bar" style="">

            <div class="col d-flex justify-content-between genreHeadings sticky-top" style="">
                    <a href="#guest">Border Crossing Narratives</a>
                    <a href="#poetry">Poetry</a>
                    <a href="#fiction">Fiction</a>
                    <a href="#novel-excerpt">Novel excerpts</a>
                    <a href="#nonfiction">Nonfiction</a>
                    <a href="#comics">Comics</a>
            </div>
        </div>

<section class="container TOCsection">
    <a id="toc"></a>

    <div class="row">
        <div class="col-12">
            <a id="guest"></a>
            <!-- start of guest fiction -->
            <div class="row">
                <div class="TOC-column text-start" style="padding-top: 3em">
                        <h3>
                            Border Crossing Narratives
                            guest-edited by May-lee Chai
                        </h3>
                    </a>
                </div>
            </div>

            <div class="row">

                <?php
                remove_all_filters('posts_orderby');
                $fiction_args = array(
                    'category_name' => 'guest-fiction',
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
                        'category_name' => 'guest-fiction',
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
            </div>
            <!-- close guest fiction -->

            <a id="poetry"></a>
            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <!-- open poetry -->
            <div class="row"> <!-- opens row for poetry -->

                <div class="TOC-column">
                    <h3>Poetry</h3>
                </div>
            </div>
                <div class="row">

                                <?php
                                remove_all_filters('posts_orderby');
                                $poetry_args = array(
                                    'category_name' => 'poetry',
                                    'order' => 'ASC',
                                    'meta_key' => 'TOC_order',
                                    'orderby' => 'meta_value_num',
                                    'meta_type' => 'NUMERIC',
                                    'nopaging' => 'true',

                                );
                                $poetry_loop = new WP_Query($poetry_args);
                                    $authornames = array();

                                while ($poetry_loop->have_posts()) : $poetry_loop->the_post();
                                    $this_author= get_post_meta($post->ID, 'author_lastname', true);
                                    $this_author_id =get_the_author_meta('ID');
                                    $authornames[$this_author_id] = $this_author;

                                //print statement of title and author just below worked but put each work and author separately
                                ?>

                                <?php
                                        endwhile;

                                //below groups posts by author

                                    foreach ($authornames as $author_id=>$author_lastname) {
                                            $args = array(
                                        'category_name' => 'poetry',
                                        'author' => $author_id,
                                        'orderby' => 'date',
                                        'order' => 'asc',
                                        'nopaging' => 'true'
                                        );
                                ?>
                                <?php
                                        $poetry_loop_single = new WP_Query($args);

                                        $i = 0;
                                        //open paragraph for title(s)/author
                                        echo "<p>";
                                        while ($poetry_loop_single->have_posts()) :
                                            $poetry_loop_single->the_post();
                                        //for each author, print title, title, author
                                ?>

                                <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                                </a><br />

                                <?php
                                        $i++;
                                        endwhile;
                                        //print author outside of the loop
                                ?>
                                        <span class="author_name"><?php the_author(); ?> </span>
                                <?php
                                            wp_reset_postdata();
                                        }
                                ?>

                            </div>
                        <!-- close poetry row -->

            <a id="fiction"></a>
            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <!-- start of fiction -->
            <div class="row">
                    <div class="TOC-column">
                       <h3>Fiction</h3>
                    </div>
                </div>
            <div class="row">
<!--                    <p id="fiction">-->
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
            
                                <a href="$author_note_url/$has_author_note[0]/">Author's Note</a></br>
                                URLLINK;
                            }
                    ?>

                    <span class="author_name"><?php the_author(); ?> </span>
                    <?php
                                wp_reset_postdata();
                        }
                    ?>
                    </a>
                </div>
            <!-- closes fiction row -->

            <a id="novel-excerpt"></a>
            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <!-- start of novel excerpt -->
            <div class="row"> <!-- opens row for novel excerpt -->

                    <div class="TOC-column">
                        <h3>Novel excerpts</h3>
                    </div>
                </div>
            <div class="row">

                    <?php
                    remove_all_filters('posts_orderby');
                    $novel_excerpt_args = array(
                        'category_name' => 'novel-excerpt',
                        'order' => 'ASC',
                        'meta_key' => 'TOC_order',
                        'orderby' => 'meta_value_num',
                        'meta_type' => 'NUMERIC',
                        'nopaging' => 'true',

                    );
                    $novel_excerpt_loop = new WP_Query($novel_excerpt_args);
                        $authornames = array();

                            while ($novel_excerpt_loop->have_posts()) : $novel_excerpt_loop->the_post();
                                $this_author= get_post_meta($post->ID, 'author_lastname', true);
                                $this_author_id =get_the_author_meta('ID');
                                $authornames[$this_author_id] = $this_author;

                    //print statement of title and author just below worked but put each work and author separately
                    ?>

                    <?php
                            endwhile;

                    //below groups posts by author

                        foreach ($authornames as $author_id=>$author_lastname) {
                                $args = array(
                            'category_name' => 'novel-excerpt',
                            'author' => $author_id,
                            'orderby' => 'date',
                            'order' => 'asc',
                            'nopaging' => 'true'
                            );
                    ?>
                    <?php
                            $novel_excerpt_loop_single = new WP_Query($args);

                            $i = 0;
                            //open paragraph for title(s)/author
                            echo "<p>";
                                while ($novel_excerpt_loop_single->have_posts()) : 				$novel_excerpt_loop_single->the_post();
                                //for each author, print title, title, author
                    ?>

                    <a href="<?php the_permalink(); ?>">

                    <?php the_title(); ?>

                    </a><br />

                    <?php
                            $i++;
                            endwhile;
                            //print author outside of the loop
                    ?>
                            <span class="author_name"><?php the_author(); ?> </span>
                    <?php
                                wp_reset_postdata();
                            }
                    ?>
                </div>
            <!-- close novel excerpt row -->

            <a id="nonfiction"></a>
        	<span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <!-- opens row for nonfiction -->
            <div class="row">
                <div class="TOC-column">
                    <h3>Nonfiction</h3>
                </div>
            </div>
            <div class="row">

                    <?php
                    remove_all_filters('posts_orderby');
                    $nonfiction_args = array(
                        'category_name' => 'nonfiction',
                        'order' => 'ASC',
                        'meta_key' => 'TOC_order',
                        'orderby' => 'meta_value_num',
                        'meta_type' => 'NUMERIC',
                        'nopaging' => 'true',

                    );
                    $nonfiction_loop = new WP_Query($nonfiction_args);
                        $authornames = array();

                            while ($nonfiction_loop->have_posts()) : $nonfiction_loop->the_post();
                                $this_author= get_post_meta($post->ID, 'author_lastname', true);
                                $this_author_id =get_the_author_meta('ID');
                                $authornames[$this_author_id] = $this_author;

                    //print statement of title and author just below worked but put each work and author separately
                    ?>

                    <?php
                            endwhile;

                    //below groups posts by author

                        foreach ($authornames as $author_id=>$author_lastname) {
                                $args = array(
                            'category_name' => 'nonfiction',
                            'author' => $author_id,
                            'orderby' => 'date',
                            'order' => 'asc',
                            'nopaging' => 'true'
                            );
                    ?>
                    <?php
                            $nonfiction_loop_single = new WP_Query($args);

                            $i = 0;
                            //open paragraph for title(s)/author
                            echo "<p>";
                                while ($nonfiction_loop_single->have_posts()) :
                                    $nonfiction_loop_single->the_post();
                                //for each author, print title, title, author
                    ?>

                    <a href="<?php the_permalink(); ?>">

                    <?php the_title(); ?>

                    </a><br />

                    <?php
                            $i++;
                            endwhile;
                            //print author outside of the loop
                    ?>
                            <span class="author_name"><?php the_author(); ?> </span>
                    <?php
                            wp_reset_postdata();
                        }
                    ?>


            </div>
            <!-- close row for nonfiction -->

            <a id="comics"></a>
            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <!-- opens row for comics -->
            <div class="row"> <!-- opens row for comics -->

                <div class="TOC-column">
                    <h3>Comics</h3>
                </div>
            </div>
            <div class="row">

                <?php
                remove_all_filters('posts_orderby');
                $comics_args = array(
                    'category_name' => 'comics',
                    'order' => 'ASC',
                    'meta_key' => 'TOC_order',
                    'orderby' => 'meta_value_num',
                    'meta_type' => 'NUMERIC',
                    'nopaging' => 'true',

                );
                $comics_loop = new WP_Query($comics_args);
                $authornames = array();

                while ($comics_loop->have_posts()) : $comics_loop->the_post();
                    $this_author= get_post_meta($post->ID, 'author_lastname', true);
                    $this_author_id =get_the_author_meta('ID');
                    $authornames[$this_author_id] = $this_author;

                    //print statement of title and author just below worked but put each work and author separately
                    ?>

                <?php
                endwhile;

                //below groups posts by author

                foreach ($authornames as $author_id=>$author_lastname) {
                    $args = array(
                        'category_name' => 'comics',
                        'author' => $author_id,
                        'orderby' => 'date',
                        'order' => 'asc',
                        'nopaging' => 'true'
                    );
                    ?>
                    <?php
                    $comics_loop_single = new WP_Query($args);

                    $i = 0;
                    //open paragraph for title(s)/author
                    echo "<p>";
                    while ($comics_loop_single->have_posts()) :
                        $comics_loop_single->the_post();
                        //for each author, print title, title, author
                        ?>

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a><br />

                        <?php
                        $i++;
                    endwhile;
                    //print author outside of the loop
                    ?>
                    <span class="author_name"><?php the_author(); ?> </span>

                    <?php
                    wp_reset_postdata();
                }
                ?>

            </div>
            <!-- close comics row -->

            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

        </div> <!-- closes column -->

</section>

	<div class="row closingCredits d-flex justify-content-center">
	<!--
            <p class="TOC-subheadings"><a href="https://shenandoahliterary.org/721/editors-note/">Editor&rsquo;s Note</a><br /><span class="author_name">Beth Staples</span></p>
    -->
            <p class="TOC-subheadings"><a href="https://shenandoahliterary.org/721/masthead/">Masthead</a></p>
            <p class="TOC-subheadings"><a href="https://shenandoahliterary.org/721/contributors/">List of Contributors</a></p>
    </div>

        <!--  Quote section -->
        <section class="container TOC-quote">

            <div class="row d-flex justify-content-center">

                <div class="col-md-8">

                    <?php
                        $args = array(
                            'meta_key'			=> 'add-quote-to-toc',
                            'meta_value'		=> 'Yes',
                            'compare'			=> 'Like',
                            'post_type'			=> 'page',
                            'post_status'		=> 'publish',
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

                </div> <!-- ends column -->

            </div> <!-- ends column -->

        </div> <!-- ends row -->

	</section>

	<!--  Features section -->
    <section class="container-fluid TOC-features">
		<div class="card-group">
			<?php
			$args = array(
			  //  'category_name'         => 'feature',
				'category_name'         => 'On Craft,Conversations,Playlist',

			);
			$category_posts = new WP_Query($args);

			if ($category_posts->have_posts()) :
					 while($category_posts->have_posts()) :
							$category_posts->the_post();
			?>
			<div class="card"><a href="<?php echo get_permalink(); ?>">
		   <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
			 <?php  the_post_thumbnail( 'full', array( 'class'=>'card-img img-fluid' ) );  ?>
		    <div class="card-body">
					<h5 class="card-title"><?php
					$categories = get_the_category();

					if ( ! empty( $categories ) ) {
					    echo esc_html( $categories[0]->name );
					}


					 	 ?></h5>
				<p class="card-text"><?php	the_excerpt() ?></p>
			</div>
		</a>
		</div>

			<?php
					 endwhile;
				else:
			?>

					 Oops, there are no features.

			<?php
				endif;
				wp_reset_postdata();
			?>

</section>
	</div>
</div>
