<?php get_header(); ?>
  <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div class="row title-bar">
      <div class="container">
        <div class="col-md-12">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>

    <div class="row main">
      <div class="container row">
        <?php if(is_active_sidebar('sidebar')) : ?>
          <div class="col-md-8">
        <?php else : ?>
          <div class="col-md-12">
        <?php endif; ?>
          <div class="post row">
            <div class="post-thumbnail">
              <?php if(has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
              <?php endif; ?>
            </div>
            <ul class="meta">
              <li>By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></li>
              <li><?php the_time('F j, Y g:i a'); ?></li>
              <li>
                <?php 
                  $categories = get_the_category();
                  $separator = ", ";
                  $output = '';

                  if($categories) {
                    foreach($categories as $category){
                      $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'. $separator;
                      }
                    }
                  echo trim($output,$separator);
                ?>
              </li>
            </ul>
            <?php the_content(); ?>
          </div>
          <div class="clr"></div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php comments_template(); ?>
      </div>
      <?php if(is_active_sidebar('sidebar')) : ?>
        <div class="col-md-4">
          <?php dynamic_sidebar('sidebar'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php if(is_active_sidebar('content-region-1')) : ?>
    <?php dynamic_sidebar('content-region-1'); ?>
  <?php endif; ?>

  <?php if(is_active_sidebar('content-region-2')) : ?>
    <?php dynamic_sidebar('content-region-2'); ?>
  <?php endif; ?>

<?php get_footer(); ?>