@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="container">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6">
						<h2>Manage <b>Cars</b></h2>
					</div>
					<div class="col-sm-6">
                    <form action="" method="GET" class="row g-2">
                        <div class="col-sm-10">
                            <input type="search" class="form-control" name="search" placeholder="Enter car model or brand name for search">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                      </form>
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