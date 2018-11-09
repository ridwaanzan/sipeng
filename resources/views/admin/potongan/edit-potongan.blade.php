@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Edit Master Data Potongan: {{$master->nama_potongan}}</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($master, ['method' => 'PATCH', 'route' => ['master-potongan.update', $master->kode_potongan]]) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="nama_potongan">Nama Potongan</label>
					<input style="width: 92%;" value="{{$master->nama_potongan}}" type="text" name="nama_potongan" placeholder="Nama Potongan. Ex: Uang Makan">
					<input type="hidden" name="kode_potongan" value="{{$master->kode_potongan}}">
				</fieldset>
				<fieldset style="width: 48%; float: left;">
					<label for="status">Status Potongan</label>
					<select name="status" id="status">
						<option>-== Pilih Status Potongan ==-</option>
						<option value="1" @if($master->status == 1) {{'selected'}} @endif>Aktif</option>
						<option value="2" @if($master->status == 2) {{'selected'}} @endif>Non-Aktif</option>
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