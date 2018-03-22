<?php

function friendly_comment_time(){
    $d = "";
    if(get_comment_date("Y-m-d") == date("Y-m-d")){
        $d .= "今天";
    }else {
        $d .= "Y-m-d ";
    }
    $d .= "H:i";
    return get_comment_time($d);
}

class Apc_Comments_Walker extends Walker_Comment{
    // public function start_lvl( &$output, $depth = 0, $args = array() ) {
    //     $GLOBALS['comment_depth'] = $depth + 1;
    //     $output .= '<ul class="reple-list">' . "\n";
    // }
    // public function end_lvl( &$output, $depth = 0, $args = array() ) {
    //     $GLOBALS['comment_depth'] = $depth + 1;
    //     $output .= "</ul><!-- .children -->\n";
    // }
    protected function comment( $comment, $depth, $args ) {
        // $parent_comment_id = intval($comment->comment_parent);
        // if($parent_comment_id > 0){
        //     $parent = get_comment($parent_comment_id);
        // }else{
        //     $parent = null;
        // }
        $parent = null;
?>
    <li class="comment">
        <a class="avatar">
            <?php if ( 0 != $args['avatar_size'] ) : ?>
                <img src="<?php echo get_avatar_url($comment, $args['avatar_size']); ?>">
            <?php else: ?>
                <img src="<?php echo get_avatar_url($comment, array(35, 35)); ?>">
            <?php endif; ?>
        </a>
        <div class="content">
          <a class="author" href="javascript:;">
              <?php echo get_comment_author($comment); ?>
          </a>
          <div class="metadata">
            <span class="date">
                <?php echo friendly_comment_time(); ?>
            </span>
          </div>
          <div class="text">
              <?php if($parent){
                  echo "<p>回复" . $parent->comment_author . "</p>";
              } ?>
            <?php
        		comment_text(
        			$comment, array_merge(
        				$args, array(
        					'depth'     => $depth,
        					'max_depth' => $args['max_depth'],
        				)
        			)
        		);
            ?>
            <?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
			<?php endif; ?>
          </div>

          <div class="actions">
            <?php
            	comment_reply_link(
            		array_merge(
            			$args, array(
            				'depth'     => $depth,
            				// 'max_depth' => $args['max_depth'],
            				'max_depth' => 10000,
            			)
            		)
            	);
        	?>
            <div class="like hide"><a href="#">赞（10）</a></div>
          </div>
        </div>
    </li>
<?php
    }
}
