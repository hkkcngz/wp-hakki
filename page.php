<?php 
  // variables
  $theme = get_template_directory_uri();
get_header(); ?>

<section>
  <div class="tagcloud center">
    <span>Breadcrumbs:</span>
    <a href="<?php bloginfo('url'); ?>">Anasayfa</a> >
    <a href="#"><?php the_title(); ?></a>
  </div>
</section>

<section class="np">

  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="single-post-header">
          <div class="feature-image"
            style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else { bloginfo('template_directory');echo '/assets/img/default-image.png';  } ?>')">
          </div>
          <div class="feature-content">
            <span class="category">
            <a href="<?php bloginfo('url'); ?>">Anasayfa</a>
            </span>
            <h1><?php the_title(); ?></h1>
            <span class="desc"><?php the_excerpt(); ?></span>
          </div>
        </div>

        <div class="single-post-details">

<div class="post-details-alt">
  <img src="<?=$theme?>/images/me.jpg" alt="Me">
  <div>
    <span class="author-name">Hakkı Cengiz</span>
    <span class="readtime">☙ 1 dk okuma süresi</span> <br>
    <span class="date">☙ 12 Nisan 2021</span> <span class="okunma">☙ 110 okunma</span>
  </div>
</div>

<div class="nav">
  <div class="text-options">
    <i class="zmdi zmdi-font trigger"></i>
    <div class="dropdown">
      <ul>
        <li>
          <ul class="font">
            <li>
              <div class="font-wrapper pt-serif">
                Aa
              </div>
            </li>
            <li>
              <div class="font-wrapper crimson-text">
                Aa
              </div>
            </li>
            <li>
              <div class="font-wrapper source-sans-pro">
                Aa
              </div>
            </li>
            <li>
              <div class="font-wrapper lato">
                Aa
              </div>
            </li>
          </ul>
          <hr>
          <ul class="font-size">
            <li>
              <div class="size-wrapper">
                <i class="zmdi zmdi-format-size size-big"></i>
              </div>
            </li>
            <li>
              <div class="size-wrapper">
                <i class="zmdi zmdi-format-size size-medium"></i>
              </div>
            </li>
            <li>
              <div class="size-wrapper">
                <i class="zmdi zmdi-format-size size-small"></i>
              </div>
            </li>
            <li>
              <div class="size-wrapper">
                <i class="zmdi zmdi-format-size size-smaller"></i>
              </div>
            </li>
          </ul>
          <hr>
          <ul class="margin-size">
            <li>
              <div class="margin-wrapper">
                <i class="zmdi zmdi-format-align-justify margin-smaller"></i>
              </div>
            </li>
            <li>
              <div class="margin-wrapper">
                <i class="zmdi zmdi-format-align-justify margin-small"></i>
              </div>
            </li>
            <li>
              <div class="margin-wrapper">
                <i class="zmdi zmdi-format-align-justify margin-medium"></i>
              </div>
            </li>
            <li>
              <div class="margin-wrapper">
                <i class="zmdi zmdi-format-align-justify margin-big"></i>
              </div>
            </li>
          </ul>
          <hr>
          <ul class="font-color">
            <li>
              <div class="circle-wrapper">
                <div class="circle white"></div>
              </div>
            </li>
            <li>
              <div class="circle-wrapper">
                <div class="circle dark"></div>
              </div>
            </li>
            <li>
              <div class="circle-wrapper">
                <div class="circle sepia"></div>
              </div>
            </li>
            <li>
              <div class="circle-wrapper">
                <div class="circle blue"></div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="margin margin-small"></div>
    <div class="margin margin-medium"></div>
    <div class="margin margin-big"></div>
  </div>
</div>

</div>

<div class="single-content p">
    <?php the_content(); ?>

    <div class="single-post-info tagcloud">
          
          <?php if(function_exists('the_views')) { 
            echo '<span>Okunma:</span><a href="#">';
            the_views(); 
            echo '</a>';
          } ?><br>
          <span>Paylaş:</span>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-whatsapp"></i></a>
          <a href="#"><i class="fa fa-print"></i></a>
        </div>
</div>


    </article> <!-- end article -->
  <?php endwhile; ?>
</section>

  <?php 
    // Yorumlar açıksa ya da bi yorum varsa.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
  ?>

<?php get_footer(); ?>