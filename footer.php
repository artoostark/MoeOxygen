<footer>
  <div class="footer-info">
    <div class="ui container three column stackable grid">
      <div class="wide column footer-left">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'mall_link',
                'container' => false,
                'menu_class' => 'mall',
            )
        );
        ?>
        <div class="text">
            <?php echo get_theme_mod( 'footer_desc', '<p>请到后台编辑</p>' ); ?>
        </div>
      </div>
      <div class="wide column footer-center">
        <div class="about links-container">
          <h2>爱评测</h2>
          <?php
          wp_nav_menu(
              array(
                  'theme_location' => 'about_link',
                  'container' => false,
                  'menu_class' => 'ui three column stackable grid links',
              )
          );
          ?>
        </div>
        <div class="cooperation links-container">
          <h2>广告合作</h2>
          <?php
          wp_nav_menu(
              array(
                  'theme_location' => 'cooperation_link',
                  'container' => false,
                  'menu_class' => 'ui three column stackable grid links',
              )
          );
          ?>
        </div>
        <div class="social links-container">
          <h2>社交媒体</h2>
          <?php
          wp_nav_menu(
              array(
                  'theme_location' => 'social_link',
                  'container' => false,
                  'menu_class' => 'ui three column stackable grid links',
              )
          );
          ?>
        </div>
      </div>
      <div class="wide column footer-right">
        <div class="ui two column stackable grid">
          <div class="wide column wechat">
            <h2>爱评测微信</h2>
            <div class="qr">

              <img src="<?php echo get_theme_mod( 'wechat_qrcode', '' ); ?>" title="爱评测微信" alt="爱评测微信">
            </div>
          </div>
          <div class="wide column weibo">
            <h2>爱评测微博</h2>
            <div class="qr">
              <img src="<?php echo get_theme_mod( 'weibo_qrcode', '' ); ?>" title="爱评测微博" alt="爱评测微博">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="ui container two column stackable grid">
      <div class="wide column">
        <div class="footer-copyright-left">
          Copyright © <?php get_now_year(); ?> 爱评测：
          <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">
              <?php echo get_option( 'zh_cn_l10n_icp_num' );?>
          </a>
          官方QQ群：<?php get_qq_group_select(); ?>
        </div>
      </div>
      <div class="wide column servers">
        <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/alicloud.png"></a>
        <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/qiniucloud.png"></a>
        <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/tencentcloud.png"></a>
        <a href="#" target="_blank" rel="nofollow"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/youpaicloud.png"></a>
      </div>
    </div>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'friendly_link',
            'container' => false,
            'menu_class' => 'links',
        )
    );
    ?>
  </div>
  <div class="scroll-to-top apc-fade">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/top.png">
  </div><!--Top-->
</footer><!-- footer end -->

<div class="ui container middle aligned center aligned grid apc-user">
  <div class="column">
    <div class="ui image header">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/login-logo.png" class="image">
    </div>
    <div class="ui two column doubling stackable grid">
      <div class="column user-left">
        <div class="header">
          <i class="wechat icon"></i>微信快速登录
        </div>
        <div class="content images">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/wechat-qr.png">
          <div class="footer">
            <div class="footer-left">
              <i class="czs-scan-l"></i>
            </div>
            <div class="footer-right">
              手机打开微信<br/>
              扫二维码登录
            </div>
          </div>
        </div>
      </div>
      <div class="column user-right">
        <div class="user-features">
          <button class="ui button registered active">注册</button>
          <button class="ui button login">登录</button>
        </div>
        <form class="ui large form registered">
          <div class="ui stacked">
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="username" placeholder="请输入您的注册账号">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="请输入您的登录密码">
              </div>
            </div>
            <div class="ui fluid large submit button registered">注册</div>
            <div class="ui checkbox protocol">
              <input id="protocol" name="protocol" type="checkbox">
              <label for="protocol">已阅读并接受<a href="#">注册协议</a></label>
            </div>
          </div>
        </form>
        <form class="ui large form login">
          <div class="ui stacked">
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="username" placeholder="请输入您的登录账号">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="请输入您的登录密码">
              </div>
            </div>
            <div class="ui fluid large submit button login">登录</div>
            <div class="ui checkbox protocol">
              <a class="retrieve-password">忘记密码？</a>
            </div>
          </div>
        </form>
        <div class="other-login">
          <span class="text">其他登录方式</span>
          <a href="#"><i class="qq icon"></i></a>
          <a href="#"><i class="weibo icon"></i></a>
        </div>
      </div>
    </div>
  </div>
</div><!--login end-->
<div id="cover" class="ui dimmer"></div><!--end 罩层-->
<div class="ui container middle aligned center aligned grid apc-mobile-search">
  <div class="column">
    <div class="ui search">
      <div class="ui icon input">
        <input id="search-input" class="prompt" type="text" placeholder="请搜索你感兴趣的主题">
        <button id="mobile-search" class="ui button"><i class="search icon"></i></button>
      </div>
      <button class="ui button back">取消</button>
    </div>
    <div class="history-info">历史纪录</div>
    <div class="search-delete search-history"></div>
    <!--<div class="search-history" id="history-clear">清除记录</div>-->
  </div>
</div><!--end search-->
<?php wp_footer(); ?>
<!-- <script type="text/javascript" src="assets/jquery/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="assets/semantic/semantic.js"></script>
<script type="text/javascript" src="assets/javascript/jquery.terseBanner.min.js"></script>
<script type="text/javascript" src="assets/javascript/apc.js"></script> -->
</body>
</html>
