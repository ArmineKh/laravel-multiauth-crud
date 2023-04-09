@extends('layouts.app')

@section('content')

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                <div class="pull-left mb-2">
                    <h2>Add Car</h2>
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
        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
					<div class="form-body mb-3">					
						<div class="form-group mb-2">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter car name">
              @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
            <div class="form-group mb-2">
							<label>Year</label>
              <input type="number" class="form-control"  min="1999" max="2023" name="year" placeholder="Enter car year from 1999 to 2023">
              @error('year')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
            <div class="form-group mb-2">
              <label>Image</label>
              <input class="form-control" type="file" id="image" name="image">
              @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
            <div class="form-group mb-2">
							<label>Price</label>
							<input type="text" class="form-control" name="price" placeholder="Enter price">
              @error('price')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>

            <div class="form-group mb-2">
							<label>Brand</label>
							<input type="text" list="datalistBrands" class="form-control" name="brand" placeholder="Enter car brand name">
              <datalist id="datalistBrands">
              @foreach ($brands as $brand)
                <option value="{{$brand->name}}">
              @endforeach
              </datalist>
              @error('brand')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
            <div class="form-group  mb-2">
							<label>Model</label>
							<input type="text" list="datalistModels" class="form-control" name="model" placeholder="Enter car model name">
              <datalist id="datalistModels">
              @foreach ($models as $model)
                <option value="{{$model->name}}">
              @endforeach
              </datalist>
              @error('model')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
						</div>
            <div class="form-group">
							<label>Description</label>
              <textarea class="form-control" rows="3" name="description" placeholder="Enter car description"></textarea>
              @error('description')
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