<?php get_header(); ?>

<?php
$theParent = wp_get_post_parent_id(get_the_ID());

while(have_posts()) {
  the_post();?>
<section class="blog-title">
  <div class="blog-title-wrapper ">
    <div class="blog-title-overlay"></div>
    <div class="container">



      <div class="blog-title-content">
        <div class="single-blog-title">
          <div class="article-title">
            <h1>
              <?php the_title();?>
            </h1>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php 
  

  if($theParent) { ?>
    <div class="breadcrumbs">
      <div class="container">
        <ul class="breadcrumbs-box">
          <li class="single-breadcrumb"><a href="<?php get_permalink($theParent);?>">
              <?php echo get_the_title($theParent); ?></a></li>
          >
          <li class="single-breadcrumb"><span>
              <?php the_title();?></span>
          </li>

        </ul>
          <div class="line"></div>
      </div>
    </div>

<?php }
?>

<section class="search">
  <div class="container">

    

    <article>
      <!-- <div class="post-thumbnale"><img src="https://source.unsplash.com/720x480/?forest" alt=""></div> -->
      <div class="post-content">
        <form method="get" action="<?php echo esc_url(site_url('/'));?>" class="searchForm">
          <input placeholder="Что вы хотите найти?" type="search" class="searchFormInput" name="s" id="s">
          <input type="submit"class="searchFormSubmit" value="Найти...">
        </form>
      </div>
    </article>






  </div>
</section>




<?php } ?>



<?php get_footer(); ?>