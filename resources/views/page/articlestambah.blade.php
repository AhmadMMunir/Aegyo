@extends('main')

@section('title','Article')
	

@section('content')	

<div class="col-md-12">
    <div class="card">
        <div class="card-body card-block"> 
				<a href="/articles/"><button type="button" class="btn btn-primary" > Kembali</button></a>
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

                            <form action="/articles/simpan" method="post">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-12 col-md-9"><input type="hidden" id="text-input" name="id" ></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori</label></div>
                                    <div class="col-12 col-md-9" >
                                    
                
                                        <select name="category_id" id="select" class="form-control">
                                            @foreach ($categories as $key => $items)
                                                <option value="{{$items['id']}}">{{$items['nama']}}</option>
                                            @endforeach
                                        </select>
                                      
                                    </div>
                                </div>
                               

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Title" class="form-control" required="required"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" placeholder="Description" class="form-control" required="required"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Content</label></div>
                                    <div class="col-12 col-md-9"><textarea name="content" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>
                                
                                


                                <input type="submit" value="Simpan Data" class="btn btn-secondary">
                            </form>
                        
		</div>
	</div>
</div>

@endsection
