@extends('layouts.layapps')
@section('content') 

	<article class="module width_full">
		<header>
			<h3>Detail Tunjangan dan Gaji Karyawan : {{$master->nama_karyawan}}</h3>
		</header>
		<div class="module_content">
			<table>
				<tr>
					<td>Kode Karyawan</td>
					<td> : </td>
					<td><b>{{$master->kode_karyawan}}</b></td>
				</tr>
				<tr>
					<td>Nama Karyawan</td>
					<td> : </td>
					<td><b>{{$master->nama_karyawan}}</b></td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td> : </td>
					<td>
					@foreach($jabatan as $item)
						@if($master->kode_jabatan == $item->kode_jabatan)
							<b>{{$item->nama_jabatan}}</b>
						@else
						@endif
					@endforeach
					</td>
				</tr>
			</table>

			<div class="spacer"></div>
			<table>
			@foreach($master->dataTunjangan as $items)
				@foreach($mtunjangan as $mtun)
				@if($mtun->kode_tunjangan == $items->kode_tunjangan)
				<tr>
					<td>{{$mtun->nama_tunjangan}}</td>
					<td> : </td>
					<td><b class="uang">Rp. {{number_format($items->jumlah)}}</b></td>
				</tr>
				@endif
				@endforeach
			@endforeach
				<tr>
					<td>GAJI POKOK</td>
					<td> : </td>
					<td><b class="uang">Rp. {{number_format($gaji->gaji_pokok)}}</b></td>
				</tr>
			</table>
		</div>
		<footer>
			<a href="{{url($master->kode_karyawan.'/pdfview')}}">
				<button>
					Cetak
				</button>
			</a>
		</footer>
	</article>

@endsection