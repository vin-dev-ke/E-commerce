@extends('layout')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Category Management</h3>
    
    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-area p-4 border rounded shadow-sm bg-white">
                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option selected disabled>Select status</option>
                                <option value="1">True</option>
                                <option value="2">False</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Category Table -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <table class="table table-striped table-bordered shadow-sm bg-white">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge bg-success">True</span>
                                @else
                                    <span class="badge bg-danger">False</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('css')
    <style>
        .form-area {
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .table {
            margin-top: 20px;
        }
        .badge {
            font-size: 0.9em;
        }
    </style>
@endpush
@endsection
