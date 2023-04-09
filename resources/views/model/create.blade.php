@extends('layouts.app')

@section('content')

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                <div class="pull-left mb-2">
                    <h2>Add Car Model</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.home') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('models.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
					<div class="form-body mb-3">					
						<div class="form-group mb-2">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter car model name">
              @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
            <div class="form-group">
							<label>Brand</label>
							<input type="text" list="datalistOptions" class="form-control" name="brand" placeholder="Enter car brand name">
              <datalist id="datalistOptions">
              @foreach ($brands as $brand)
                <option value="{{$brand->name}}">
              @endforeach
              </datalist>
              @error('brand')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
					</div>
					<div class="form-footer">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>

    </div>

@endsection