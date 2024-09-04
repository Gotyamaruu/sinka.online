<?php get_header(); ?>
<main>
    <section class="p-404">
        <h1 class="p-404__title">404 Not Found</h1>
        <p class="p-404__message">お探しのページが見つかりませんでした</p>
        <p class="p-404__description">申し訳ありませんが、お探しのページが存在しないか、アクセスできません。<br>入力されたURLが正しいかご確認ください。</p>
        <div class="p-404__button-container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="p-404__button">
                Topへ戻る
            </a>
        </div>
    </section>
</main>
<?php get_footer(); ?>
