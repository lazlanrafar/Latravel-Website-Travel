@extends('layouts.app')

@section('content')

<main class="container">

    <!-- Header Section -->
    <header class="mt-5">
        <div class="mx-auto d-flex flex-lg-row flex-column hero">
            <!-- Left Column -->
            <div
                class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
                <p class="text-caption rounded-pill px-3">Explore The World <i class="fa fa-globe"></i></p>
                <h1 class="title-text-big">
                    It's a Big World Out There, Go Explore
                </h1>
                <p class="title-text-desc">We always make our costumer happy by provding as many choises as
                    possible </p>

            </div>

            <!-- Right Column -->
            <div class="right-column text-center d-none d-lg-flex justify-content-center pe-0">
                <img id="img-fluid" class="h-auto mw-100" src="./assets/images/hero.svg" width="700px" alt="" />
            </div>
        </div>
    </header>

    <!-- Benefit Section -->
    <section class="benefit mt-5">
        <div class="row p-4 p-sm-0">
            <div class="col-md-6 col-lg-3 text-center text-sm-start mb-3">
                <p class="benefit-top">WHAT THE SERVE</p>
                <h3 class="benefit-title">Top Values <br> For You</h3>
                <p class="benefit-caption mt-4">
                    This can easily help you to<br />
                    grow up your business fast
                </p>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="icon">
                    <img src="./assets/icon/worldwide.svg" width="70px" alt="" />
                </div>
                <h3 class="icon-title">Lot of Choise</h3>
                <p class="icon-caption">
                    Total 460+ destinations <br> that we work with.
                </p>
            </div>
            <div class="col-sm-6 col-lg-3 mt-lg-5 text-end text-sm-start">
                <div class="icon">
                    <img src="./assets/icon/luggage.svg" width="70px" alt="" />
                </div>
                <h3 class="icon-title">Best Tour Guide</h3>
                <p class="icon-caption">
                    Our tour guide with 15+ <br> years of experience
                </p>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="icon">
                    <img src="./assets/icon/calendar.svg" width="70px" alt="" />
                </div>
                <h3 class="icon-title">Easy Booking</h3>
                <p class="icon-caption">
                    With an easy and fast <br> ticket purchase process.
                </p>
            </div>
        </div>
    </section>

    <!-- Popular Section -->
    <section class="popular mt-5">
        <div class="popular-header text-center text-sm-start">
            <p class="popular-top">TOP DESTINATION</p>
            <h3 class="popular-title">Explore Top Destination</h3>
        </div>
        <div class="popular-content row flex-row flex-nowrap mt-4 pb-4 pt-2 px-2 px-sm-0">

            @foreach ($items as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('detail', $item->slug) }}" class=" text-decoration-none">
                    <div class="card card-block"
                        style="background-image: url({{ 
                        $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''
                        }});">
                    </div>
                    <div class="card-body p-0">
                        <div class="card-title mt-2">
                            Enjoy the Beauty of the {{ $item->title }}
                        </div>
                        <div class="card-location my-2">
                            {{ $item->location  }}
                        </div>
                        <div class="card-star mt-2 p-1 px-3 rounded-pill"><i class="fas fa-star"></i> 4.6
                        </div>
                        <span class="review">( 2.5K Review )</span>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

    </section>

    <!-- Get Started Section -->
    <section class="getstarted mt-5 rounded px-3">
        <div class="row">
            <div class="col text-center">
                <h2 class="started-title">Prepare Yourself & Let's Explore <br>
                    The Beauty of The World</h2>
                <p class="started-caps">We have many special offers especially for you</p>
                <a href="{{ route('register') }}" class="btn btn-getstarted">Get Started</a>
            </div>
        </div>
    </section>

</main>

@endsection