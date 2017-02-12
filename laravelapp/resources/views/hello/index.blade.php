@extends('layout.layouts')

@section('title', 'Hello World')

@section('content')
	<div class="container">
		<div class="row">
			<h4>Hello World Linger</h4>
			<hr/>
		</div>
		<div class="row">
			<div class="container">
				{!! Form::open(['url' => '/submitted', 'method' => 'POST','class' => 'form-horizontal']) !!}
				{!! Form::token() !!}
				<div class="row">
					<div class="col-sm-2 center-block">
						{!! Form::label('title', 'Title', ['class' => 'control-label pull-right']) !!}
					</div>
					<div class="col-sm-4 center-block">
						{!! Form::text('title','',['class'=>'control-label pull-left']) !!}
					</div>
					<div class="col-sm-6 center-block">
					</div>
				</div>
				<div class ='row'>
					&nbsp;
				</div>
				<div class="row">
					<div class="col-sm-2 center-block">
						{!! Form::label('body', 'Body', ['class' => 'control-label pull-right']) !!}
					</div>
					<div class="col-sm-4 center-block">
						{!! Form::textarea('body','',['class'=>'control-label pull-left']) !!}
					</div>
					<div class="col-sm-6 center-block">
					</div>
				</div>
				<div class ='row'>
					&nbsp;
				</div>
				<div class="row">
					<div class="col-sm-6 center-block">
						{!! Form::submit('Submit The Input', ['class'=>'btn btn-info pull-right']) !!}
					</div>
					<div class="col-sm-6 center-block">
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	{!! Html::script('js/hello2.js') !!}
@endpush