@extends('layouts.checkout')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="d-none d-md-grid row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-8 pl-lg-0 card-left">
                    <div class="card card-details mt-1 card-left">
                        @if ($errors->any())
                            <div class="alert alert_danger">
                                <ul>
                                    @foreach ($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h1>Who is Going?</h1>
                        <p>Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>Visa</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" alt="Name Account" height="60"
                                                class="rounded-circle">
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->nationality }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ 
                                            \Carbon\Carbon::createFromDate($detail->doe_passport) >
                                            \Carbon\Carbon::now() ? 'Active' : 'Inactive' ;
                                            }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('checkout-remove', $detail->id) }}" class="">
                                                <img src="{{ url('/assets/icon/ic_remove.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">
                                                No Visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form class="form-inline row" method="POST" action="{{ route('checkout-create', $item->id) }}">
                                @csrf
                                <div class="col-12 col-md-3">
                                    <label for="username" class="visually-hidden">Name</label>
                                    <input type="text" name="username" class="form-control mb-2 mr-sm-2"
                                        id="username" placeholder="Username">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="nationality" class="visually-hidden">Nationality</label>
                                    <input type="text" name="nationality" class="form-control mb-2 mr-sm-2"
                                        id="nationality" placeholder="nationality">
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="is_visa" class="visually-hidden">Visa</label>
                                    <select name="is_visa" id="is_visa" class="form-select mb-2 mr-sm-2" required>
                                        <option value="" selected>Visa</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="doe_passport" class="visually-hidden">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker" id="doe_passport"
                                            placeholder="DOE Passport" name="doe_passport">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-add-now mb-2 px-4" type="submit">
                                        Add Now
                                    </button>
                                </div>


                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">
                                You are only able to invite member that has registered in
                                Nomads.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Infomartion</h2>
                        <table class="trip-informations">
                            <tr>
                                <th>Members</th>
                                <th class="text-right ">{{ $item->details->count(); }} Person</th>
                            </tr>
                            <tr>
                                <th>Additional VISA</th>
                                <th class="text-right ">$ {{ $item->additional_visa }}</th>
                            </tr>
                            <tr>
                                <th>Triple Price</th>
                                <th class="text-right ">$ {{ $item->travel_package->price }},00 / Person</th>
                            </tr>
                            <tr>
                                <th>Sub Total</th>
                                <th class="text-right ">$ {{ $item->transaction_total }},00</th>
                            </tr>
                            <tr>
                                <th>Total (+Unique)</th>
                                <th class="text-right text-total">
                                    <span class="">$ {{ $item->transaction_total }},</span>
                                    <span class="text-orange"><b>{{ mt_rand(0,99) }}</b></span>
                                </th>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payment Instructions</h2>
                        <p class="payment-instructions">
                            Please complete your payment before to continue the wonderful trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('/assets/icon/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT Latravel ID</h3>
                                    <p>
                                        0881 8829 8800
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item">
                                <img src="{{ url('/assets/icon/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT Latravel ID</h3>
                                    <p>
                                        0899 8501 7888
                                        <br>
                                        Bank HSBC
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-cointainer">
                        <a href="{{ route('checkout-sucess', $item->id) }}" class="btn d-block bg-warning text-light py-2">
                            Booking Now
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">
                            Cancel Booking
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection