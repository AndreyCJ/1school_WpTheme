<?php get_header(); ?>

<?php $theParent = wp_get_post_parent_id(get_the_ID()); ?>

<section class="blog-title">
  <div class="blog-title-wrapper ">
    <div class="blog-title-overlay"></div>
    <div class="container">



      <div class="blog-title-content">
        <div class="single-blog-title">
          <div class="article-title">
            <h1>
              Результаты поиска: "<?php echo esc_html(get_search_query());?>"
            </h1>
            <form method="get" action="<?php echo esc_url(site_url('/'));?>" class="searchForm">
              <input placeholder="Что вы хотите найти?" type="search" class="searchFormInput" name="s" id="s">
              <input type="submit"class="searchFormSubmit" value="Поиск">
            </form>
          </div>
          <!-- <div class="blog-info-title">
            <div class="blog-info-title-category">
              <span><i class="fas fa-home"></i><?php echo get_the_title($theParent); ?></span>
            </div> -->
            <!-- <div class="blog-info-title-date">
              <span>19.02.2018</span>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- <section class="full-news-title">
  <div class="full-news-title-wrapper ">

    <div class="container">
      <div class="full-news-title-content">
        <h3>Новостная лента</h3>
      </div>
    </div>
  </div>
  </div>
</section> -->


<section class="news-content">
  <div class="container">
  

    <div class="news-content-wrapper">

      <section class="posts">
        <?php 
          while(have_posts()) { 
            the_post(); 
            ?>

            <div class="single-post">
            <?php
              if (has_post_thumbnail() ) { ?>
                <div class="single-post-image">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium_large'); ?>
                  </a>
                </div>
              <?php } else {?>
                <div class="single-post-image">
                  <a href="<?php the_permalink(); ?>">
                    <img src="/wp-content/themes/1school-theme/img/no-img.png">
                  </a>
                </div>
              <?php } ?>
            
              <div class="single-post-content">
                <div class="single-post-header">
                  <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 6 ); ?></a>
                </div>
                <div class="single-post-info">
                  <div class="single-post-date"><i class="fas fa-calendar-alt"></i>
                    <p><?php the_time('j F Y'); ?></p>
                  </div>
                  <div class="single-post-category"><i class="fas fa-tags"></i>
                    <p><?php echo get_the_category_list(', '); ?></p>
                  </div>
                </div>
                <div class="single-post-preview">
                    <?php the_excerpt(); ?>
                </div>
                <div class="single-post-button">
                  <a href="<?php the_permalink(); ?>">Подробнее <i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>

        <?php }
        ?>
        
      </section>

      <div class="pagination">
          <?php echo paginate_links();?>
      </div>

    </div>

    <section class="news-sidebar">
        <div class="single-widget">
          <div class="categories">
            <h3>Категории</h3>
            <?php wp_list_categories([
              'title_li' => NULL,
              'show_count' => true,
            ]);?>
          </div>
        </div>
      </section>
  </div>
</section>



<?php get_footer(); ?>