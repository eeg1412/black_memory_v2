<?php if(!defined('EMLOG_ROOT')) {exit('error!');} if (!function_exists('_g')) {emMsg('<div style="color:#ff0000;line-height:40px;text-align:center;font-size:16px;">欢迎你使用SevenNight制作的主题；</div><div style="line-height:25px;font-size:14px;color:#999;">你现在无法正常使用本模板的原因：<br />1、你可能还未安装，请先安装<a href="http://www.emlog.net/plugin/144" target="_blank">模板设置插件</a><br />2、你还未启用模板设置插件，请到后面插件管理中启用模板插件；<br /></div>', BLOG_URL . 'admin/plugins.php');}?>
<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="bloggerinfo">
    <div id="bloggerinfoimg">
      <?php if (!empty($user_cache[1]['photo']['src'])): ?>
      <img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
      <?php endif;?>
    </div>
    <p class="bloggerinfoname">NAME<em> / <?php echo $name; ?></em></p>
    <div class="bloggerinfoother"> <b>E-mail:</b>
      <p><?php echo $user_cache[1]['mail'];?></p>
      <b>signature:</b>
      <p><?php echo $user_cache[1]['des']; ?></p>
    </div>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
<li>
  <?php /*<h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3> */?>
  <div id="calendar"> </div>
  <script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//格式化内容工具
function blog_tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读&gt;&gt;', '', strip_tags($content));
        if ($strlen) {
            $content = subString($content, 0, $strlen);
        }
        return $content;
}
?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="blogtags">
    <?php foreach($tag_cache as $value): ?>
    <span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;"> <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></span>
    <?php endforeach; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
	<ul id="menu"> 
    <?php
      foreach($sort_cache as $value):
      if ($value['pid'] != 0) continue;
    ?>     
    <li class="sort_parents">
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a>
      <?php if (!empty($value['children'])): ?>
        <ul>
        <li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a></li>
        <?php
          $children = $value['children'];
          foreach ($children as $key):
          $value = $sort_cache[$key];
        ?>
            <li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
		</li>
    <?php endforeach; ?>
	</ul>
  <div style="text-align:center;clear:both"></div>
  <script>
  function initMenu() {
    $('#menu ul').hide();
    $('#menu ul').children('.current').parent().show();
    //$('#menu ul:first').show();
    $('#menu li a').click(
      function() {
        var checkElement = $(this).next();
        if(checkElement.find('li').length>0){
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            return false;
          }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
          }
        }
      }
    );
  }
  (function(_global,$) {
      initMenu();
      if($('.sort_parents').eq(0).find('ul li').length>0){
        $('.sort_parents').eq(0).find('a').click();
      }
  })(this,jQuery);
  </script>
</li>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
<li>
  <h3 class="sideitem-heading"> <span class="sideitem-title"><span class="l"><?php echo $title; ?></span><a class="r more" href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></span>
    <div style="clear:both;"></div>
  </h3>
  <ul id="twitter">
    <?php foreach($newtws_cache as $value): ?>
    <?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
    <li><?php echo $value['t']; ?><?php echo $img;?>
      <p><?php echo smartDate($value['date']); ?></p>
    </li>
    <?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
    <?php endif;?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php

