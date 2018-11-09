<html>
	<head>
		<title>
			Detail pendapatan karyawan: {{$master->nama_karyawan}} // {{$master->kode_karyawan}}
		</title>
		<style>
			.logo {
				text-align: center;
				font-weight: 24px;
			}
			.logo > p {
				margin: -3% 0 -3 0;
				font-weight: 12px;
			}
			tr, td {
				font-size: 13px;
				padding: 1px 15px;
			}
			.detailgaji {
				border: 1px;
				width: 100%;
				padding: 2%;
			}
		</style>
	</head>
	<body>

	<div class="logo">
		<h4>PT. SINARSUKSES SEJAHTERA</h4>
		<p>
			Jl. P. Jayakarta Blok 14/7 Jakarta 10730
		</p>
		<p>
			Telp: (021) 6246378, 6246379, 6246380, 63246381 Fax: (021) 6298537
		</p>
	</div>
	<hr>
	<table style="margin: 0px 0px 8px 0px;">
		<tr>
			<td>NIK</td>
			<td> : </td>
			<td>{{$master->kode_karyawan}}</td>
		</tr>
		<tr>
			<td>Nama Karyawan</td>
			<td> : </td>
			<td>{{$master->nama_karyawan}}</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td> : </td>
			@foreach($jabatan as $item)
				@if($master->kode_jabatan == $item->kode_jabatan)
					<td>{{$item->nama_jabatan}}</td>
				@else
				@endif
			@endforeach
		</tr>
		<tr>
			<td>No. Rekening</td>
			<td> : </td>
			<td>{{$master->no_rekening}}</td>
		</tr>
	</table>
	<hr>
	<table style="margin: 8px 0 8px 0;">
		<tr>
			<td style="padding-right: 5px;">Gaji Pokok</td>
			<td></td>
			<td>
				Rp. {{number_format($gaji->gaji_pokok)}};
			</td>
		</tr>
		@foreach($master->dataTunjangan as $items)
		<tr>
			<td style="padding-right: 5px;">{{$items->masterTunjangan->nama_tunjangan}}</td>
			<td></td>
			<td>Rp. {{number_format($items->jumlah)}};</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3">
				<hr>
			</td>
		</tr>
		<tr>
			<td>Bruto</td>
			<td></td>
			<td>Rp. {{number_format($subtotal)}};</td>
		</tr>
	</table>
	</body>
</html>