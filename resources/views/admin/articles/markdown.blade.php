@extends('app')

@section('content')
<textarea id="text-input" oninput="this.editor.update()"
          rows="6" cols="60">Type **Markdown** here.</textarea>
<div id="preview"> </div>
<script src="lib/markdown.js"></script>
<script>
  function Editor(input, preview) {
    this.update = function () {
      preview.innerHTML = markdown.toHTML(input.value);
    };
    input.editor = this;
    this.update();
  }
  var $ = function (id) { return document.getElementById(id); };
  new Editor($("text-input"), $("preview"));
</script>
@endsection