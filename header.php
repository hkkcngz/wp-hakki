<?php
  // variables
  $theme = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary Meta Tags -->
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
  <meta name="description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>">
  <meta name=" theme-color" content="#315589">


  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://hakki.app/">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="https://hakki.app/assets/.png">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://hakki.app/">
  <meta property="twitter:title" content="">
  <meta property="twitter:description" content="">
  <meta property="twitter:image" content="https://hakki.app/assets/.png">

  <!-- Styles -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif|Crimson+Text|Source+Sans+Pro|Lato">
  <link rel="stylesheet" href="<?=$theme?>/assets/css/main.css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <?php wp_head(); ?>
</head>

<body class="slim-scroll">


  <div class="screen">

    <div class="burger">
      <div class="x"></div>
      <div class="y"></div>
      <div class="z"></div>
    </div>

    <div class="landing">

      <div class="yakinda">
        <civi id="civi"></civi>
        <ip></ip>
        <svg class="icon icon-bird">
          <use xlink:href="#icon-bird" />
        </svg>
        <ul class="tabloresim">
          <li>
            <input type="radio" id="slide1" name="tabloresim" checked>
            <label for="slide1"></label>
            <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/872485/coldchase.jpg" alt="Panel 1">
          </li>
          <li>
            <input type="radio" id="slide2" name="tabloresim">
            <label for="slide2"></label>
            <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/980517/icehut_sm.jpg" alt="Panel 2">
          </li>
          <li>
            <input type="radio" id="slide3" name="tabloresim">
            <label for="slide3"></label>
            <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/943660/hq_sm.jpg" alt="Panel 3">
          </li>
          <li>
            <input type="radio" id="slide4" name="tabloresim">
            <label for="slide4"></label>
            <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/599584/home.jpg" alt="Panel 4">
          </li>
        </ul>
        <kutu> <span class="trn">Welcome!</span> </kutu>
      </div>

      <div class="work-desk boxed">
        <div class="boy">
          <div class="head">
            <div class="eyes"></div>
            <div class="headphones"></div>
          </div>
          <div class="body"></div>
        </div>
        <div class="laptop"></div>

        <div class="table"></div>
        <div class="mouse"></div>
        <div class="notes"></div>
        <div class="lamp">
          <div class="top"></div>
        </div>

      </div>

    </div>

    <div class="boxed">

      <div class="main-page">

        <div class="main-page-content">