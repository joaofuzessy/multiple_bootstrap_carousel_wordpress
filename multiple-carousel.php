<!-- Carousel -->
<div id="promo-carousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <?php
    // Item size (set here the number of posts for each group)
    $i = 4; 

    // Set the arguments for the query
    global $post; 
    $args = array( 
      'numberposts'   => -1, // -1 is for all
      'post_type'     => 'your_post', // or 'post', 'page'
      'orderby'       => 'title', // or 'date', 'rand'
      'order' 	      => 'ASC', // or 'DESC'
    );

    // Get the posts
    $myposts = get_posts($args);

    // If there are posts
    if($myposts):

      // Groups the posts in groups of $i
      $chunks = array_chunk($myposts, $i);
      $html = "";

      /*
       * Item
       * For each group (chunk) it generates an item
       */
      foreach($chunks as $chunk):
        // Sets as 'active' the first item
        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
        $html .= '<div class="item '.$active.'"><div class="container"><div class="row">';

        /*
         * Posts inside the current Item
         * For each item it generates the posts HTML
         */
        foreach($chunk as $post):
          $html .= '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">';
          $html .= get_the_title($post->ID);
          $html .= '</div>';
        endforeach;

        $html .= '</div></div></div>';	

      endforeach;

      // Prints the HTML
      echo $html;

    endif;
    ?>

  </div> <!-- carousel inner -->


  <!-- Controls -->
  <a class="left carousel-control" href="#promo-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#promo-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>


</div> <!-- /carousel -->
