<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <p class="block-post-meta">By <?php the_author(); ?> on <?php the_date(); ?></p>
        
        <?php the_content(); ?>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>