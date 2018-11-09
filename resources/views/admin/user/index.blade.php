@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>
				Data diri anda:
			</h3>
		</header>
		<div class="module_content">
			<table>
				<tr>
					<td>NIK / Kode Karyawan</td>
					<td>{{$master->kode_karyawan}}</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>{{$master->nama_karyawan}}</td>
				</tr>
				<tr>
					<td>Jabatan</td>
					@foreach($jabatan as $jabatan)
						@if($jabatan->kode_jabatan == $master->kode_jabatan)
							<td>{{$master->nama_karyawan}}</td>
						@endif
					@endforeach
				</tr>
				<tr>
					<td>Alamat</td>
				</tr>
			</table>
		</div>
	</article>
@endsection