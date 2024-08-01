
<?php get_header(); ?>

<div class="p-archive-work">
    <?php
    $args = array(
        'post_type' => 'work',
        'posts_per_page' => -1,
    );
    $work_query = new WP_Query($args);

    if ($work_query->have_posts()) :
        while ($work_query->have_posts()) : $work_query->the_post();
            $title = get_the_title();
            $permalink = get_permalink();
            $image_id = get_field('work-img');
            $thumbnail = wp_get_attachment_image_url($image_id, 'full');
            $genres = get_the_terms(get_the_ID(), 'genre');
            ?>
            <div class="work-card">
                <a href="<?php echo esc_url($permalink); ?>">
                    <?php if ($thumbnail): ?>
                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>">
                    <?php endif; ?>
                    <h2><?php echo esc_html($title); ?></h2>
                </a>
                <div class="work-genres">
                    <?php if ($genres && !is_wp_error($genres)): ?>
                        <?php foreach ($genres as $genre): ?>
                            <span class="genre"><?php echo esc_html($genre->name); ?></span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else:
        echo '<p>No works found.</p>';
    endif;
    ?>
</div>


<?php get_footer(); ?>