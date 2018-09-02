<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->
<div style="clear:both;"></div>
<div id="footerbar">
	<div class="footerbar-waper">
		<div>
			Powered by <a href="http://www.emlog.net" title="采用emlog系统">emlog</a> 
			<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a><?php echo $footer_info; ?>
			<?php doAction('index_footer'); ?>
		</div>
	</div>
</div><!--end #footerbar-->
</div><!--end #wrap-->
<canvas id="canvas_bg" style="display:none;"></canvas>
<script>prettyPrint();</script>
<!--返回顶部-->
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/scrolltotop.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/background.js"></script>
<script>scrolltotop.init();</script>
<!--<script>
   SyntaxHighlighter.all()
</script>-->
</body>
</html>