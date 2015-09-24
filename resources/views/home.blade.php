@extends('_layouts.default')

@section('content')
<div id="content">
	<div id="contentleft">
		@foreach ($pages as $page)
		<div class="m-post">
			<h2 class="title">
				<a href="{{ URL('pages/'.$page->id) }}">{{ $page->title }}</a>
			</h2>
			<div class="info box">
				<a class="date" href="{{ URL('pages/'.$page->id) }}">{{ $page->updated_at }}</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
