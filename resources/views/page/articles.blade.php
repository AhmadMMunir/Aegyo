@extends('main')

@section('title','Article')

@section('content')	

	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-body">	
						<a href="/articles/tambah"><button type="button" class="btn btn-primary" > Article Baru</button><a>
						<br>
						<br>
						<table id="bootstrap-data-table" class="table table-striped table-bordered">
						<tr>
							
							<th>Category</th>
							<th>Title</th>
							<th>Url</th>
							<th>Description</th>
							<th>Content</th>
							<th>Opsi</th>
						</tr>
						@foreach($articles as $p)
						
						<tr>
							
							<td>{{ $p->categories_nama}}</td>
							<td>{{ $p->title }}</td>
							<td>http://localhost:9000/{{ $p->nama_url }}/read/{{ $p->title_url }}</td>
							<td>{{ $p->description }}</td>
							<td>{{ $p->content }}</td>
							<td>
								<a href="/articles/ubah/{{ $p->id}}">Ubah</a>
								|
								<a href="/articles/hapus/{{ $p->id}}">Hapus</a>
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
 
