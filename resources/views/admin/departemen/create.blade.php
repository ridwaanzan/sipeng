@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Tambah Data Departemen</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::open(['url' => 'master-departemen']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_departemen">Kode Departemen</label>
					<input style="width: 92%;" type="text" name="kode_departemen" placeholder="ex: DPT-001">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="nama_departemen">Nama Departemen / Divisi</label>
					<input style="width: 92%;" type="text" name="nama_departemen" placeholder="ex: Keberangkatan">
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