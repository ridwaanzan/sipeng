@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Master Data Tunjangan</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">Kode Tunjangan</th>
						<th align="center">Nama Tunjangan</th>
						<th align="center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				@foreach($tunjangan as $item)
					<tr align="center">
						<td>{{$item->kode_tunjangan}}</td>
						<td>{{$item->nama_tunjangan}}</td>
						<td>
							<a href="{{url('master-tunjangan')}}/{{$item->kode_tunjangan}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
							
						{!! Form::open(array('method' => 'DELETE', 'route' => ['master-tunjangan.destroy', $item->kode_tunjangan])) !!}
							<input type="submit" value="Delete" onclick='return confirm("Apakah anda yakin ingin menghapus data tunjangan: {{$item->nama_tunjangan}}");'>
						{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{$tunjangan->render()}}
		</div>
		<footer>
		</footer>
	</article>
@endsection