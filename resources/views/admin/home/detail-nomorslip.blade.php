@extends('layouts.layapps')
@section('content')
			<div class="module_content">
				<div>
					<table>
						<tr>
							<td>
								<a href="{{url('gajian/print')}}/{{$mGajian->kode_transaksi}}{{$mGajian->kode_karyawan}}">
									<button>Print</button>
								</a>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Tanggal Release</td>
							<td> : </td>
							<td><b>{{date('d M Y', strtotime($mGajian->tanggal))}}</b></td>
						</tr>
						<tr>
							<td>Kode Karyawan</td>
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
							<td>
								<b>{{$mKaryawan->jabatan->nama_jabatan}}</b>
							</td>
						</tr>
						<tr>
							<td>Nomor Rekening</td>
							<td> : </td>
							<td>
								<b>{{$mKaryawan->no_rekening}}</b>
							</td>
						</tr>
					</table>
				</div>
				<br>
				<br>
				<section id="detail_gaji" style="width: 49%; float: left;">
					<table  style="margin-left: 5px;">
						<tr>
							<td colspan="3" align="center" style="font-weight: bold;">
								Detail Pendapatan
							</td>
						</tr>
						<tr>
							<td>Gaji Pokok</td>
							<td> : </td>
							<td style="font-weight: bold;">Rp. {{number_format($mGajian->gaji_pokok)}}</td>
						</tr>
						@foreach($mKaryawan->dataTunjangan as $dataTun)
							<tr>
								<td>{{$dataTun->masterTunjangan->nama_tunjangan}}</td>
								<td> : </td>
								<td style="font-weight: bold;">Rp. {{number_format($dataTun->jumlah)}}</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="3">
								<hr>
							</td>
						</tr>
						<tr>
							<td>Total Pendapatan</td>
							<td> : </td>
							<td style="font-weight: bold;">Rp. {{number_format($totalPendapatan)}}</td>
						</tr>
					</table>
				</section>
				<section id="detail_potongan" style="width: 48%;float: right;">
					<table>
						<tr>
							<td colspan="3" align="center">
								<b>Detail Potongan</b>
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
							<td colspan="3">
								<hr>
							</td>
						</tr>
						<tr>
							<td>Total Pengurangan</td>
							<td> : </td>
							<td style="font-weight: bold;">Rp. {{number_format($mGajian->total_potongan)}}</td>
						</tr>
						<tr>
							<td>Take Home Pay</td>
							<td> : </td>
							<td style="font-weight: bold;">Rp. {{number_format($mGajian->total_gaji)}}</td>
						</tr>
					</table>
				</section>
			</div>
@endsection
