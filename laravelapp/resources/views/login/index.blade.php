@extends('layout.layouts')

@section('title', 'Hello World')

@section('content')
	<div class="container">
		<div class="panel-heading">
			Login Form
		</div>
		<div class="row">
			<div class="container">
				{!! Form::open(['url' => 'loginProcess', 'method' => 'POST','class' => 'form-horizontal']) !!}
				{!! Form::token() !!}
				<div class="row">
					<div class="col-sm-2 center-block">
						{!! Form::label('username', 'Username', ['class' => 'control-label pull-right']) !!}
					</div>
					<div class="col-sm-6 center-block">
						{!! Form::text('username','',['class'=>'control-label pull-left']) !!}
					</div>
					<div class="col-sm-6 center-block">
					</div>
				</div>
				<div class ='row'>
					&nbsp;
				</div>
				<div class="row">
					<div class="col-sm-2 center-block">
						{!! Form::label('password', 'Paswword', ['class' => 'control-label pull-right']) !!}
					</div>
					<div class="col-sm-6 center-block">
						{!! Form::password('password','',['class'=>'control-label pull-left']) !!}
					</div>
					<div class="col-sm-6 center-block">
					</div>
				</div>
				<div class ='row'>
					&nbsp;
				</div>
				<div class="row">
					<div class="col-sm-4 center-block">
						<input type="submit" name="login" value="Login" class="btn btn-info pull-right">
					</div>
					<div class="col-sm-2 center-block">
						<input type="submit" name="register" value="Register" class="btn btn-info pull-right">
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