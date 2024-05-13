<?php
//传入字符串，去掉首尾的换行和空字符，将中间的\n换为<br>   用于生成html
function deal_context($str)
{
  return str_replace("\r\n", "<br>", trim($str));
}


$str_list = file_get_contents("tangshi_list.data");
$t_str_list = explode("===",$str_list);
$list = array();

foreach($t_str_list as $poem)
{
    if(trim($poem) == "")
    {
        continue;
    }
    $t_poem = explode("---",$poem);
    $t_content = explode("\r\n",$t_poem[0]);
    // foreach($t_content as $tt)
    // {
    //     echo $tt . "<br>";
    // }
    //echo $t_content[0];

    $item = array();
    $item["type"] = trim($t_content[1]); //类型
    $item["title"] = trim($t_content[2]); //标题
    $item["author"] = trim($t_content[3]); //作者
    $item["content"] = ""; //内容
    for($i = 4; $i < count($t_content); $i++)
    {
      if(trim($t_content[$i]) == "")
      {
        continue;
      }
      $item["content"] .= trim($t_content[$i]) . "\r\n"; 
    }

    $item["content"] = deal_context($item["content"]);

    $item["tip"] = "<p>" . str_replace("<br>", "</p><p>", deal_context($t_poem[1])) . "</p>";
    $item["tran"] = "<p class='tran'>" . str_replace("<br>", "</p><p class='tran'>", deal_context($t_poem[2])) . "</p>";
    $item["intro"] = "<p>" . str_replace("<br>", "</p><p>", deal_context($t_poem[3])) . "</p>";


    $list[] = $item;
}



$str_author = file_get_contents("tangshi_author.data");
$t_str_author = explode("===",$str_author);
$author_list = array();
foreach($t_str_author as $author)
{
    if(trim($author) == "")
    {
        continue;
    }
    $t_author = explode("\r\n", $author);
    $item = array();
    $item["name"] = trim($t_author[1]);
    $item["intro"] = "";
    for($i = 2; $i < count($t_author); $i++)
    {
      if(trim($t_author[$i]) == "")
      {
        continue;
      }
      $item["intro"] .= trim($t_author[$i]) . "\r\n";
    }
    $item["intro"] = "<p>" . str_replace("<br>", "</p><p>", deal_context($item["intro"])) . "</p>";
    $author_list[] = $item;
}


$j5 = 0;
$j7 = 0;
$l5 = 0;
$l7 = 0;
$g5 = 0;
$g7 = 0;
$yf = 0;

$nav = array();
$nav["j5"] = array();
$nav["j5"]["name"] = "五言绝句";
$nav["j5"]["list"] = array();
$nav["j7"] = array();
$nav["j7"]["name"] = "七言绝句";
$nav["j7"]["list"] = array();
$nav["l5"] = array();
$nav["l5"]["name"] = "五言律诗";
$nav["l5"]["list"] = array();
$nav["l7"] = array();
$nav["l7"]["name"] = "七言律诗";
$nav["l7"]["list"] = array();
$nav["g5"] = array();
$nav["g5"]["name"] = "五言古诗";
$nav["g5"]["list"] = array();
$nav["g7"] = array();
$nav["g7"]["name"] = "七言古诗";
$nav["g7"]["list"] = array();
$nav["yf"] = array();
$nav["yf"]["name"] = "乐府";
$nav["yf"]["list"] = array();


foreach($list as &$item)
{
  if($item["type"] == "五言绝句")
  {
    $j5++;
    if($j5 < 10)
    {
      $item["id"] = "j50" . strval($j5);
    }
    else
    {
      $item["id"] = "j5" . strval($j5);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["j5"]["list"][] = $tmp;
  }
  else if($item["type"] == "七言绝句")
  {
    $j7++;
    if($j7 < 10)
    {
      $item["id"] = "j70" . strval($j7);
    }
    else
    {
      $item["id"] = "j7" . strval($j7);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["j7"]["list"][] = $tmp;
  }
  else if($item["type"] == "五言律诗")
  {
    $l5++;
    if($l5 < 10)
    {
      $item["id"] = "l50" . strval($l5);
    }
    else
    {
      $item["id"] = "l5" . strval($l5);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["l5"]["list"][] = $tmp;
  }
  else if($item["type"] == "七言律诗")
  {
    $l7++;
    if($l7 < 10)
    {
      $item["id"] = "l70" . strval($l7);
    }
    else
    {
      $item["id"] = "l7" . strval($l7);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["l7"]["list"][] = $tmp;
  }
  else if($item["type"] == "五言古诗")
  {
    $g5++;
    if($g5 < 10)
    {
      $item["id"] = "g50" . strval($g5);
    }
    else
    {
      $item["id"] = "g5" . strval($g5);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["g5"]["list"][] = $tmp;
  }
  else if($item["type"] == "七言古诗")
  {
    $g7++;
    if($g7 < 10)
    {
      $item["id"] = "g70" . strval($g7);
    }
    else
    {
      $item["id"] = "g7" . strval($g7);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["g7"]["list"][] = $tmp;
  }
  else if($item["type"] == "乐府")
  {
    $yf++;
    if($yf < 10)
    {
      $item["id"] = "yf0" . strval($yf);
    }
    else
    {
      $item["id"] = "yf" . strval($yf);
    }
    $tmp = array();
    $tmp["id"] = $item["id"];
    $tmp["title"] = $item["title"];
    $nav["yf"]["list"][] = $tmp;
  }
}

unset($item);


?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
  <!--使用 html5 boilerplate  模板，去掉了图标之类的 https://github.com/h5bp/html5-boilerplate !-->
  <meta charset="utf-8">
  <title>唐诗三百首</title>
  <meta name="description" content="最方便的唐诗三百首，便于翻阅背诵记忆">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- 搜索引擎能搜索到的词，每个词之间用逗号,隔开，必须是英文的逗号 !-->
  <meta name="keywords" content="唐诗,三百首,方便,简洁,易用,好记">
  <!-- 以下为方便分享到facebook的标签，没什么用，注释掉 !-->
  <!--meta property="og:title" content="唐诗三百首">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content=""!-->

  <!--安卓版Chrome的状态栏主题色,也仅仅被安卓版的Chrome所支持 !-->
  <meta name="theme-color" content="#fafafa">
  <!--设置页面资源缓存 此页面用不着，注释掉，具体用法可见 https://zhuanlan.zhihu.com/p/29774741 !-->
  <!--link rel="manifest" href="site.webmanifest"!-->

  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
  <!-- Normalize.css 使浏览器呈现所有 HTML 元素更加一致，并且符合现代 web 标准。Normalize.css 只作用于需要规范化的样式。 !-->
  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/normalize/8.0.1/normalize.min.css">
  <!-- pushy侧边栏菜单插件 !-->
  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/pushy/1.3.0/css/pushy.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- scrollup 回到顶部功能 !-->
  <script src="https://cdn.bootcdn.net/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js"></script>

    <style type="text/css">
    /*  选择父级是span class='tip'或'tran'的p元素  即诗词赏析段落之前空两格 */
    span.intro>p { text-indent:2em;}
    /*  选择父级是span class='tip'或'tran'的p元素，设置格式，即诗词注解、译文段落之前空两格 缩短行距  */
    span.tip>p,
    span.tran>p { text-indent:2em; margin-bottom: 0px;}

    body.modal-open {
        /*解决bootstrap弹出modal之后滚动到顶端的问题 */
        position: absolute !important;
        /*解决pc端点击modal，页面宽度出错的问题 */
        position: fixed; width: 100%;
    }

        /* 设定各种题材诗歌的卡片颜色 */    
    .card-5j{border-left-color:#007bff; border-left-width:.3rem}
    .card-7j{border-left-color:#28a745; border-left-width:.3rem}
    .card-5l{border-left-color:#dc3545; border-left-width:.3rem}
    .card-7l{border-left-color:#ffc107; border-left-width:.3rem}
    .card-5g{border-left-color:#17a2b8; border-left-width:.3rem}
    .card-7g{border-left-color:#343a40; border-left-width:.3rem}
    .card-yf{border-left-color:#007bff; border-left-width:.3rem}

    .blockquote{font-size: 17px;margin-top: 10px;}

    /* pushy 的弹出菜单，默认最大高度为1000px; 而本页面诗歌列表过长会出现显示错误，所以设定最大高度为5000px; */
    .pushy-submenu-open > ul {max-height: 5000px;visibility: visible;}   

    /* scrollUp的模板 圆形向上箭头*/
    #scrollUp{bottom:20px;right:20px;width:38px;height:38px;background:url(https://s3.ax1x.com/2020/11/21/DlyvqI.png) no-repeat}

    /* 设置全文字体 */
    pre { font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu }
    </style>
</head>
<!-- body 加上一条 onhashchange 目的是解决导航栏 fixed-top 后，锚点定位时遮挡问题 参见https://www.cnblogs.com/santiego/p/10361494.html !-->
<body style="background: #fcfaf9;margin-top: 70px;" onhashchange="fix_the_nav();">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container" style="padding-left: 30px; ">
        <div class="row">
          <span style="color:white;font-size: 21px;">唐诗三百首</span>
      <!--a class="navbar-brand js-scroll-trigger" href="tangshi.html">唐诗&nbsp;&nbsp;</a>
      <a class="navbar-brand js-scroll-trigger" href="songci.html">宋词&nbsp;&nbsp;</a>
      <a class="navbar-brand js-scroll-trigger" href="yuanqu.html">元曲&nbsp;&nbsp;</a!-->
  </div>
<button class="menu-btn btn" style="float: right;color: white;font-size: 23px;">&#9776;&nbsp;&nbsp;目录</button>
    </div>
  </nav>




        <nav class="pushy pushy-left">
            <div class="pushy-content">
    <!--  list-unstyled 去掉bootstrap li列表前方的小圆点 !-->
    <ul class="list-unstyled">
    <!-- Submenu -->
      <?php
      foreach($nav as $ul)
      {
        if(count($ul) == 0)
        {
          continue;
        }
        echo "<li class='pushy-submenu'>\n<button>" . $ul["name"] . "</button>\n<ul class='list-unstyled'>\n";
        foreach($ul["list"] as $li)
        {
          echo '<li class="pushy-link"><a href="#' . $li["id"] . '">' . $li["title"] . "</a></li>\n";
        }
        echo '</ul></li>';
      }
      ?>
  </ul>
            </div>
        </nav>




        <!-- Site Overlay -->
        <div class="site-overlay"></div>






<div class="alert alert-primary" role="alert">
点击作者名可以查看作者信息，点击文字部分可以查看作品译文、注解、赏析等内容。
</div>








<?php
foreach($author_list as $author)
{
?>
<!-- Modal -->
<div class="modal fade" id="<?php echo $author["name"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $author["name"]; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php echo $author["intro"]; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>




<div class="container">

<!-- 作者名称所在的 <a>标签之内，前方多加一个href="#" 解决safari下无法弹出modal的问题-->
<?php
foreach($list as $item)
{


?>
<div 
<?php
    if($item["type"] == "五言绝句")
    {
      echo 'class="card card-5j"';
    }
    else if($item["type"] == "七言绝句")
    {
      echo 'class="card card-7j"';
    }
    else if($item["type"] == "五言律诗")
    {
      echo 'class="card card-5l"';
    }
    else if($item["type"] == "七言律诗")
    {
      echo 'class="card card-7l"';
    }
    else if($item["type"] == "五言古诗")
    {
      echo 'class="card card-5g"';
    }
    else if($item["type"] == "七言古诗")
    {
      echo 'class="card card-7g"';
    }
    else if($item["type"] == "乐府")
    {
      echo 'class="card card-yf"';
    }

?> id='<?php echo $item["id"]; ?>'>
  <div class="card-body">    
    <h5><?php  echo $item["title"];?>
    <?php 
    if($item["type"] == "五言绝句")
    {
      echo '<span class="badge badge-primary" style="float: right;">五言绝句</span>';
    }
    else if($item["type"] == "七言绝句")
    {
      echo '<span class="badge badge-success" style="float: right;">七言绝句</span>';
    }
    else if($item["type"] == "五言律诗")
    {
      echo '<span class="badge badge-danger" style="float: right;">五言律诗</span>';
    }
    else if($item["type"] == "七言律诗")
    {
      echo '<span class="badge badge-warning" style="float: right;">七言律诗</span>';
    }
    else if($item["type"] == "五言古诗")
    {
      echo '<span class="badge badge-info" style="float: right;">五言古诗</span>';
    }
    else if($item["type"] == "七言古诗")
    {
      echo '<span class="badge badge-dark" style="float: right;">七言古诗</span>';
    }
    else if($item["type"] == "乐府")
    {
      echo '<span class="badge badge-primary" style="float: right;">乐府</span>';
    }
    ?></h5><h5>
    <a href="#" data-toggle="modal" data-target="#<?php echo $item["author"]; ?>"><?php echo $item["author"]; ?></a></h5>
    <blockquote class="blockquote mb-0">
<div data-toggle="collapse" href="<?php echo "#collapse" . $item["id"]; ?>" role="button" aria-expanded="false" aria-controls="<?php echo "collapse" . $item["id"]; ?>">
<?php echo $item["content"]; ?>
</div>
    </blockquote>
  </div>
</div>

<div class="collapse" id="<?php echo "collapse" . $item["id"]; ?>">
  <div class="card card-body">
<h5>注解</h5>
<span style="margin-bottom: 20px;" class="tip"><?php echo $item["tip"]; ?></span>
<h5>译文</h5>
<span style="margin-bottom: 20px;" class="tran"><?php echo $item["tran"]; ?></span>
<h5>赏析</h5>
<span class="intro"><?php echo $item["intro"]; ?></span>
  </div>
</div>
<br>
<?php
}
?>




</div> <!--container end !-->











<div class="text-center container">
<div class="alert alert-primary" role="alert">
如果觉得这个页面不错，可以使用QQ扫描下面的二维码捐助我的工作<br>
有什么意见和建议可以加我QQ: 3206104913
</div>
<!-- 图片放在了免费图床 https://imgchr.com/ !-->
<a href="https://imgchr.com/i/Dlss9e"><img src="https://s3.ax1x.com/2020/11/21/Dlss9e.md.jpg" alt="Dlss9e.jpg" border="0" class="img-thumbnail" /></a>
</div>

<!--使用 蝴蝶计数器 https://www.bfcounter.vip/ !-->
<div class="text-center container">
  <br>
  本页面总计访问人数：<br>
  <a href="https://www.bfcounter.vip/"><img src="https://www.bfcounter.vip/generatepic?userid=098be07b-c4a0-48e5-a017-727083dfef6d" alt="Page Counter" border="0"></a>
</div>

  <!-- bootstrap !--->
  <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
  <!--Modernizr 是一个 JavaScript 库，用于检测用户浏览器的 HTML5 与 CSS3 特性。 https://github.com/Modernizr/Modernizr  !-->
  <script src="https://cdn.bootcdn.net/ajax/libs/modernizr/2010.07.06dev/modernizr.min.js"></script>
  <!-- pushy 左侧弹出菜单 !-->
  <script src="https://cdn.bootcdn.net/ajax/libs/pushy/1.3.0/js/pushy.min.js"></script>


  <script type="text/javascript">
//滚动回顶部的功能
$(function () {        
  $.scrollUp({
      animation: 'fade',
      scrollImg: { active: true, type: 'background', src: 'https://s3.ax1x.com/2020/11/21/DlyvqI.png' }
  });
  $('[data-toggle="popover"]').popover();
});

//解决导航栏 fixed-top 后，锚点定位时遮挡问题 参见https://www.cnblogs.com/santiego/p/10361494.html
function fix_the_nav() {
    if(window.location.hash){
            var target = $(location.hash);
            $("body,html").scrollTop(target.offset().top-100); // my nav size is 100px
    }
}
  </script>
</body>




</html>