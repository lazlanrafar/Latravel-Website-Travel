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
            <form action="{{ route('travel-package.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}" id="title">
                </div>
                <div class="form-group">
                    <label for="location">location</label>
                    <input type="text" class="form-control" name="location" placeholder="Location" value="{{ $item->location }}" id="location">
                </div>
                <div class="form-group">
                    <label for="about">about</label>
                    <textarea rows="10" class="d-block w-100 form-control" name="about" placeholder="About" id="about">{{ $item->about }}</textarea>
                </div>
                <div class="form-group">
                    <label for="featured_event">Featured Event</label>
                    <input type="text" class="form-control" name="featured_event" placeholder="Featured Event" value="{{ $item->featured_event  }}" id="featured_event">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" class="form-control" name="language" placeholder="Language" value="{{ $item->language }}" id="language">
                </div>
                <div class="form-group">
                    <label for="food">Food</label>
                    <input type="text" class="form-control" name="food" placeholder="Food" value="{{ $item->food  }}" id="food">
                </div>
                <div class="form-group">
                    <label for="departure_date">Departure Date</label>
                    <input type="date" class="form-control" name="departure_date" placeholder="Departure Date" value="{{ $item->departure_date  }}" id="departure_date">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" name="duration" placeholder="Duration" value="{{ $item->duration }}" id="duration">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $item->type  }}" id="type">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price   }}" id="price">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

@endsection