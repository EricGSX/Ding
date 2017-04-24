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
<body class="user-select">
    <header class="header">
</header>
    <section class="container">
  <div class="content-wrap">
    <div class="content">
      <div class="title">
          <br />
        <h1><font color='blue'><i>咖啡泡柠檬</i></font></h1>
        <div class="more">
                <h3>
                    <a href="/index.php/Home/User/login" title="登录" >登录</a>
                    <a href="/index.php/Home/User/register" title="注册" >注册</a>
                    <a href="/index.php/Home/Post/send" title="发帖" >发帖</a></h3>
                    <a href="/index.php/Home/User/myself" title="我的帖子" >我的帖子</a>
                    <a href="/index.php/Home/User/logout" title="退出" >退出</a>
            </h3>
            <br />
            <br />
        </div>
      </div>
      <article class="excerpt excerpt-4" style="">
          <a class="focus" href="#" title="" target="_blank" >
              <img class="thumb" data-original="" src="/Public/Home/images/ad1.jpg" alt="Ding"  style="display: inline;">
          </a>
          <img class="thumb" data-original="" src="/Public/Home/images/ad2.jpg" alt="Ding"  style="display: inline;">
          <img class="thumb" data-original="" src="/Public/Home/images/ad3.jpg" alt="Ding"  style="display: inline;">
      </article>
        <article class="excerpt excerpt-4" style="">
            <a class="focus" href="#" title="" target="_blank" >
                <img class="thumb" data-original="" src="/Public/Home/images/ad4.jpg" alt="Ding"  style="display: inline;">
            </a>
            <img class="thumb" data-original="" src="/Public/Home/images/ad5.jpg" alt="Ding"  style="display: inline;">
            <img class="thumb" data-original="" src="/Public/Home/images/ad6.jpg" alt="Ding"  style="display: inline;">
        </article>



        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><article class="excerpt excerpt-4" style=""><a class="focus" href="<?php echo U('detail',array('aid'=>$vo['id'],'uid'=>$vo['uid']));?>" title="" target="_blank" >
            <?php if($vo['image'] == '' ): ?><img class="thumb" data-original="" src="/Public/Home/images/Ding.jpg" alt="Ding"  style="display: inline;">
            <?php else: ?>
                <img class="thumb" data-original="" src="/Uploads<?php echo ($vo['image']); ?>" alt="Ding"  style="display: inline;"><?php endif; ?>
        </a>
            <header><a class="cat" href="<?php echo U('detail',array('aid'=>$vo['id'],'uid'=>$vo['uid']));?>" title="Ding" >Ding/Guo<i></i></a>
                <h2><a href="<?php echo U('detail',array('aid'=>$vo['id'],'uid'=>$vo['uid']));?>" title="Ding" target="_blank" ><?php echo ($vo['title']); ?></a>
                </h2>
            </header>
            <p class="meta">
                <time class="time"><i class="glyphicon glyphicon-time"></i> <?php echo (date('Y-m-d',$vo['creat_time'])); ?></time>
                <!--<span class="views"><i class="glyphicon glyphicon-eye-open"></i> 216</span> <a class="comment" href="<?php echo U('detail',array('aid'=>$vo['id'],'uid'=>$vo['uid']));?>" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i> 4</a>-->
            </p>
            <p class="note"><?php echo ($vo['content']); ?></p>
        </article><?php endforeach; endif; ?>


    </div>
  </div>
  <aside class="sidebar">
    <div class="fixed">
      <div class="widget widget-tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" >咖啡泡柠檬</a></li>
          <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab" >个人中心</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane contact active" id="notice">
              <h2>欢迎来到我的论坛！！！</h2>
              <embed pluginspage="http://www.macromedia.com/go/getflashplayer"
                     type="application/x-shockwave-flash"
                     allowscriptaccess="always"
                     name="honehoneclock"
                     bgcolor="#ffffff"
                     quality="high"
                     src="http://chabudai.sakura.ne.jp/blogparts/honehoneclock/honehone_clock_wh.swf"
                     wmode="transparent"
                     width="160"
                     align="middle"
                     height="70">
          </div>
            <div role="tabpanel" class="tab-pane contact" id="contact">
                <?php if($visitor == 1): ?><h3><a href='/index.php/Home/User/Login'>我要做会员</a></h3>
                    <?php else: ?>
                    <h2>欢迎<?php echo ($userInfo['nickname']); ?>回来！！！</h2><?php endif; ?>
                <embed pluginspage="http://www.macromedia.com/go/getflashplayer"
                       type="application/x-shockwave-flash"
                       allowscriptaccess="always"
                       name="honehoneclock"
                       bgcolor="#ffffff"
                       quality="high"
                       src="http://chabudai.sakura.ne.jp/blogparts/honehoneclock/honehone_clock_wh.swf"
                       wmode="transparent"
                       width="160"
                       align="middle"
                       height="70">
          </div>
        </div>
      </div>
    </div>
    <div class="widget widget_hot">
          <h3>最新帖子</h3>
          <ul>
              <?php if(is_array($info)): foreach($info as $key=>$vo): ?><li><a title="Ding" href="<?php echo U('detail',array('aid'=>$vo['id'],'uid'=>$vo['uid']));?>" ><span class="thumbnail">
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
</body>
</html>