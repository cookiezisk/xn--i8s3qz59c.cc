@extends('app')

@section('content')

<!Doctype html>
<html lang="en">
<head>

<meta charset="utf-8"/>
<title>a make down editor</title>

<link type="text/css" rel="stylesheet" href="/js/markdownsk/css/font-awesome/css/font-awesome.css"/>
<link type="text/css" rel="stylesheet" href="/js/markdownsk/css/codemirror.css"/>
<link type="text/css" rel="stylesheet" href="/js/markdownsk/css/highlight/xcode.css"/>
<link type="text/css" rel="stylesheet" href="/js/markdownsk/css/amd.css"/>
<link type="text/css" rel="stylesheet" href="/js/markdownsk/css/markdown.css"/>

<script src="/js/markdownsk/js/codemirror/lib/codemirror.js"></script>
<script src="/js/markdownsk/js/codemirror/mode/markdown/markdown.js"></script>
<script src="/js/markdownsk/js/hogan-3.0.1.min.js"></script>
<script src="/js/markdownsk/js/marked-0.3.2.min.js"></script>
<script src="/js/markdownsk/js/highlight-8.1.0.min.js"></script>
<script src="/js/markdownsk/js/pie/pie.js"></script>
<script src="/js/markdownsk/js/pie/unit.js"></script>
<script src="/js/markdownsk/js/pie/amarkdown.js"></script>

</head>
<body>

<div id="amd-editor"></div>

<script>
(function (PIE) {
window.addEventListener('load', function () {
    PIE.makeAMarkdown(document.getElementById('amd-editor'), {
      imgAction: '/image',
        pubAction: '/',
        titleName: 'title',
        textName: 'text'
    });
});
}(PIE));
</script>
</body>
</html>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增 Article</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/articles') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="title" class="form-control" required="required">
            <br>
            <textarea name="body" rows="10" class="form-control" required="required"></textarea>
            <br>
            <button class="btn btn-lg btn-info">新增 Article</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection