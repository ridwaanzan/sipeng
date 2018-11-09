@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Master Data Jabatan</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th>Kode Jabatan</th>
						<th>Nama Jabatan</th>
						<th>Departemen</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				@foreach($jabatan as $item)
					<tr>
						<td>{{$item->kode_jabatan}}</td>
						<td>{{$item->nama_jabatan}}</td>
						<td>
						@foreach($departemen as $depart)
							@if($depart->kode_departemen == $item->kode_departemen)
							{{$depart->nama_departemen}}
							@endif
						@endforeach
						</td>
						<td>
							<a href="{{url('master-jabatan')}}/{{$item->kode_jabatan}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
						{!! Form::open(array('method' => 'DELETE', 'route' => ['master-jabatan.destroy', $item->kode_jabatan])) !!}
								<input type="submit" value="Delete">
						{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{$jabatan->render()}}
		</div>
		<footer>
		</footer>
	</article>
@endsection