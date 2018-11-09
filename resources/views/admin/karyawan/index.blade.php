@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Master Data Karyawan</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">#</th>
						<th align="center">Kode Karyawan</th>
						<th align="center">Nama Karayawan</th>
						<th align="center">Kota</th>
						<th align="center">Provinsi</th>
						<th align="center">Gajian</th>
						<th align="center">Tunjangan</th>
						<th align="center">Password</th>
						<th align="center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no = 1; ?>
				@foreach($masterKaryawan as $item)
					<tr>
						<td align="center">{{$no}}</td>
						<td align="center">{{$item->kode_karyawan}}</td>
						<td align="center">
							<a href="{{url('master-karyawan/detail')}}/{{$item->kode_karyawan}}" target="_blank">
								{{$item->nama_karyawan}}
							</a>
						</td>
						<td align="center">{{$item->kota}}</td>
						<td align="center">{{$item->provinsi}}</td>
						<td align="center">
							<a href="{{url('master-karyawan/gajian')}}/{{$item->kode_karyawan}}/edit">Edit Gaji</a>
						</td>
						<td align="center">
							<a href="{{url('master-karyawan/tunjangan/')}}/{{$item->kode_karyawan}}">
								<img src="{{asset('images/icn_search.png')}}" alt="Edit">
							</a>
						</td>
						<td align="center">
							<a href="{{url('password')}}/{{$item->kode_karyawan}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
						</td>
						<td align="center">
							<a href="{{url('master-karyawan')}}/{{$item->kode_karyawan}}/edit">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
					{!! Form::open(array('method' => 'DELETE', 'route' => ['master-karyawan.destroy', $item->kode_karyawan])) !!}
							<input type="submit" value="Delete" onclick="return confirm('Apakah anda yakin ingin mengapus seluruh data Master Karyawan, User, Tunjangan Karyawan dan Absensi dari karyawan: {{$item->nama_karyawan}}?');">
					{!! Form::close() !!}
						</td>
					</tr>
				<?php $no++; ?>
				@endforeach
				</tbody>
			</table>
			{{$masterKaryawan->render()}}
		</div>
		<footer>
		</footer>
	</article>
@endsection