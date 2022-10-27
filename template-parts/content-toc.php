<?php
/**
 *
 *
 */
?>
<section class="container" style="background-color:rgb(182,186,216)">
    <div class="row cover-row">
	    <?php
            $uploads = wp_upload_dir();
            $upload_path =  $uploads['baseurl'];
            /* need to set image in admin dashboard */
	    ?>
<!--	    <div class="col-md-9">-->
<!--		    <div class="text-center">-->
<!--                <img class="" src="--><?php //echo $upload_path ?><!--/2022/06/572x700.jpg">-->

<!--            </div>-->
        <div class="col-8">
            <img style="padding-top:1vw" src="<?php echo get_stylesheet_directory_uri(); ?>/garden.jpeg" alt="" itemprop="">
            <p class="d-flex justify-content-center"><em>[artwork title]</em>,&nbsp;&nbsp; <a href="">[artist name]</a></p>
        </div>

        <div class="col-4">
            <div class="volumeIssueImage">
                Volume 72, Number 1 &middot; Fall 2022
            </div>
        </div>

    </div>
</section>

<section class="container TOCsection">

	<div class="row justify-content-center" style="margin-top:3vw; margin-bottom:3vw">
		<div class="col-md-8 single-space-paragraphs">
            <p style="font-size:1.5rem"><a href="https://shenandoahliterary.org/712/editors-note/">Editor&rsquo;s Note</a><br /><span class="author_name">[Editor Name]</span></p>
		</div>
	</div>

    <div class="row">

        <div class="col-2">
            <div class="genreHeadings sticky-top" style="text-align: left">
                <a href="#fiction">Fiction</a> <br>
                <a style="display: block; transform: scaleX(.75); overflow: hidden; white-space: nowrap" href="#novel-excerpt">Novel Excerpts</a> <br>
                <a href="#nonfiction">Nonfiction</a> <br>
                <a href="#poetry">Poetry</a> <br>
                <a href="#comics">Comics</a>
            </div>
        </div>


        <div class="col-10">

            <a id="fiction"
                <span class="TOCcontent">

                <div class="row justify-content-start">
                    <div class="TOC-column">
                        <h3>Fiction</h3>
                    </div>
                </div>

                <div class="row">
                    <a id="fiction">
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
                    </a>
                </div> <!-- closes row -->
            </span>
            </a>

            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <a id="novel-excerpt">
                <div class="row justify-content-start"> <!-- opens row for novel excerpt -->

                    <div class="TOC-column flex-shrink-1">
                        <h3>Novel Excerpt</h3>
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
                </div> <!-- close row -->
            </a>

        	<span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <a id="nonfiction">
                <div class="row justify-content-start"> <!-- opens row for nonfiction -->

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

                </div> <!-- close row -->
            </a>

        	<span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <a id="poetry">
                <div class="row justify-content-start"> <!-- opens row for poetry -->

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

                </div> <!-- close row -->
            </a>

            <span class="text-center p-section-break">▴&nbsp;▴&nbsp;▴</span>

            <a id="comics">
                <div class="row justify-content-start"> <!-- opens row for comics -->

                    <div class="TOC-column">
                        <h3>Comics</h3>
                    </div>
                </div>
                <div class="row">

                    <?php
                    remove_all_filters('posts_orderby');
                    $poetry_args = array(
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

                    </div> <!-- close row -->
            </a>

        </div> <!-- closes column -->

        <div class="row">
            <div class="col-md-8 offset-md-2 single-space-paragraphs">
                <p><a href="https://shenandoahliterary.org/712/masthead/">Masthead</a></p>
                <p><a href="https://shenandoahliterary.org/712/contributors/">List of Contributors</a></p>
            </div>
        </div>

        </section>

        <!--  Quote section -->
        <section class="container TOC-quote">

            <div class="row justify-content-center">

                <div class="col-md-11">

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

	</div>
</div>
