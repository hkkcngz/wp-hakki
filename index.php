<?php get_header(); ?>

<section class="posts">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('loop-post'); ?>>
      <a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <div class="postImg">
        <?php $id = get_the_ID();
        if ( has_post_thumbnail() ) { ?>
          <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="">
        <?php } else { ?>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="50" fill="currentColor">
            <path d="M288 44v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16zM0 172v40c0 8.837 7.163 16 16 16h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16zm16 312h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm256-200H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16z"></path>
          </svg>
        <?php } ?>
        </div>
        <h2 itemprop="headline"><?php the_title(); ?></h2>
        <span itemprop="description">
          <?php the_excerpt(); ?>
        </span>
      </a>
    </article> <!-- end article -->
  <?php endwhile; endif; ?>

</section>
<div class="navigation">
      <?php posts_nav_link('<span style="color: grey; font-style: bold">∞</span> ','Zamanda İleri Git »»','«« Zamanda Geri Git'); ?>
    </div>

<?php get_footer(); ?>