@extends('layout')
@section('content')

<div class="container">
    <h3 align="center" class='mt-5'>Add a New Product</h3>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Product Name -->
                        <div class="col-md-6">
                            <label for="productname">Product Name</label>
                            <input type="text" class="form-control" name="productname" id="productname">
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="cat_id">Category</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select a category</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mt-3">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price">
                        </div>

                        <!-- Image Upload -->
                        <div class="col-md-6 mt-3">
                            <label for="photo">Image</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Product List -->
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <!-- Display product list -->
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $product->productname }}</td>
                            <td>{{ $product->category->name }}</td> <!-- Category name -->
                            <td>{{ $product->description }}</td>   <!-- Ensure this matches the field -->
                            <td>{{ $product->price }}</td>
                            <td>
                                @if($product->photo)
                                    <img src="{{ asset('images/' . $product->photo) }}" alt="Product Image" width="100">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="Default Image" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection

@push('css')
    <style>
        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: white;
        }
        table img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
@endpush
