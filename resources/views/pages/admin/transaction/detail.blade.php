@extends('layouts.admin')

@section('content')
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Detail Transaction {{ $item->user->name }} </h1>
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
            <table class="table bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Paket Travel</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Additional Vis</th>
                    <td>${{ $item->additional_visa }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>${{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Pembelian</th>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nationality</th>
                            <th>Visa</th>
                            <th>Doe Passport</th>
                        </tr>
                        @foreach ($item->details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->username }}</td>
                                <td>{{ $detail->nationality }}</td>
                                <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                <td>{{ $detail->doe_passport }}</td>
                            </tr>
                        @endforeach
                    </table>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection