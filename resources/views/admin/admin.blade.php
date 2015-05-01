@extends('app')


@section('nav_left')
                <li class="dropdown active">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">主題<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('back/status')}}">Status</a></li>
                    <li class="divider"></li>
                    <li><a href="{{URL::to('back/tagreview')}}">tag Review</a></li>
                  </ul>
                </li>
                <li><a class="active" href="#">資訊來</a></li>
                <li><a href="#">ABCD</a></li>
@endsection

@section('nav_right')
                <li><a href="#">中..</a></li>
                <li><a href="#"><i class="fa fa-plus fa-lg"></i> 提供來源</a></li>
                <li><a href="javascript:window.location.reload();"><i class="fa fa-repeat fa-lg"></i> 重新整理</a></li>
@endsection

