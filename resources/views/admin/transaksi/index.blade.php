@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Master Data Transaksi</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">No.</th>
						<th align="center">Kode Transaksi</th>
						<th align="center">Tanggal Transaksi</th>
						<th align="center">Status</th>
						<th align="center">Absensi</th>
						<th align="center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				@if(!$mTransaksi->count())
					<tr>
						<td colspan="4" align="center">
							Belum ada master data transaksi yang dibuat.
						</td>
					</tr>
				@else
					<?php $no = 1; ?>
					@foreach($mTransaksi as $item)
						<tr align="center">
							<td>{{$no}}</td>
							<td>{{$item->kode_transaksi}}</td>
							<td>{{$item->tgl_transaksi}}</td>
							<td>
								@if($item->status == 1)
									Approved
								@else
									Pending
								@endif
							</td>
							<td>
								<a href="{{url('absensi')}}/{{$item->kode_transaksi}}">
									<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
								</a>
							</td>
							<td>
								<a href="{{url('master-transaksi')}}/{{$item->kode_transaksi}}">
									<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
								</a>
						{!! Form::open(array('method' => 'DELETE', 'route' => ['master-transaksi.destroy', $item->kode_transaksi])) !!}
								<input type="submit" value="Delete" onclick='return confirm("Apakah anda yakin ingin menghapus master data transaksi: {{$item->kode_transaksi}}");'>
						{!! Form::close() !!}
							</td>
						</tr>
					<?php $no++; ?>
					@endforeach
				@endif
				</tbody>
			</table>
			{{$mTransaksi->render()}}
		</div>
		<footer>
			<a style="margin-left:  5px; margin-top: 5px;" href="{{url('master-transaksi/create')}}">
				<button>
					Tambah Master Transaksi
				</button>
			</a>
		</footer>
	</article>
@endsection