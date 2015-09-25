@extends('app')

@section('content')
<div class="container">
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#page_comments">Page</a></li>
    <li><a href="#article_comments">Article</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane" id="page_comments">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
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
    <div class="tab-pane" id="article_comments">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-striped">
                <tr class="row">
                  <th class="col-lg-4">Title</th>
                  <th class="col-lg-2">User</th>
                  <th class="col-lg-4">Content</th>
                  <th class="col-lg-1">编辑</th>
                  <th class="col-lg-1">删除</th>
                </tr>
                @foreach ($articles as $article)
                  <tr class="row">
                    <td class="col-lg-6">
                      {{ $article->title }}
                    </td>
                    <td class="col-lg-2">
                      @if ($article->website)
                        <a href="{{ $article->website }}">
                          <h4>小王子</h4>
                        </a>
                      @else
                        <h4>小王子</h4>
                      @endif
                    </td>
                    <td class="col-lg-4">
                      {{ $article->body }}
                    </td>
                    <td class="col-lg-1">
                      <a href="{{ URL('admin/articles/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                    </td>
                    <td class="col-lg-1">
                      <form action="{{ URL('admin/articles/'.$article->id) }}" method="POST" style="display: inline;">
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
  </div>
</div>
{{ HTML::script('js/xwz/comment.js') }}
@endsection