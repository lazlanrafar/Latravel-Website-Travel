@extends('layouts.admin')

@section('content')
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Edit Gambar</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the</p>
                 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="travel_package_id">Paket Travel</label>
                    <select name="travel_package_id" id="travel_package_id" class="form-control" required>
                        <option value="{{ $item->travel_package_id }}">Jangan Di ubah</option>
                        @foreach ($travel_packages as $travel_package)
                            <option value="{{ $travel_package->id }}">
                                {{ $travel_package->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" placeholder="Image" class=" form-control-file">
                    
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

@endsection