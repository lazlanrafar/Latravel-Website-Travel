@extends('layouts.admin')

@section('content')
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Gallery</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the</p>
                            
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm mt-3">
                <i class="fas fa-plus fa-sm text-white"></i> Tambah Gambar
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Travel</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->travel_package->title }}</td>
                            <td>
                                <img src="{{ Storage::url($item->image) }}" alt="" width="150px" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>    
                                </a>

                                <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection