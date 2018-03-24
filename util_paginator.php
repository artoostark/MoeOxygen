<div class="ui buttons site-page-number">
    <?php
      the_apc_paginate_links(
          array(
              "next_text" => "下一页",
              "prev_text" => "上一页"
          )
      );
    ?>
  </div>
