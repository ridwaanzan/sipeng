@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Ubah Data Departemen</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($departemen, ['method' => 'PATCH', 'route' => ['master-departemen.update', $departemen->kode_departemen]]) !!}
				<input type="hidden" name="kode_departemen" value="{{$departemen->kode_departemen}}">
				<fieldset>
					<label for="nama_departemen">Nama Departemen</label>
					<input type="text" value="{{$departemen->nama_departemen}}" name="nama_departemen">
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