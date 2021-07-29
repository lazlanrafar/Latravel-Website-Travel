@extends('layouts.admin')

@section('content')
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the</p>
                            
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Travel</th>
                            <th>User</th>
                            <th>Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->travel_package->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>${{ $item->additional_visa }}</td>
                            <td>${{ $item->transaction_total }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>
                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>    
                                </a>
                                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>    
                                </a>

                                <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" class="d-inline">
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