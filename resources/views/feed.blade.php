<?php
//var_dump($queries);
?>

<html>
	<head>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="/css/app.css" rel="stylesheet">
        <style>
        body { padding-top: 70px; }</style>
	</head>
	<body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- <a class="navbar-brand" href="#">Brand</a> -->
              <span class="navbar-brand" style="color:white">
                AAUUSS - 澳洲資訊收集器
              </span>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown active">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$activeCity}}<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <?php
                      $para = array();
                      if(!$is_all_cata)
                        $para['cata'] = $cata_tag_id;
                    ?>
                    <li><a href="{{URL::route('feed.index', $para)}}">所有地區</a></li>
                    <li class="divider"></li>
                    @foreach($cities as $city)
                      <li>
                      <?php
                        $para = array('location' => $city->id);
                        if(!$is_all_cata)
                          $para['cata'] = $cata_tag_id;
                      ?>
                        <a href="{{URL::route('feed.index', $para)}}">
                          {{$city->name}}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </li>
                <?php
                  $para = array();
                  if(!$is_all_location)
                    $para['location'] = $location_tag_id;
                ?>
               <!-- <li <?php if($is_all_cata){ ?> class="active" <?php } ?>><a href="{{URL::route('feed.index', $para)}}">所有分類<span class="sr-only">(current)</span></a></li>
                @foreach($otherTags as $tag)
                  <li <?php if($tag->id == $cata_tag_id ){ ?> class="active" <?php } ?> >
                  <?php
                    $para = array('cata' => $tag->id);
                    if(!$is_all_location)
                      $para['location'] = $location_tag_id;
                  ?>
                    <a href="{{URL::route('feed.index', $para)}}">
                      {{$tag->name}}
                    </a>
                  </li>
                @endforeach -->
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:window.location.reload();"><i class="fa fa-repeat fa-lg"></i> 重新整理</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
		<div class="container">
			<div class="content">
				 <table class="table table-condensed">
			      <tbody>
			      @foreach($posts as $post)
			        <tr>
			          <td class="col-md-2">
			          	<img src="{{asset('source_img/'.$post->source->scraper->id.'.png')}}" >
                  </img>
                  <strong>{{$post->source->name}}</strong>
			          </td>
			          <td class="col-md-9">
			          	<a href="{{$post->url}}" target="_blank">
				          	<strong style="color:black">{{$post->title}}</strong>
				          	<!-- <span style="color:grey"> - {{mb_substr($post->content, 0, 70-mb_strlen($post->title), "utf-8")}}</span> -->
                    <?php
                      if( mb_strlen($post->content) > 200 )
                        $content_str = mb_substr($post->content, 0, 200, 'utf-8')."...";
                      else 
                        $content_str = $post->content;
                    ?>
				          	<span style="color:grey"> - {{$content_str}}</span>
			          	</a>
		          		@foreach($post->tags as $tag)
							<span class="label label-default">{{$tag->name}}</span>
		          		@endforeach
			          </td>
			          <?php $postAt = strtotime($post->posted_at) ?>
			          <td class="col-md-1">{{time_elapsed_string($postAt)}}</td>
			        </tr>
			      @endforeach
			      </tbody>
			    </table>
			<?php 
        if($is_all_location)
          echo $posts->render();
        else
          echo $posts->appends(array('location'=>$location_tag_id))->render();
      ?>
			</div>
		</div>    
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>

<?php

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0秒前';
    }

    $a = array( 365 * 24 * 60 * 60  =>  '年',
                 30 * 24 * 60 * 60  =>  '月',
                      24 * 60 * 60  =>  '日',
                           60 * 60  =>  '小時',
                                60  =>  '分',
                                 1  =>  '秒'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . '前';
        }
    }
}
?>