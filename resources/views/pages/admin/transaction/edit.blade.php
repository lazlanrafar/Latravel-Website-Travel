@extends('layouts.admin')

@section('content')
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Edit Paket Travel {{ $item->title }}</h1>
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
            <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status">Status Transaksi</label>
                    <select name="transaction_status" id="transaction_status" required class="form-select">
                        <option value="{{ $item->transaction_status }}">
                            Jangan ubah ({{ $item->transaction_status }})
                        </option>
                        <option value="IN_CART">In Cart</option>
                        <option value="PENDING">Pending</option>
                        <option value="SUCCESS">Success</option>
                        <option value="CANCEL">Cancel</option>
                        <option value="FAILED">Failed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

@endsection