@extends('main')

@section('title','Categories')

@section('content')	

	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-body">	
						<a href="/categories/tambah"><button type="button" class="btn btn-primary" > Categories Baru</button><a>
						<br>
						<br>
						<table id="bootstrap-data-table" class="table table-striped table-bordered">
							<tr>
								<th>Id</th>
								<th>Nama Categories</th>
								<th>Url</th>
								<th>Opsi</th>
							</tr>
							@foreach($categories as $p)
							<tr>
								<td>{{ $p->id }}</td>
								<td>{{ $p->nama }}</td>
								<td>http://localhost:9000/articles/{{ $p->nama_url }}</td>
								<td>
									<a href="/categories/ubah/{{ $p->id}}">Ubah</a>
									|
									<a href="/categories/hapus/{{ $p->id}}">Hapus</a>
								</td>
							</tr>
							@endforeach					
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
 
