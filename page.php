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
    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/standart-overylay-bg.jpg" alt=""> -->
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
            <?php if($theParent) {?>
              <div class="blog-info-title-category">
                <span><i class="fas fa-home"></i><?php echo get_the_title($theParent); ?></span>
              </div>
            <?php }?>
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

<section class="page">
  <div class="container">
    <article>
      <!-- <div class="post-thumbnale"><img src="https://source.unsplash.com/720x480/?forest" alt=""></div> -->
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    </article>

    <?php
    $childOf = get_pages(array(
      'child_of' => get_the_ID()
    ));
    if($theParent or $childOf) {?>
      <div class="sidebar">
        <div class="single-widget">
          <ul class="side-menu">
              <h3><a href="#"><?php echo get_the_title($theParent); ?></a></h3>
            <?php 
              if ($theParent){
                $findChildOf = $theParent;
              } else {
                $findChildOf = get_the_ID();
              }
            wp_list_pages(array(
              'title_li' => NULL,
              'child_of' => $findChildOf
            ));?>
          </ul>
        </div>

        <?php dynamic_sidebar('sidebar_widget_area') ?>
    </div>
    <?php }?>
  </div>
</section>




<?php } ?>



<?php get_footer(); ?>