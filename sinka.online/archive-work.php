<?php get_header(); ?>

<main>
    <section class="p-archive-work js-visible">
        <div class="p-archive-work__inner">
            <div>
                <div class="p-archive__title">
                    <h1 class="c-section-title">実績一覧</h1>
                </div>
                <div class="p-archive-work__wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'work',
                        'posts_per_page' => -1,
                    );
                    $work_query = new WP_Query($args);
                    if ($work_query->have_posts()) :
                        $position = 1;
                        while ($work_query->have_posts()) : $work_query->the_post();
                            $title = get_the_title();
                            $permalink = get_permalink();
                            $image_id = get_field('work-img');
                            $thumbnail = wp_get_attachment_image_url($image_id, 'full');
                            $site_link = get_field('splide-url');
                    ?>
                            <div class="p-archive-work__card">
                                <meta content="<?php echo $position; ?>" />
                                <a class="p-archive-work__link" href="<?php echo esc_url($permalink); ?>">
                                    <?php if ($thumbnail): ?>
                                        <div class="p-archive-work__img">
                                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>" width="420" height="240" >
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <h2 class="p-archive-work__title"><?php echo esc_html($title); ?></h2>
                                <div class="p-archive-work__site">
                                    <?php if ($site_link) : ?>
                                        <a href="<?php echo esc_url($site_link); ?>" target="_blank">サイトを見る</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php
                            $position++;
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<p class="p-archive-work__not">No works found.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>