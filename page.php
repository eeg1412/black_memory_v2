<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
	<div class="post">
		<h2><?php echo $log_title; ?></h2>
		<?php echo $log_content; ?>
		<?php blog_comments($comments); ?>
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div style="clear:both;"></div>
	</div>
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