@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Data Departemen</h3>
		</header>
		<div class="tab_content">			
			<table class="tablesorter" cellspacing="0">
				<thead>
					<tr>
						<th align="center">Kode Departemen</th>
						<th align="center">Nama Departemen</th>
						<th align="center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				@foreach($departemen as $item)
					<tr align="center">
						<td>{{$item->kode_departemen}}</td>
						<td>{{$item->nama_departemen}}</td>
						<td>
							<a href="{{url('master-departemen')}}/{{$item->kode_departemen}}">
								<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
							</a>
						{!! Form::open(array('method' => 'DELETE', 'route' => ['master-departemen.destroy', $item->kode_departemen])) !!}
							<input type="submit" value="Delete" onclick="return confirm('Apakah anda yakin ingin menghapus data Master Departemen: {{$item->nama_departemen}}?')">
						{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{$departemen->render()}}
		</div>
		<footer>
		</footer>
	</article>
@endsection