@extends('layout.layouts')

@section('title', 'Hello World')

@section('content')
	<div class="container">
		<table class='table'>
			<thead>
				<tr>
					<th>PostID</th>
					<th>Title</th>
					<th>Body</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ $post->text }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		{!! $posts->links() !!}
	</div>
@endsection

@push('scripts')
	{!! Html::script('js/hello2.js') !!}
@endpush