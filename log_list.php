<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content" class="clearfix">
<div id="contentleft">
<?php if(_g('slides') == 'yes'): ?>
  <!--轮播图片-->
  <div id="banner"  class="yx-rotaion">
  		<ul  class="rotaion_list">
  			<?php for ($i = 1; $i <= _g('slidesnum'); $i++) { ?> 
  				<li>
  					<a target="<?php echo _g('hdopen'.$i); ?>" href="<?php echo _g('hda'.$i); ?>"><img src="<?php echo _g('hd'.$i); ?>" alt="<?php echo _g('hdt'.$i); ?>" width="880" height="300" /></a>
  				</li>
			<?php } ?>
  		</ul>
  </div>
  <script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>/js/jquery.yx_rotaion.js?ver0.2"></script> 
  <script type="text/javascript">
	$(".yx-rotaion").yx_rotaion({auto:true});
  </script> 
<?php endif;?>

<ul class="itemarticle-warp">
<?php doAction('index_loglist_top'); ?>
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
	<li class="itemarticle-content">
		<div class="itemarticle-img">
			<?php
				/*图片和摘要*/
		    	preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['log_description'], $img);
				if($imgsrc = !empty($img[1])){ $imgsrc = $img[1][0];?>
					<a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
					<img width="240" height="135" src="<?php echo $imgsrc; ?>" alt=""></a>
				<?php }else{ 
					preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);
					if($imgsrc = !empty($img[1])){ $imgsrc = $img[1][0]; ?>
						<a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
						<img width="240" height="135" src="<?php echo $imgsrc; ?>" alt=""></a>
					<?php }else{?>
						<div class="not_pic">
						<p class="itemarticle-description"><?php echo $logdes = blog_tool_purecontent($value['content'], 65); ?></p>
						</div>
					<?php }?>
			<?php }?>
			<!-- 分类 -->
            <span class="itemarticle-taglabel"><?php blog_sort($value['logid']);?></span>
        </div>
        <div class="itemarticle-tips">
        	<h5><a class="itemarticle-title" href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h5>
        	<div class="itemarticle-extra">
				<span class="l"><?php echo gmdate('Y-n-j', $value['date']); ?></span>
				<span class="r">浏览(<?php echo $value['views']; ?>)</span>
				<span class="r mr10">评论(<?php echo $value['comnum']; ?>)</span>
        		<span><?php editflg($value['logid'],$value['author']); ?></span>
        	</div>
        </div>
	<div style="clear:both;"></div>
	</li>
<?php 
endforeach;
else:
?>
	<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>
<?php endif;?>
</ul>
<div style="clear:both;"></div>
<div id="pagenavi">
	<?php echo $page_url;?>
</div>
</div><!-- end #contentleft-->
<script src="<?php echo TEMPLATE_URL; ?>js/tips_tool.js" type="text/javascript"></script>
<?php
 include View::getView('side');
 include View::getView('footer');
?>