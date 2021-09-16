@extends('main')

@section('title','Categories')

@section('content')	

<div class="col-md-12">
    <div class="card">
        <div class="card-body card-block"> 
				<a href="/categories/"><button type="button" class="btn btn-primary" > Kembali</button></a>
						    <br>
						    <br>						
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                            <form action="/categories/simpan" method="post">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="id" placeholder="Id" class="form-control" required="required"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Categories</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama" placeholder="Nama Categories" class="form-control" required="required"></div>
                                </div>
                                <input type="submit" value="Simpan Data" class="btn btn-secondary">
                            </form>
                        
		</div>
	</div>
</div>

@endsection
 
	