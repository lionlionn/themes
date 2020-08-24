<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="901" height="266" id="test_MyJavaScript">
  <param name="movie" value="<?php bloginfo('stylesheet_directory'); ?>/swf/index.swf" />
  <param name="allowScriptAccess" value="sameDomain" />
  <param name="allowFullScreen" value="false" />	

  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
  <param name="flashvars" value="homeURL=<?php echo get_bloginfo('home'); ?>&lang=<?php echo qtrans_getLanguage(); ?>&type=index" /> 
  <embed src="<?php bloginfo('stylesheet_directory'); ?>/swf/index.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"  type="application/x-shockwave-flash" width="901" height="266" flashVars="homeURL=<?php echo get_bloginfo('home'); ?>&lang=<?php echo qtrans_getLanguage(); ?>&type=index" allowScriptAccess="sameDomain" allowFullScreen="false"></embed>
</object>