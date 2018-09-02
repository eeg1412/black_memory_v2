<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
<div id="tw">
    <ul>
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['photo']['src']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['photo']['src'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
    <li class="li">
    <div class="main_img"><img src="<?php echo $avatar; ?>" width="50px" height="50px" /></div>
    <div class="post1">
        <span><?php echo $author; ?></span><br />
        <?php echo $val['t'].'<br/>'.$img;?>
        <div class="bttome">
        <p class="time"><?php echo $val['date'];?> </p>
        <p class="post-tw"><a href="javascript:loadr('<?php echo BLOG_URL; ?>t/?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复(<span id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></span>)</a></p>
        </div>
    </div>
    
    <div class="clear"></div>
    <ul id="r_<?php echo $tid;?>" class="tw_liuyan"></ul>
    <?php if ($istreply == 'y'):?>
    <div class="huifu" id="rp_<?php echo $tid;?>">
    <textarea id="rtext_<?php echo $tid; ?>"></textarea>
    <div class="tbutton">
        <div class="tinfo" style="display:<?php if(ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER){echo 'none';}?>">
        <input type="text" id="rname_<?php echo $tid; ?>" value="" />昵称<br/>
        <span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">
            <input type="text" id="rcode_<?php echo $tid; ?>" value="" />
            <?php echo $rcode; ?></span>        
        </div>
        <input class="button_p" type="button" onclick="reply('<?php echo BLOG_URL; ?>t/index.php?action=reply',<?php echo $tid;?>);" value="回复" /> 
        <div class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span></div>
    </div>
    </div>
    <?php endif;?>
    </li>
    <?php endforeach;?>
    <li id="pagenavi"><?php echo $pageurl;?></li>
    </ul>
</div><!--end #tw-->
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>