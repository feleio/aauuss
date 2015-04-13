<html>
	<head>
		<link href="/css/app.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="content">
				 <table class="table table-condensed">
			      <tbody>
			      @foreach($posts as $post)
			        <tr>
			          <td class="col-md-2">
			          	<strong>{{$post->source->name}}</strong>
			          </td>
			          <td class="col-md-9">
			          	<a href="{{$post->url}}" target="_blank">
				          	<strong style="color:black">{{$post->title}}</strong>
				          	<!-- <span style="color:grey"> - {{mb_substr($post->content, 0, 70-mb_strlen($post->title), "utf-8")}}</span> -->
				          	<span style="color:grey"> - {{$post->content}}</span>
			          	</a>
			          </td>
			          <?php $postAt = strtotime($post->posted_at) ?>
			          <td class="col-md-1">{{time_elapsed_string($postAt)}}</td>
			        </tr>
			      @endforeach
			      </tbody>
			    </table>
			<?php echo $posts->render(); ?>
			</div>
		</div>
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