@extends('layouts.layapps')
@section('content')
		
	@if($mTransaksi->status == 1)
		<h4 class="alert_success">Absen sudah generate. Anda tidak dapat generate absensi lagi.</h4>
	@else
	<article class="module width_full">
		<div class="module_content">
		<form action="{{url('absensi/import')}}" method="POST" enctype="multipart/form-data">
			<fieldset>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<label for="rekap_absen">File CSV Rekap Absen</label>
				<input style="width: 92%; margin-left: 15px;" type="file" name="rekap_absen">
				<input type="submit" value="Import" style="margin: 15px 0 15px 15px;">
			</fieldset>
		</form>
		{!! Form::open(['url' => 'absensi/generate']) !!}
			<input type="hidden" value="{{csrf_token()}}" name="_token">
			<input type="hidden" value="{{$mTransaksi->kode_transaksi}}" name="kode_transaksi">
			Generate Gaji Transaksi: <input type="text" name="kode" value="{{$mTransaksi->kode_transaksi}}" disabled>
			<input type="submit" value="Generate">
		{!! Form::close() !!}
		</div>
	</article>
	@endif
	</div>
	<article class="module width_full">
		<header>
			<h3>List Absensi</h3>
		</header>
		<div class="tab_content">
			@if($mTransaksi->status == 1)

			@else
			<div class="module_content">
				{!! Form::open(['url' => 'absensi/data/create', 'id' => 'createAbsens']) !!}
				<fieldset>
					<input type="hidden" value="{{$mTransaksi->kode_transaksi}}" name="kode_transaksi">
					<a style="margin-left: 2%;" onclick="document.getElementById('createAbsens').submit()">Tambah Data Absen Manual</a>
				</fieldset>
				{!! Form::close() !!}
			</div>
			@endif
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">Kode Transaksi</th>
						<th align="center">Kode Karyawan</th>
						<th align="center">Nama Karyawan</th>
						<th align="center">Masuk Kerja</th>
						<th align="center">Absen Kerja</th>
						@if($mTransaksi->status == 1)
						<th align="center">Lihat Gaji</th>
						@else
						<th align="center">Aksi</th>
						@endif
					</tr>
				</thead>
				<tbody>
				@foreach($mAbsen as $item)
					<tr align="center">
						<td>{{$item->kode_transaksi}}</td>
						<td>{{$item->kode_karyawan}}</td>
						<td>{{$item->mKaryawan->nama_karyawan}}</td>
						<td>{{$item->masuk}} hari</td>
						<td>{{$item->absen}} hari</td>
						@if($mTransaksi->status == 1)
						<td>
							<a href="{{url('gajian/detail')}}/{{$item->kode_transaksi}}{{$item->kode_karyawan}}">Lihat</a>
						</td>
						@else
						<td>
							<a href="{{url('absensi')}}/data/{{$item->id}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
						{!! Form::open(array('method' => 'DELETE', 'route' => ['absensi.destroy', $item->id])) !!}
								<input type="submit" value="Delete" onclick="return confirm('Apakah anda yakin ingin menghapus data absensi dari: {{$item->mKaryawan->nama_karyawan}}?');">
						{!! Form::close() !!}
						</td>
						@endif
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
