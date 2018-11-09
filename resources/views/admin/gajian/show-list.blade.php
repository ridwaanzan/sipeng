@extends('layouts.layapps')
@section('content') 
	<div style="margin: auto 25px; width: 450px;">
		<form action="{{url('absensi/import')}}" method="POST" enctype="multipart/form-data">
			<fieldset>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<label for="rekap_absen">File CSV Rekap Absen</label>
				<input style="width: 92%; margin-left: 15px;" type="file" name="rekap_absen">
				<input type="submit" value="Import" style="margin: 15px 0 15px 15px;">
			</fieldset>
		</form>
	</div>
	<div style="margin: auto 25px; width: 450px;">
		<form action="{{url('SearchByKoTrans')}}" method="POST">
			<input type="hidden" value="{{csrf_token()}}" name="_token">
			Search By Kode Transaksi: <input type="text" name="search">
		</form>
	</div>
	<article class="module width_full">
		<header>
			<h3>List Absensi</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th>Kode Transaksi</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th>Masuk Kerja</th>
						<th>Absen Kerja</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				@foreach($mAbsen as $item)
					<tr>
						<td>{{$item->kode_transaksi}}</td>
						<td>{{$item->kode_karyawan}}</td>
						<td>{{$item->mKaryawan->nama_karyawan}}</td>
						<th>{{$item->masuk}} hari</th>
						<th>{{$item->absen}} hari</th>
						<td>
							<a href="{{url('absensi')}}/{{$item->kode_transaksi}}/{{$item->kode_karyawan}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
						{!! Form::open(array('method' => 'DELETE', 'route' => ['master-jabatan.destroy', $item->id])) !!}
								<input type="submit" value="Delete">
						{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{$mAbsen->render()}}
		</div>
		<footer>			
		</footer>
	</article>

@endsection