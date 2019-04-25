<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <?php wp_head(); ?>
</head>

<div class="topbar-menu-overlay">
  <div class="container">
    <div class="close-btn-wrapper">
      <button id="closeSide" class="close-btn">
        <i class="fa fa-window-close close-i"></i>
      </button>
    </div>
    <ul>
      <li>
        <a href="#">Интернет приемная</a>
      </li>
      <li>
        <a href="https://www.youtube.com/channel/UCHVUUkl0Y9-penyUwLptAug/videos" target="_blank"><i class="fab fa-youtube"></i>Канал YouTube</a>
      </li>
      <li>
        <a href="https://vk.com/gorono_meg" target="_blank"><i class="fab fa-vk"></i>Мы
          в Вконтакте</a>
      </li>
    </ul>
  </div>
</div>

<body <?php body_class(); ?>>
  <div id="sideNavOverlay"></div>
  <header class="site-header">
    <div class="topbar">
      <div class="container">
        <div class="topbar-buttons">
          <ul class="topbar-buttons-box">
            <li class="single-button priemnaya">
              <a href="#">Интернет приемная</a>
            </li>
            <li class="single-button">
              <?php echo do_shortcode('[bvi text="Версия для слабовидящих"]'); ?>
            </li>
          </ul>
        </div>

        <div class="social-media-wrapper">
          <div class="topbar-menu">
            <a class="topbar-dropdown-btn" href="#"><i class="fas fa-angle-down"></i></a>
          </div>
          <div class="social-media">
            <a href="https://www.youtube.com/channel/UCHVUUkl0Y9-penyUwLptAug/videos" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
            <a href="https://vk.com/gorono_meg" target="_blank">
              <i class="fab fa-vk"></i>
            </a>
          </div>
        </div>

      </div>
    </div>

    <!--  -->

    <div class="main-header-wrapper">
      <div class="container">
        <div class="main-header">

          <div class="logo">
            <a href="<?php echo site_url();?>">
              <span class="logo-name">МБОУ СОШ №1</span><br>
              <span class="logo-city">г. Мегион</span>
            </a>
          </div>

          <div class="info">
            <div class="info-widget">
              <i class="fas fa-phone"></i>
              <h4>Приемная<span>(34643) 3-13-96</span></h4>
            </div>
            <div class="info-widget">
              <i class="fas fa-envelope"></i>
              <h4>E-mail<span>school1megion@mail.ru</span></h4>
            </div>
            <div class="info-widget">
              <i class="fas fa-map-marker-alt"></i>
              <h4>Адрес<span>628685, г.Мегион, ул. Свободы 6</span></h4>
            </div>
          </div>
        </div>



      </div>




      <div class="main-menu">
        <div class="container">
          <nav>
            <?php
            wp_nav_menu([
              'theme_location' => 'headerMenuLocation'
            ]); 
          ?>

            <div class="search-box">
              <a href="<?php echo esc_url(site_url('/search'));?>">
                <i class="fas fa-search"></i>
              </a>
            </div>

          </nav>
        </div>
      </div>

      <div class="mobile-header-wrapper">
        <div class="container">
          <div class="mobile-header">
            <div class="logo">
              <a href="<?php echo site_url();?>">
                <span class="logo-name">МБОУ СОШ №1</span><br>
                <span class="logo-city">г. Мегион</span>
              </a>
            </div>

            <div class="menu-buttons">
              <ul>
                <li>
                  <button id="openSide"><i class="fas fa-bars"></i></button>
                </li>

                <li>
                  <div class="search-box">
                    <a href="<?php echo esc_url(site_url('/search'));?>">
                      <i class="fas fa-search"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="mobile-menu">
            <nav id="sideNav">

              <div class="close-btn-wrapper">
                <button id="closeSide" class="close-btn">
                  <i class="fa fa-window-close close-i"></i>
                </button>
              </div>

              <div class="mobile-menu-content-wrapper">
                <?php 
                wp_nav_menu([
                  'theme_location' => 'headerMenuLocation'
                ]);
              ?>
              </div>

            </nav>

          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="main-body-content">