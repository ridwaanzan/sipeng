<html>
	<head>
		<title>
			Detail pendapatan karyawan: {{$mKaryawan->nama_karyawan}} // {{$mKaryawan->kode_karyawan}}
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
		<br>
		<p>
			Jl. P. Jayakarta 14/7 Mangga Dua, Jakarta 10730
		</p>
		<p>
			<small>Telp. (021) 6246378, 6246379, 6246380, 6246381 - Fax : (021) 6298537<small>
		</p>
	</div>
	<hr>
	<table style="margin: 0px 0px 8px 0px;">
		<tr>
			<td>Tanggal Release</td>
			<td> : </td>
			<td><b>{{date('d M Y', strtotime($mGajian->tanggal))}}</b></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td> : </td>
			<td><b>{{$mKaryawan->kode_karyawan}}</b></td>
		</tr>
		<tr>
			<td>Nama Karyawan</td>
			<td> : </td>
			<td><b>{{$mKaryawan->nama_karyawan}}</b></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td> : </td>
			<td><b>{{$mKaryawan->jabatan->nama_jabatan}}</b></td>
		</tr>
		<tr>
			<td>No. Rekening</td>
			<td> : </td>
			<td><b>{{$mKaryawan->no_rekening}}</b></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td style="width: 325px;">
				<table>
					<tr>
						<td colspan="3" align="center" style="font-weight: bold; padding: 25px 0 0 0;">
							Detail Pendapatan
						</td>
					</tr>
					<tr>
						<td style="padding-right: 5px;">Gaji Pokok</td>
						<td> : </td>
						<td style="font-weight: bold;">
							Rp. {{number_format($mGajian->gaji_pokok)}}
						</td>
					</tr>
					@foreach($mKaryawan->dataTunjangan as $dataTun)
						<tr>
							<td>{{$dataTun->masterTunjangan->nama_tunjangan}}</td>
							<td> : </td>
							<td style="font-weight: bold;">Rp. {{number_format($dataTun->jumlah)}}</td>
						</tr>
					@endforeach
					<tr>
						<td  style="padding-bottom: 25px;"></td>
					</tr>
				</table>
			</td>
			<td style="width: 328px;">
				<table>
					<tr>
						<td colspan="3" align="center" style="font-weight: bold; padding: 25px 0 0 0;">
							Detail Potongan
						</td>
					</tr>
					<tr>
						<td>Potongan Absensi</td>
						<td> : </td>
						<td>
							<b>Rp. {{number_format($totalPengurangan)}}</b>
						</td>
					</tr>
					<tr>
						<td>Potongan BPJS</td>
						<td> : </td>
						<td>
							<b>Rp. {{number_format($jumBPJS)}}</b>
						</td>
					</tr>
					<tr>
						<td colspan="3" style="padding-bottom: 25px;"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<hr>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr align="center">
						<td>Gaji Bruto</td>
						<td></td>
						<td style="font-weight: bold;">Rp. {{number_format($totalPendapatan)}}</td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr align="center">
						<td>Total Pengurangan</td>
						<td></td>
						<td style="font-weight: bold;">Rp. {{number_format($mGajian->total_potongan)}}</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<hr>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<table>
					<tr align="center">
						<td>Gaji Netto</td>
						<td></td>
						<td style="font-weight: bold; padding-left: 60px;">Rp. {{number_format($mGajian->total_gaji)}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
		<table style="float: right; margin-top: 45px; margin-right: 50px;">
			<tr>
				<td align="center" style="width: 250px;">
					<b>Yang Mengeluarkan,</b>
				</td>
			</tr>
			<tr>
				<td style="height: 100px; border: solid 1px #fff;"></td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td align="center">HRD - Payroll</td>
			</tr>
		</table>
	</body>
</html>