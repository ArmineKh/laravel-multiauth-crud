@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="container">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
            @endif
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6">
						        <h2>Manage <b>Cars</b></h2>
					        </div>
					        <div class="col-sm-6">
						        <a href="{{ route('cars.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Car</span></a>
                    <a href="{{ route('models.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Model</span></a>
                    <a href="{{ route('brands.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Brand</span></a>
					        </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th width="280px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($cars as $car)
                  <tr>
                    <td>{{ $car->id }}</td>
                    <td>
                    <img height="100px" width="100px" src="{{url('storage/'.$car->image)}}" style="border-radius: 50%; border: 1px solid #566787" />
                    </td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->price }}</td>
                    <td>{{ $car->description }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->model->name }}</td>
                    <td class="d-flex justify-content-center align-items-center" style="height: 125px;">
                      <a class="edit" href="{{route( 'cars.edit', $car->id )}}" ><i class="material-icons" >&#xE254;</i></a>
                      <form action="{{ route('cars.destroy', $car->id) }}" method="POST" >
                      @method('delete')
                      @csrf
                        <button type="submit" class="delete"><i class="material-icons" >&#xE872;</i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>

            <div class="clearfix">
            {{ $cars->links() }}
            </div>

          </div>

        </div>

      </div>
    </div>
@endsection