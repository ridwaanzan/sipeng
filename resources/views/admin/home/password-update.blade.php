@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Update Password: {{$load->name}}</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($load, ['method' => 'PATCH', 'route' => ['password.update', $load->id]]) !!}
				<fieldset>
					<input type="hidden" name="id" value="{{$load->id}}">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="provinsi">Password</label>
					<input style="width: 92%;" type="password" placeholder="Password" name="password">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="password2">Confirm Password</label>
					<input style="width: 92%;" type="password" placeholder="Confirm Password" name="password2">
				</fieldset>
				<div class="clear"></div>
			</div>
		</div>
		<footer>
			<div class="submit_link">
				<input type="submit" value="Publish">
			</div>
			{!! Form::close() !!}
		</footer>
	</article>
@endsection