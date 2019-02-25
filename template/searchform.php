<form class="search-bar" action="<?php echo home_url( '/' ); ?>" method="get" autocomplete="off">
  <label for="search" hidden>Search in <?php echo home_url( '/' ); ?></label>
  <input type="text" name="s" id="input-suggestion" placeholder="Search" value="<?php the_search_query(); ?>" />
  <button type="submit" value="Submit"><i class="fas fa-search"></i></button>
</form>