@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Data Master Potongan</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">No.</th>
						<th align="center">Kode Potongan</th>
						<th align="center">Nama Potongan</th>
						<th align="center">Status</th>
						<th align="center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no = 1; ?>
				@foreach($master as $item)
					<tr align="center">
						<td>{{$no}}</td>
						<td>{{$item->kode_potongan}}</td>
						<td>{{$item->nama_potongan}}</td>
						<td>
							@if($item->status == 1)
								Aktif
							@elseif($item->status == 2)
								Non Aktif
							@endif
						</td>
						<td>
							<a href="{{url('master-potongan')}}/{{$item->kode_potongan}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
							
					{!! Form::open(array('method' => 'DELETE', 'route' => ['master-potongan.destroy', $item->kode_potongan])) !!}
							<input type="submit" value="Delete" onclick="return confirm('Apakah anda yakin ingin menghapus data potongan: {{$item->nama_potongan}}');">
					{!! Form::close() !!}
						</td>
					</tr>
				<?php $no++; ?>
				@endforeach
				</tbody>
			</table>
			{{$master->render()}}
		</div>
		<footer>
			<a href="{{url('master-potongan/create')}}">
				<button>Tambah Data Master</button>
			</a>
		</footer>
	</article>
@endsection