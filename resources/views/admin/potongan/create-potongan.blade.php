@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Tambah Master Data Potongan</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::open(['url' => 'master-potongan']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="nama_potongan">Nama Potongan</label>
					<input style="width: 92%;" value="{{old('nama_potongan')}}" type="text" name="nama_potongan" placeholder="Nama Potongan. Ex: Uang Makan">
				</fieldset>
				<fieldset style="width: 48%; float: left;">
					<label for="status">Status Potongan</label>
					<select name="status" id="status">
						<option>-== Pilih Status Potongan ==-</option>
						<option value="1" @if(old('status') == 1) {{'selected'}} @endif>Aktif</option>
						<option value="2" @if(old('status') == 2) {{'selected'}} @endif>Non-Aktif</option>
					</select>
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