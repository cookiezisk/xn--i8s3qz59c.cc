@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">管理评论</div>

        <div class="panel-body">

        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-4">Content</th>
            <th class="col-lg-2">User</th>
            <th class="col-lg-4">Article</th>
            <th class="col-lg-1">编辑</th>
            <th class="col-lg-1">删除</th>
          </tr>
          @foreach ($articles as $article)
            <tr class="row">
              <td class="col-lg-4">
                {{ $article->body }}
              </td>
              <td class="col-lg-2">
                @if ($article->website)
                  <a href="{{ $article->website }}">
                    <h4>{{ $article->nickname }}</h4>
                  </a>
                @else
                  <h3>{{ $article->nickname }}</h3>
                @endif
                {{ $article->email }}
              </td>
              <td class="col-lg-4">
                <a href="{{ URL('articles/'.$article->article_id) }}" target="_blank">
                  {{ App\Comment::find($article->article_id)->title }}
                </a>
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
@endsection