//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	$isGravatar = Option::get('isgravatar');
	?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="newcomment">
    <?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
    <li id="comment">
      <?php if($isGravatar == 'y'): ?>
      <a href="<?php echo $url; ?>" class="l roll-head"><img width="40" height="40" src="<?php echo getGravatar($value['mail']).'&d=robohash'; ?>" /></a>
      <?php endif; ?>
      <a class="rankingnickname" href="<?php echo $url; ?>"><?php echo $value['name']; ?></a> <em class="archieve"><?php echo $value['content']; ?></em> </li>
    <?php endforeach; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="newlog">
    <?php 
		$i = 0;
		foreach($newLogs_cache as $value): 
		$i++;
	?>
    <li>
      <?php
			switch ($i) { 
				case 1:?>
      <em class="sidebar-icon weight-icon<?php echo $i?>">新</em>
      <?php
				break;
				case 2:?>
      <em class="sidebar-icon weight-icon<?php echo $i?>">新</em>
      <?php
				break;
				case 3:?>
      <em class="sidebar-icon weight-icon<?php echo $i?>">新</em>
      <?php
				break;  
				default: ?>
      <em class="sidebar-icon weight-iconother">新</em>
      <?php
			       break; 
			}
		?>
      <a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="hotlog">
    <?php $i = 0; foreach($randLogs as $value): $i++;?>
    <li>
      <?php
			switch ($i) { 
				case 1:?>
      <em class="sidebar-icon weight-icon<?php echo $i?>">热</em>
      <?php
				break;
				case 2:?>
      <em class="sidebar-icon weight-icon<?php echo $i?>">热</em>
      <?php
				break;
				case 3:?>
      <em class="sidebar-icon weight-icon<?php echo $i?>">热</em>
      <?php
				break;  
				default: ?>
      <em class="sidebar-icon weight-iconother">热</em>
      <?php
			       break; 

			}
		?>
      <a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="randlog">
    <?php foreach($randLogs as $value): ?>
    <li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <script src="<?php echo TEMPLATE_URL; ?>js/jscrollpane/jquery.mousewheel.js"></script>
  <script src="<?php echo TEMPLATE_URL; ?>js/jscrollpane/jquery.jscrollpane.min.js"></script>
  <link href="<?php echo TEMPLATE_URL; ?>js/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
		$(function()
		{
			$('#record').jScrollPane({
				resizeSensor:true
			});
		});
  </script>
  <div id="record">
    <?php foreach($record_cache as $value): ?>
    <div class="record_item"><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></div>
    <?php endforeach; ?>
  </div>
  <div style="clear:both;"></div>
</li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul>
    <?php echo $content; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
<li>
  <h3 class="sideitem-heading"><span class="sideitem-title"><?php echo $title; ?></span></h3>
  <ul id="link">
    <?php foreach($link_cache as $value): ?>
    <li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
    <?php endforeach; ?>
  </ul>
  <div style="clear:both;"></div>
</li>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
<ul class="bar">
  <?php
	foreach($navi_cache as $value):
        if ($value['pid'] != 0) {
            continue;

        }
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			continue;
		elseif($value['url'] == 'admin'):
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
  <li class="item <?php echo $current_tab;?>"> <a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
    <?php if (!empty($value['children'])) :?>
    <ul class="sub-nav">
      <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
    </ul>
    <?php endif;?>
    <?php if (!empty($value['childnavi'])) :?>
    <ul class="sub-nav">
      <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
    </ul>
    <?php endif;?>
  </li>
  <?php endforeach; ?>
</ul>
</div>
<!-- 登录 -->
<!--<div class="login-area">
  <ul>
    <li class="item common relative l rss"><a class="header-otherli" href="<?php echo BLOG_URL; ?>rss.php"><i class="rss-icon"></i>订阅</a></li>
    <?php if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):?>
    <li class="item common l"><a class="header-signin" href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
    <li class="item common l"><a class="header-exit" href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
    <?php else: ?>
    <li class="item common l"><a class="header-otherli" href="<?php echo BLOG_URL; ?>admin">登录</a></li>
    <?php endif;?>
  </ul>
</div>-->
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" title=\"首页置顶文章\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.png\" title=\"分类置顶文章\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
<?php
		$categorystr = "分类 : ";
		$categorystr .= empty($log_cache_sort[$blogid]) ? "无" : $log_cache_sort[$blogid]['name'];
		echo $categorystr;
	?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
<?php if($prevLog):?>
<a class="l" href="<?php echo Url::log($prevLog['gid']) ?>" title="<?php echo $prevLog['title'];?>"><em>«</em><?php echo $prevLog['title'];?></a>
<?php endif;?>
<?php if($nextLog):?>
<a class="r" href="<?php echo Url::log($nextLog['gid']) ?>" title="<?php echo $nextLog['title'];?>"><?php echo $nextLog['title'];?><em>»</em></a>
<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
<a name="comments"></a>
<p class="comment-header"><b>评论：</b></p>
<?php endif; ?>
<?php
  $isGravatar = Option::get('isgravatar');
  $cardLinkAddr = _g('cardLink');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	  $comment['cardInfo'] = $comment['mail'] && !empty($cardLinkAddr)? '<a class="commentCardInfo" target="_blank" href="'.BLOG_URL.$cardLinkAddr.'&useraddr='.md5($comment['mail']).'&usernick='.urlencode($comment['poster']).'">TA的卡牌</a>':'';
	  $comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<div class="comment" id="comment-<?php echo $comment['cid']; ?>"> <a name="<?php echo $comment['cid']; ?>"></a>
  <?php if($isGravatar == 'y'): ?>
  <div class="avatar"><img src="<?php echo getGravatar($comment['mail']).'&d=robohash'; ?>" width="45" height="45"/>
  	<div class="alv_body"><input class="lv_exp" type="hidden" value="<?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str); ?>"></div>
  </div>
  <?php endif; ?>
  <div class="comment-info"> <b><?php echo $comment['poster']; ?> </b><?php echo $comment['cardInfo']; ?><br />
    <span class="comment-time"><?php echo $comment['date']; ?></span>
    <div class="comment-content"><?php echo comment_add_owo($comment['content']); ?></div>
    <div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
  </div>
  <?php blog_comments_children($comments, $comment['children']); ?>
</div>
<?php endforeach; ?>
<div id="pagenavi"> <?php echo $commentPageUrl;?> </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
  $isGravatar = Option::get('isgravatar');
  $cardLinkAddr = _g('cardLink');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['cardInfo'] = $comment['mail'] && !empty($cardLinkAddr) ? '<a class="commentCardInfo" target="_blank" href="'.BLOG_URL.$cardLinkAddr.'?post=130&useraddr='.md5($comment['mail']).'&usernick='.urlencode($comment['poster']).'">TA的卡牌</a>':'';
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>"> <a name="<?php echo $comment['cid']; ?>"></a>
  <?php if($isGravatar == 'y'): ?>
  <div class="avatar"><img src="<?php echo getGravatar($comment['mail']).'&d=robohash'; ?>" width="45" height="45"/>
  	<div class="alv_body"><input type="hidden" class="lv_exp" value="<?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str); ?>"></div>
  </div>
  <?php endif; ?>
  <div class="comment-info"> <b><?php echo $comment['poster']; ?> </b><?php echo $comment['cardInfo'] ?><br />
    <span class="comment-time"><?php echo $comment['date']; ?></span>
    <div class="comment-content"><?php echo comment_add_owo($comment['content']); ?></div>
    <div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
  </div>
  <?php if($comment['level'] < 1): ?>
  <?php blog_comments_children($comments, $comment['children']);?>
</div>
  <?php else: ?>
</div>
<?php blog_comments_children($comments, $comment['children']);?>
<?php endif; ?>
<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-place">
  <div class="comment-post" id="comment-post">
    <div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
    <p class="comment-header"><b>发表评论：</b><a name="respond"></a></p>
    <form class="commentform" method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
      <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
      <?php if(ROLE == ROLE_VISITOR): ?>
      <p>
        <input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1">
        <label for="author"><small>个人昵称</small></label>
      </p>
      <p>
        <input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2">
        <label for="email"><small>邮件地址 (选填)</small></label>
      </p>
      <p>
        <input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3">
        <label for="url"><small>个人主页 (选填)</small></label>
      </p>
      <div style="clear:both;"></div>
      <?php endif; ?>
      <div title="OwO" class="OwO"></div>
      <p id="comment_inner" class="comment-input-inner">
        <textarea onblur="commentblur()" onfocus="commentfocus()" name="comment" id="comment" rows="10" tabindex="4" placeholder="说点什么吧..." class="OwO-textarea"></textarea>
      </p>
		<script>
		
		var OwO_demo = new OwO({
            logo: 'OωO表情',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<?php echo TEMPLATE_URL; ?>OwO/OwO.min.json',
            position: 'up',
            width: '100%',
            maxHeight: '256px'
        });
        </script>
      <p><?php echo $verifyCode; ?>
        <input type="submit" id="comment_submit" class="comment-submit r" value="发表评论" tabindex="6" />
      </p>
      <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
      <script type="text/javascript">
	          function commentblur(){
	            document.getElementById('comment_inner').className='comment-input-inner';
	          }
	          function commentfocus(){
	            document.getElementById('comment_inner').className='comment-input-inner focus';
	          }
	        </script>
    </form>
    <div style="clear:both;"></div>
  </div>
