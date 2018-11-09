@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>List Slip Gaji</h3>
		</header>
		<div class="tab_content">
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">No. Slip</th>
						<th align="center">Tanggal</th>
						<th align="center">Kode Transaksi</th>
						<th align="center">Gaji Pokok</th>
						<th align="center">Total Tunjangan</th>
						<th align="center">Total THP</th>
						<th align="center">Lihat Detail</th>
					</tr>
				</thead>
				<tbody>
				@foreach($mGajian as $item)
					<tr align="center">
						<td>{{$item->kode_transaksi}}{{$item->kode_karyawan}}</td>
						<td>
							@php
								echo date('d-m-Y', strtotime($item->tanggal));
							@endphp
						</td>
						<td>{{$item->kode_transaksi}}</td>
						<td>Rp. {{number_format($item->gaji_pokok)}}</td>
						<td>Rp. {{number_format($item->total_tunjangan)}}</td>
						<td>Rp. {{number_format($item->total_gaji)}}</td>
						<td>
							<a href="{{url('gajian')}}/detail/{{$item->kode_transaksi}}{{$item->kode_karyawan}}" target="_blank">
								Lihat
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{$mGajian->render()}}
		</div>
		<footer>
		</footer>
	</article>

@endsection
