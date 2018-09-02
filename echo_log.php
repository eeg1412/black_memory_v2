<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];
?>
<div id="content">
<div id="contentleft">
	<div class="post">
		<div class="post-title">
			<div class="post-author">
				<img src="<?php echo empty($user_cache[1]['photo']['src']) ? TEMPLATE_URL.'images/avatar.jpg' : BLOG_URL . $user_cache[1]['photo']['src'] ?>"  width="50" height="50"/>
			</div>
			<h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
			<p class="post-extra">
				作者：<?php blog_author($author); ?> 
				<em class="v-line">|</em>
				时间：<?php echo gmdate('Y-n-j H:i:s', $date); ?>  
				<em class="v-line">|</em>
				<?php blog_sort($logid); ?> 
				&nbsp;&nbsp;<span><?php editflg($logid,$author); ?></span>
			</p>
		</div>
		<div class="h-dotted-line"></div>
		<div class="post-content">
			<?php echo $log_content; ?>
		</div>
		<div class="post-tags">
			<?php blog_tag($logid); ?>
		</div>
		<?php doAction('log_related', $logData); ?>
		<div class="nextlog">
			<?php neighbor_log($neighborLog); ?>
		</div>
		<div style="clear:both;"></div>
        <?php doAction('qingzz_zan_plugin',$logid); ?>
        <div class="donatebox"><img src="<?php echo TEMPLATE_URL; ?>images/donate.png" alt="捐赠"></div>
		<div><?php blog_comments($comments); ?></div>
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	</div>
	<div style="clear:both;"></div>
</div><!--end #contentleft-->
<script>
$(document).ready(function(e) {
    $.ajax({
		url:"<?php echo TEMPLATE_URL; ?>/lvList/lv.json",
		success:function(result){
        	var lvList = result.lv_exp;
			var lv_exp = $('.lv_exp');
			for(var i=0;i<lv_exp.length;i++){
				var num = lv_exp.eq(i).val();
				if(num != 'null'){
					var lvName = '';
					var lvColor='';
					var listCount = 0;
					for(var j=0;j<lvList.length;j++){
						if(parseFloat(num) <= lvList[j-listCount].exp){
							console.log(num);
							lvName = lvList[j-listCount].name;
							lvColor = lvList[j-listCount].color;
							break;
						}
					}
					$('.alv_body').eq(i).append('<div><span class="wikimoe_level_label" style="color:'+lvColor+';border-color:'+lvColor+'">'+lvName+'</span></div>');
				}else{
					var nullName = result.lv_null[0].name;
					var nullColor = result.lv_null[0].color;
					$('.alv_body').eq(i).append('<div><span class="wikimoe_level_label" style="color:'+nullColor+';border-color:'+nullColor+'">'+nullName+'</span></div>');
				}
			}
			
			$('.alv_body').fadeIn();
			
    	}
	});
});
</script>
<?php
 include View::getView('side');
 include View::getView('footer');
?>