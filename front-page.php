<? get_header(); ?>

<section class="main-slider">
  <div class="gallery js-flickity" data-flickity-options='{ "autoPlay": "true", "draggable": false }'>
   <?php dynamic_sidebar('home_slider_widget'); ?>
  </div>
</section>

<section class="news">
  <div class="container">
    <div class="section-header-box">
      <div class="small">
        <h3 class="section-header">
          Последние новости
        </h3>
      </div>
      <div class="small">
        <a href="<?php echo site_url('/news');?>">Все новости</a>
      </div>
    </div>

    <div class="news-wrapper">
      <div class="article-box">
        <ul class="articles">
          <?php 
            $homepagePosts = new WP_Query([
              'posts_per_page' => 4
            ]); 

            while($homepagePosts->have_posts()) { 
            $homepagePosts->the_post(); ?>
          <li class="single-article">
            <?php
              if (has_post_thumbnail() ) { ?>
                <div class="article-img-wrapper">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium_large'); ?>
                  </a>
                </div>
              <?php } else {?>
                <div class="article-img-wrapper">
                  <a href="<?php the_permalink(); ?>">
                    <img src="/wp-content/themes/1school-theme/img/no-img.png">
                  </a>
                </div>
              <?php }
            ?>
            <div class="article-body">
              <div class="article-header">
                <div class="single-post-header">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php echo wp_trim_words( get_the_title(), 6 ); ?></a>
                </div>
              </div>
              <div class="article-info">
                <div class="single-post-info">
                  <div class="single-post-date"><i class="fas fa-calendar-alt"></i>
                    <p>
                      <?php the_time('j F Y'); ?>
                    </p>
                  </div>
                  <div class="single-post-category"><i class="fas fa-tags"></i>
                    <p>
                      <?php echo get_the_category_list(', '); ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="preview">
                <?php the_excerpt(); ?>
              </div>
              <div class="single-post-button">
                  <a href="<?php the_permalink(); ?>">Подробнее <i class="fas fa-angle-right"></i></a>
              </div>
            </div>
          </li>
          <?php } wp_reset_postdata();
            ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="director">
  <div class="container">
    <div class="director-box">
      <div class="photo">
        <div class="photo-wrapper">
          <img src="<?php echo get_theme_file_uri('/img/director-boxed.png');?>">
        </div>
      </div>
      <div class="body-director">
        <h2>Петряев Александр Владимирович</h2>
        <h3>Директор</h3>
        <p>
          Хорошая школа та, которая дает детям хорошие знания.
          В такой школе должны быть профессиональные учителя,
          чья основная задача - научить ребенка трудиться и получать удовольствие от процесса обучения.
          В ней должны быть хорошие традиции, доброжелательная атмосфера.
          Если детям комфортно и интересно в школе – значит, выбор сделан правильно.
        </p>
      </div>
    </div>
  </div>
</section>


<section class="recommended-resources">
  <div class="container">
    <h3 class="section-header">
      Полезные ресурсы
    </h3>

    <div class="carousel js-flickity" data-flickity-options='{ "cellAlign": "center", "contain": "true", "pageDots": false, "autoPlay": "1500"  }'>
      <div class="carousel-cell">
        <a href="http://минобрнауки.рф/ " target="_blank"><img src="<?php echo get_theme_file_uri('/img/minobo.png');?>"></a>
      </div>
      <div class="carousel-cell">
        <a href="http://xn--d1aimgh.xn--p1ai/" target="_blank"><img src="<?php echo get_theme_file_uri('/img/shapka-sayta-DOIMP.RF.png');?>"
            alt=""></a>
      </div>
      <div class="carousel-cell">
        <a href="http://www.doinhmao.ru/" target="_blank"><img src="<?php echo get_theme_file_uri('/img/doinp.jpg');?>"
            alt=""></a>
      </div>
      <div class="carousel-cell">
        <a href="https://myopenugra.ru/" target="_blank"><img src="<?php echo get_theme_file_uri('/img/logo2018.png');?>"
            alt=""></a>
      </div>
      <div class="carousel-cell">
        <a href="http://fcior.edu.ru/" target="_blank"><img src="<?php echo get_theme_file_uri('/img/fcior.png');?>"
            alt=""></a>
      </div>
      <div class="carousel-cell">
        <a href="http://school-collection.edu.ru/" target="_blank"><img src="<?php echo get_theme_file_uri('/img/school-collection.svg');?>"
            alt=""></a>
      </div>
      <div class="carousel-cell">
        <a href="http://xn--c1abd6aq0eeq.xn--p1ai/" target="_blank"><img src="<?php echo get_theme_file_uri('/img/yugra-day.png');?>"
            alt=""></a>
      </div>
    </div>

  </div>
</section>

<? get_footer(); ?>