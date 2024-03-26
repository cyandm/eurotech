<?php get_header() ?>

<main class="default-page">
    <main class="container">
        <h1>
            <?= get_the_title($post_id) ?>
        </h1>
        <p>
            <?php the_content() ?>
        </p>

    </main>
</main>

<?php get_footer() ?>