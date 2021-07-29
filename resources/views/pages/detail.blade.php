@extends('layouts.app')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-8 pl-lg-0 card-left">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p class="text-muted mt-0">
                            {{ $item->location }}
                        </p>
                        @if ($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom"
                                    id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                                    width="100%">
                            </div>
                            <div class="xzoom-thumbs row flex-row flex-nowrap px-1">
                                @foreach ($item->galleries as $gallery)
                                <div class="col">
                                    <a href="{{ Storage::url($gallery->image) }}">
                                        <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery"
                                            width="125" xpreview="{{ Storage::url($gallery->image) }}">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>About Destination</h2>
                        {!! $item->about !!}
                        <div class="features row">
                            <div class="col-md-4">
                                <img src="{{ url('/assets/icon/ic_event.png') }}" alt="Logo Event" class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>{{ $item->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('/assets/icon/ic_bahasa.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $item->language }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('/assets/icon/ic_foods.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>{{ $item->food }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="{{ url('/assets/icon/person.svg') }}" alt="" class="member-image">
                            <img src="{{ url('/assets/icon/person.svg') }}" alt="" class="member-image">
                            <img src="{{ url('/assets/icon/person.svg') }}" alt="" class="member-image">
                            <img src="{{ url('/assets/icon/person.svg') }}" alt="" class="member-image">
                        </div>
                        <hr>
                        <h2>Trip Infomartion</h2>
                        <table class="trip-informations">
                            <tr>
                                <th>Date of Departure</th>
                                <td class="text-right text-muted">
                                    {{ \Carbon\Carbon::create($item->departure_date)->format('F, n Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td class="text-right text-muted">
                                    {{ $item->duration }}
                                </td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td class="text-right text-muted">
                                    {{ $item->type }}
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td class="text-right text-muted">
                                    ${{ $item->price }},00 / person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-cointainer">
                        @auth
                        <form action="{{ route('checkout-process', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn py-2 bg-warning text-light btn-block w-100" type="submit">
                                Join Now
                            </button>
                        </form>
                        @endauth
                        @guest
                        <a href="login" class="btn d-block bg-warning text-light py-2">
                            Login or Register to Join
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection