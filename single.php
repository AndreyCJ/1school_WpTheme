<?php get_header(); ?>

<?php
$theParent = wp_get_post_parent_id(get_the_ID());

while(have_posts()) {
  the_post();?>
<section class="blog-title">
  <div class="blog-title-wrapper ">
    <?php
      if (has_post_thumbnail()) { 
       the_post_thumbnail(); 
    }?>
    <div class="blog-title-overlay"></div>
    <div class="container">



      <div class="blog-title-content">
        <div class="single-blog-title">
          <div class="article-title">
            <h1>
              <?php the_title();?>
            </h1>
          </div>
          <div class="blog-info-title">
            <div class="blog-info-title-date">
              <span><i class="fas fa-calendar-alt"></i>
                <? the_time('j F Y'); ?></span>
              <span><i class="fas fa-tags"></i>
                <?php echo get_the_category_list(', '); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<section class="post">
  <div class="container">
    <article class="article-post">
      <!-- <div class="post-thumbnale"><img src="https://source.unsplash.com/720x480/?forest" alt=""></div> -->
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    </article>

    <div class="link-button">
      <a href="<?php echo site_url('/news');?>">
      <i class="fas fa-angle-left"></i>Вернуться к новостям
    </a>
  </div>
  
  </div>
</section>

  
<?php } ?>



<?php get_footer(); ?>