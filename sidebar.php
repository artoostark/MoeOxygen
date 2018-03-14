<div class="apc-sidebar four wide column">
  <div class="ui site-nav">
    <!--站点导航-->
    <ul class="site-nav-ul">
      <?php
        $categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC',
            "hide_empty"=> "0"
        ) );
        foreach($categories as $cate):
            $child_count = wp_count_terms($cate->taxonomy, array(
                "count"=>true,
                "parent"=>$cate->term_id,
                "hide_empty"=> "0"
            ));
      ?>
        <li>
          <?php if(intval($child_count) > 0): ?>
          <span class="icon-right"><i class="angle right icon"></i></span>
          <?php else:?>
          <?php endif; ?>
          <a href="<?php echo esc_url( get_category_link( $cate->term_id ) ); ?>">
              <?php echo $cate->name; ?>
              <?php if($cate->count > 99): ?>
                  <span class="quantity">99+</span>
              <?php elseif($cate->count > 0): ?>
                  <span class="quantity"><?php echo $cate->count; ?></span>
              <?php endif; ?>
          </a>
          <?php if(intval($child_count) > 0): ?>
          <ul class="site-nav-list">
              <?php
                $sub_cates = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    "parent" => $cate->term_id,
                    "hide_empty"=> "0"
                ) );
                foreach($sub_cates as $sub_cate):
              ?>
              <li>
                  <a href="<?php echo esc_url( get_category_link( $sub_cate->term_id ) ); ?>">
                      <?php echo $sub_cate->name; ?>
                  </a>
              </li>
             <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul><!--end 站点导航-->

  </div>
  <div class="ui site-ad" style="display:none;">
    <div class="ui medium rectangle ad">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/site-ad.png">
    </div>
  </div>
  <div class="ui site-label">
    <div class="site-label-header">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAAPCAYAAAAGRPQsAAABb0lEQVQ4jZXTsUtWYRTH8c/N96UgRILIoiVBSCGKBgdTIXBpahDcnEKQFwQh/wANgmoP33BIFG2wIQgnJWjIwUEQpEhESXESh6BEROM2vM+Vh4tX9JnO+Z3nfM859zk3Scdc9NTh34lXSU/MSwUJtzCLn+iK9GEcYB138klFsGn04i4+4jIa8QplNONlPqlUALsX2Y14GIDlSG87b2cbOf8Qv3LaThHsBp7jSfBHcRzsJaxgC+NBO8YbUE26VJN2SMJr/kBruPgME2jBA8xhP8QStfH2sImRUBgeJemYEo6ibhfRGexr6Ed3AH7DDHZD/Dcagj1ZCi2noWo8+mO1l7weFerBi1BgFlei2P0ssRqJb9EUxotB2alXW51WfIj0iWw1BvEef7GG17h6Cig7ZfRhAF+wq5IuZLAUy9Hlm2eA4g6PVNKZTCjas+/ngH3NC0Wwd1g9AzSFT3mx6Hf6gw4M4Sluq32Gz5jH9mlJ/wG1XEoIpPj4MQAAAABJRU5ErkJggg=="/>
      <span>标签</span>
    </div>
    <?php
    $tags = wp_tag_cloud(array(
        "format" => "array"
    ));
    var_dump($tags);
    ?>
    <div class="site-label-list">
      <a class="ui red label two">音乐</a>
      <a class="ui orange label four">二次元世界</a>
      <a class="ui yellow label one">软件开发需要什么</a>
      <a class="ui olive label three">限时正版</a>
      <a class="ui green label three">神器</a>
      <a class="ui teal label four big">音乐</a>
      <a class="ui blue label two big">游戏</a>
      <a class="ui violet label three">视频</a>
      <a class="ui purple label three">神器</a>
      <a class="ui pink label one">音乐</a>
      <a class="ui brown label one big">音乐</a>
    </div>
  </div>
  <div class="ui site-hot-posts" style="display:none;">
    <div class="site-label-header">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAAPCAYAAAAGRPQsAAABb0lEQVQ4jZXTsUtWYRTH8c/N96UgRILIoiVBSCGKBgdTIXBpahDcnEKQFwQh/wANgmoP33BIFG2wIQgnJWjIwUEQpEhESXESh6BEROM2vM+Vh4tX9JnO+Z3nfM859zk3Scdc9NTh34lXSU/MSwUJtzCLn+iK9GEcYB138klFsGn04i4+4jIa8QplNONlPqlUALsX2Y14GIDlSG87b2cbOf8Qv3LaThHsBp7jSfBHcRzsJaxgC+NBO8YbUE26VJN2SMJr/kBruPgME2jBA8xhP8QStfH2sImRUBgeJemYEo6ibhfRGexr6Ed3AH7DDHZD/Dcagj1ZCi2noWo8+mO1l7weFerBi1BgFlei2P0ssRqJb9EUxotB2alXW51WfIj0iWw1BvEef7GG17h6Cig7ZfRhAF+wq5IuZLAUy9Hlm2eA4g6PVNKZTCjas+/ngH3NC0Wwd1g9AzSFT3mx6Hf6gw4M4Sluq32Gz5jH9mlJ/wG1XEoIpPj4MQAAAABJRU5ErkJggg=="/>
      <span>排名榜</span>
    </div>
    <div class="ui middle aligned divided list">
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>1</span>
          <a href="#">人工智能对设计的影响有哪</a>
        </div>
      </div>
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>2</span>
          <a href="#">人工智能对设计的影响有哪</a>
        </div>
      </div>
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>3</span>
          <a href="#">人工智能对设计的影响有哪</a>
        </div>
      </div>
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>4</span>
          <a href="#">人工智能对设计的影响有哪</a>
        </div>
      </div>
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>5</span>
          <a href="#">人工智能对设计的影响有哪人工智能对设计的影响有哪</a>
        </div>
      </div>
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>6</span>
          <a href="#">人工智能对设计的影响有哪</a>
        </div>
      </div>
      <div class="item">
        <div class="right floated content">11/20</div>
        <div class="content">
          <span>7</span>
          <a href="#">人工智能对设计的影响有哪</a>
        </div>
      </div>
    </div>
  </div>
</div>
