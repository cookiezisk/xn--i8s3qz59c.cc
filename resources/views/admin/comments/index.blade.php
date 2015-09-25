@extends('app')

@section('content')
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home">首页</a></li>
  <li><a href="#profile">Profile</a></li>
  <li><a href="#messages">Messages</a></li>
  <li><a href="#settings">Settings</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="home">...</div>
  <div class="tab-pane" id="profile">...</div>
  <div class="tab-pane" id="messages">...</div>
  <div class="tab-pane" id="settings">...</div>
</div>
<script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#comment-type">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">管理评论</a>
          </div>
          <div class="collapse navbar-collapse" id="comment-type-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Pages</a></li>
              <li><a href="#">Articles</a></li>
            </ul>
          </div>
        </nav>
        <div class="panel-body">

        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-4">Content</th>
            <th class="col-lg-2">User</th>
            <th class="col-lg-4">Page</th>
            <th class="col-lg-1">编辑</th>
            <th class="col-lg-1">删除</th>
          </tr>
          @foreach ($comments as $comment)
            <tr class="row">
              <td class="col-lg-6">
                {{ $comment->content }}
              </td>
              <td class="col-lg-2">
                @if ($comment->website)
                  <a href="{{ $comment->website }}">
                    <h4>{{ $comment->nickname }}</h4>
                  </a>
                @else
                  <h3>{{ $comment->nickname }}</h3>
                @endif
                {{ $comment->email }}
              </td>
              <td class="col-lg-4">
                <a href="{{ URL('pages/'.$comment->page_id) }}" target="_blank">
                  {{ App\Page::find($comment->page_id)->title }}
                </a>
              </td>
              <td class="col-lg-1">
                <a href="{{ URL('admin/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
              </td>
              <td class="col-lg-1">
                <form action="{{ URL('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection