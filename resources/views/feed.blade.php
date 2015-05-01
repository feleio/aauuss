@extends('app')

@section('nav_left')
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
@endsection

@section('nav_right')
                <li><a href="#">資訊來源不斷增加中..</a></li>
                <li><a href="#"><i class="fa fa-plus fa-lg"></i> 提供來源</a></li>
                <li><a href="javascript:window.location.reload();"><i class="fa fa-repeat fa-lg"></i> 重新整理</a></li>
@endsection

@section('content')
            <div class="container">
              @foreach($posts as $post)
                <div class="row show-grid">
                  <div class="hidden-xs col-sm-2 col-md-2 col-lg-2">
                    <img src="{{asset('source_img/'.$post->source->scraper->id.'.png')}}" >
                    </img>
                    <strong>{{$post->source->name}}</strong>
                  </div>
                  <div class="hidden-xs col-sm-8 col-md-9 col-lg-9">
                    <a href="{{$post->url}}" target="_blank">
                      <strong style="color:black">{{$post->title}}</strong>
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
                  </div>
                  <div class="visible-xs col-xs-12 hidden-sm hidden-md hidden-lg">
                    <a href="{{$post->url}}" target="_blank">
                      <strong style="color:black">{{$post->title}}</strong>
                      <?php
                        if( mb_strlen($post->content) > 40 )
                          $content_str = mb_substr($post->content, 0, 40, 'utf-8')."...";
                        else 
                          $content_str = $post->content;
                      ?>
                      <span style="color:grey"> - {{$content_str}}</span>
                    </a>
                    @foreach($post->tags as $tag)
                      <span class="label label-default">{{$tag->name}}</span>
                    @endforeach
                  </div>
                  <div class="visibl-xs col-xs-12 hidden-sm hidden-md hidden-lg">
                    <img src="{{asset('source_img/'.$post->source->scraper->id.'.png')}}" >
                    </img>
                    <strong>{{$post->source->name}}</strong>
                  </div>
                  <?php $postAt = strtotime($post->posted_at) ?>
                  <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1">{{time_elapsed_string($postAt)}}</div>
                </div>
              @endforeach
            </div>
            <?php 
            if($is_all_location)
              echo $posts->render();
            else
              echo $posts->appends(array('location'=>$location_tag_id))->render();
            ?>


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
@endsection