</div>
<?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;

    } else {
        return FALSE;
    }
}
?>
<?php
/**
*替换OwO表情
*by 兰陵 
*https://blog.thkira.com/
*/
function comment_add_owo($comment_text) {
	$data_OwO = array(
		'@(墨镜)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/1.gif" alt="墨镜" class="OwO-img">',
		'@(瞌睡)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/2.gif" alt="瞌睡" class="OwO-img">',
		'@(怜悯)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/3.gif" alt="怜悯" class="OwO-img">',
		'@(绝望)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/4.gif" alt="绝望" class="OwO-img">',
		'@(面无表情)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/6.gif" alt="面无表情" class="OwO-img">',
		'@(坏掉啦)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/7.gif" alt="坏掉啦" class="OwO-img">',
		'@(嫌弃)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/9.gif" alt="嫌弃" class="OwO-img">',
		'@(醉了)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/10.gif" alt="醉了" class="OwO-img">',
		'@(卖萌)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/11.gif" alt="卖萌" class="OwO-img">',
		'@(呕吐)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/12.gif" alt="呕吐" class="OwO-img">',
		'@(鼓掌)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/13.gif" alt="鼓掌" class="OwO-img">',
		'@(喔)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/14.gif" alt="喔" class="OwO-img">',
		'@(哭笑)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/15.gif" alt="哭笑" class="OwO-img">',
		'@(高兴)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/16.gif" alt="高兴" class="OwO-img">',
		'@(抛媚眼)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/18.gif" alt="抛媚眼" class="OwO-img">',
		'@(自信)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/19.gif" alt="自信" class="OwO-img">',
		'@(汗)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/20.gif" alt="汗" class="OwO-img">',
		'@(惊讶)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/23.gif" alt="惊讶" class="OwO-img">',
		'@(调皮)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/26.gif" alt="调皮" class="OwO-img">',
		'@(囧)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/27.gif" alt="囧" class="OwO-img">',
		'@(迷上)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/28.gif" alt="迷上" class="OwO-img">',
		'@(昏厥)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/29.gif" alt="昏厥" class="OwO-img">',
		'@(难过)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/32.gif" alt="难过" class="OwO-img">',
		'@(晕)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/35.gif" alt="晕" class="OwO-img">',
		'@(笑)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/38.gif" alt="笑" class="OwO-img">',
		'@(触手)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/41.gif" alt="触手" class="OwO-img">',
		'@(大哭)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/42.gif" alt="大哭" class="OwO-img">',
		'@(摇头)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/67.gif" alt="摇头" class="OwO-img">',
		'@(剪刀)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/68.gif" alt="剪刀" class="OwO-img">',
		'@(石头)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/69.gif" alt="石头" class="OwO-img">',
		'@(布)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/70.gif" alt="布" class="OwO-img">',
		'@(剪刀手)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/71.gif" alt="剪刀手" class="OwO-img">',
		'@(顶)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/72.gif" alt="顶" class="OwO-img">',
		'@(踩)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/73.gif" alt="踩" class="OwO-img">',
		'@(OK哒)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/74.gif" alt="OK哒" class="OwO-img">',
		'@(恶魔)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/92.gif" alt="恶魔" class="OwO-img">',
		'@(天使)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/93.gif" alt="天使" class="OwO-img">',
		'@(礼花)' => '<img src="https://www.wikimoe.com/content/templates/black_memory v1.1/OwO/pangya/104.gif" alt="礼花" class="OwO-img">',
	);
	return strtr($comment_text,$data_OwO);
}
?>

<?php
//comment：输出等级
function echo_levels($comment_author_email){
  if($comment_author_email == '""'){
	echo 'null';
  }else{
	  $DB = MySql::getInstance();
	  $sql = "SELECT cid as author_count FROM wikimoeindex_comment WHERE mail = ".$comment_author_email."and hide ='n'";
	  $res = $DB->query($sql);
	  $author_count = mysql_num_rows($res);
	  if($author_count>9999){
		  $author_count = 9999;
	  }
	  echo $author_count;
  }
}
?>