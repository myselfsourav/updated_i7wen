<?php
/*----------------------------------------------------------------------------*/
/* RLEE 20141027
/* added is_weixin() function

/* RLEE 20140828
/* add Chinese video site embed capability, handles mobile/desktop differently

/*   should be able to copy/paste video urls into editor:
     http://v.youku.com/v_show/id_XMjM4ODExMDky.html
     http://www.tudou.com/programs/view/TEKCHyWV4pM/

/* got via baidu search 优酷iframe embed or something...
   http://ttt.tt/108/
   http://zww.me/wordpress-easy-insert-youku-embed-iframe.z-turn

/* fix the ratio problem
   http://amobil.se/2011/11/responsive-embeds/
/*----------------------------------------------------------------------------*/

//// 如果 WordPress 是中文版，移除原来的 youku 视频代码自动插入
if (get_bloginfo('language')==='zh-CN') {
  wp_embed_unregister_handler('youku');
  wp_embed_unregister_handler('tudou');
}
if (wp_is_mobile()) {
  // add youku using iframe
  function wp_iframe_handler_youku( $matches, $attr, $url, $rawattr ) {
/*
      // If the user supplied a fixed width AND height, use it
      if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) {
          $width  = (int) $rawattr['width'];
          $height = (int) $rawattr['height'];
      } else {
          list( $width, $height ) = wp_expand_dimensions( 480, 400, $attr['width'], $attr['height'] );
      }
      $iframe = '<iframe width='. esc_attr($width) .' height='. esc_attr($height) .' src="http://player.youku.com/embed/'. esc_attr($matches[1]) .'" frameborder=0 allowfullscreen></iframe>'; */
      $iframe = '<div class="embed-container"><iframe src="http://player.youku.com/embed/'. esc_attr($matches[1]) .'" frameborder=0 allowfullscreen></iframe></div>';
      return apply_filters( 'iframe_youku', $iframe, $matches, $attr, $url, $rawattr );
  }
  wp_embed_register_handler( 'youku_iframe', '#http://v.youku.com/v_show/id_(.*?).html#i', 'wp_iframe_handler_youku' );
  // add tudou using iframe
  function wp_iframe_handler_tudou( $matches, $attr, $url, $rawattr ) {
/*
      // If the user supplied a fixed width AND height, use it
      if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) {
          $width  = (int) $rawattr['width'];
          $height = (int) $rawattr['height'];
      } else {
          list( $width, $height ) = wp_expand_dimensions( 480, 400, $attr['width'], $attr['height'] );
      }
      $iframe = '<iframe width='. esc_attr($width) .' height='. esc_attr($height) .' src="http://www.tudou.com/programs/view/html5embed.action?code='. esc_attr($matches[1]) .'" frameborder=0 allowfullscreen></iframe>';
*/
      //$iframe = '<div class="embed-container"><iframe src="http://www.tudou.com/programs/view/html5embed.action?code='. esc_attr($matches[2]) .'" frameborder=0 allowfullscreen></iframe></div>'; // RLEE could not disable autoplay in URL or iframe
      $iframe = '<center><p style="font-size:20px;"><a href="'. esc_attr($matches[1]).esc_attr($matches[2]) . '">点这里看视频</a></p></center>';
      return apply_filters( 'iframe_tudou', $iframe, $matches, $attr, $url, $rawattr );
  }
  wp_embed_register_handler( 'tudou_iframe', '#(http://www.tudou.com/programs/view/)(.*?).html#i', 'wp_iframe_handler_tudou' );
} else {
	function wp_embed_handler_tudou2( $matches, $attr, $url, $rawattr ) {
	  $embed = '<div class="embed-container"><embed src="http://www.tudou.com/v/'. esc_attr($matches[1]) .'/v.swf" type="application/x-shockwave-flash" allowscriptaccess="sameDomain" allowfullscreen="true"></embed></div>';
	  return apply_filters( 'embed_tudou', $embed, $matches, $attr, $url, $rawattr );
	}
	wp_embed_register_handler( 'tudou', '#http://www.tudou.com/programs/view/(.*?).html#i', 'wp_embed_handler_tudou2' );
	function wp_embed_handler_youku2( $matches, $attr, $url, $rawattr ) {
/*
		// If the user supplied a fixed width AND height, use it
		if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) {
			$width  = (int) $rawattr['width'];
			$height = (int) $rawattr['height'];
		} else {
			list( $width, $height ) = wp_expand_dimensions( 480, 400, $attr['width'], $attr['height'] );
		}
	  $embed = '<embed src="http://player.youku.com/player.php/sid/'.esc_attr($matches[1]).'/v.swf" allowFullScreen="true" quality="high" width="'. esc_attr($width) .'" height="'. esc_attr($height) .'" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>';
*/
	  $embed = '<div class="embed-container"><embed src="http://player.youku.com/player.php/sid/'.esc_attr($matches[1]).'/v.swf" allowFullScreen="true" quality="autohigh" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></div>';
	  return apply_filters( 'embed_youku', $embed, $matches, $attr, $url, $rawattr );
	}
	wp_embed_register_handler( 'youku', 
          '#http://v.youku.com/v_show/id_(.*?).html#i',
	  'wp_embed_handler_youku2' );
}

function is_weixin(){
  if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
    return true;
  }
  return false;
}
function fb_allowed(){
global $VisitorCountry;
if (isset($VisitorCountry) && !in_array($VisitorCountry->GetCode(), array('CN','KP','IR','VN'))) return true;
return false;
}
?>
