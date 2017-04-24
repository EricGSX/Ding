<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ding</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" href="/Public/Home/images/icon.png">
    <!--<link rel="shortcut icon" href="/Public/Home/images/favicon.ico">-->
    <script src="/Public/Home/js/jquery-2.1.4.min.js"></script>
    <script src="/Public/Home/js/nprogress.js"></script>
    <script src="/Public/Home/js/jquery.lazyload.min.js"></script>
    <!--[if gte IE 9]>
  <script src="/Public/Home/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="/Public/Home/js/html5shiv.min.js" type="text/javascript"></script>
  <script src="/Public/Home/js/respond.min.js" type="text/javascript"></script>
  <script src="/Public/Home/js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
    <!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>
<body class="user-select single">
    <header class="header">
</header>
    <section class="container">
  <div class="content-wrap">
    <div class="content">
      <header class="article-header">
        <h1 class="article-title"><?php echo ($info['title']); ?></h1>
        <div class="article-meta"> <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间：<?php echo (date('Y-m-d',$info['creat_time'])); ?>"><i class="glyphicon glyphicon-time"></i> <?php echo (date('Y-m-d',$info['creat_time'])); ?></time>
          </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ding"><i class="glyphicon glyphicon-globe"></i> Ding/Guo</span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ding"><i class="glyphicon glyphicon-list"></i> <a href="#" title="Ding" >Ding</a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：219"><i class="glyphicon glyphicon-eye-open"></i> 219</span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> 4</span> </div>
      </header>
      <article class="article-content">
        <p>
            <?php if($info['image'] == '' ): ?><img  src="/Public/Home/images/Ding.jpg" alt="Ding" >
                <?php else: ?>
                <img  src="/Uploads<?php echo ($info['image']); ?>" alt="Ding" ><?php endif; ?>
        </p>
        <p>帖子内容</p>
        <pre class="prettyprint lang-cs">
            <?php echo ($info['content']); ?>
        </pre>
      </article>
      <!--<div class="relates">-->
        <!--<div class="title">-->
          <!--<h3>相关推荐</h3>-->
        <!--</div>-->
        <!--<ul>-->
          <!--<li><a href="" title="" >Ding</a></li>-->
        <!--</ul>-->
      <!--</div>-->
        <?php if($_SESSION['id']): ?><div class="title" id="comment">
            <h3>评论</h3>
        </div>
        <div id="respond">
          <form id="comment-form" name="comment-form" action="/index.php/Home/Post/replay" method="POST">
              <input type='hidden' name='mid' value="<?php echo ($info['id']); ?>"/>
              <div class="comment">
                  <div class="comment-box">
                      <textarea placeholder="您的评论或留言" name="content" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
                      <div class="comment-ctrl">
                          <button type="submit" name="comment-submit" id="comment-submit" tabindex="4">发 表 评 论</button>
                      </div>
                  </div>
              </div>
          </form>
        </div><?php endif; ?>
        <?php if(!$_SESSION['id']): ?><p><a href='/index.php/Home/User/login'>回帖</a></p><?php endif; ?>
      <div id="postcomments">
        <ol id="comment_list" class="commentlist">
            <?php if(is_array($replay)): foreach($replay as $key=>$v): ?><li class="comment-content"><div class="comment-main"><p><a class="address" href="#" rel="nofollow" target="_blank"><?php echo ($v['username']); ?></a><span class="time"><?php echo (date('Y-m-d',$v['creat_time'])); ?></span><br><?php echo ($v['content']); ?></p></div></li><?php endforeach; endif; ?>
      </div>
    </div>
  </div>
  <aside class="sidebar">
      <div class="widget widget_hot">
          <h3>最新帖子&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href='/index.php/Home/Index/Index/index'>首页</a></h3>
          <ul>
              <?php if(is_array($new_info)): foreach($new_info as $key=>$vo): ?><li><a title="Ding" href="<?php echo U('detail',array('aid'=>$vo['id'],'uid'=>$vo['uid']));?>" ><span class="thumbnail">
                                <?php if($vo['image'] == '' ): ?><img class="thumb" data-original="" src="/Public/Home/images/Ding.jpg" alt="Ding"  style="display: inline;">
                                    <?php else: ?>
                                    <img class="thumb" data-original="" src="/Uploads<?php echo ($vo['image']); ?>" alt="Ding"  style="display: inline;"><?php endif; ?>
                </span><span class="text"><?php echo ($vo['title']); ?></span><span class="muted"><i class="glyphicon glyphicon-time"></i>
                    <?php echo (date('Y-m-d',$vo['creat_time'])); ?>
                </span>
                      <!--<span class="muted"><i class="glyphicon glyphicon-eye-open"></i>88</span>-->
                  </a></li><?php endforeach; endif; ?>
          </ul>
      </div>
  </aside>
</section>
    <footer class="footer">
</footer>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
    <script src="/Public/Home/js/jquery.ias.js"></script>
    <script src="/Public/Home/js/scripts.js"></script>
</body>
</html>