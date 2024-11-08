@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $setting->name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $setting->address }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" class="form-control" value="{{ $setting->phone }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $setting->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                @if ($setting->logo)
                    <img src="{{ asset($setting->logo) }}" alt="Logo" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="favicon">Icon</label>
                <input type="file" name="favicon" class="form-control" accept="image/*">
                @if ($setting->favicon)
                    <img src="{{ asset($setting->favicon) }}" alt="Favicon" width="50">
                @endif
            </div>
            <div class="form-group">
                <label for="Facebook">Facebook</label>
                <input type="url" name="Facebook" class="form-control" value="{{ $setting->Facebook }}">
            </div>
            <div class="form-group">
                <label for="X">X</label>
                <input type="url" name="X" class="form-control" value="{{ $setting->X }}">
            </div>
            <div class="form-group">
                <label for="Google">Google</label>
                <input type="url" name="Google" class="form-control" value="{{ $setting->Google }}">
            </div>
            <div class="form-group">
                <label for="Website">Website</label>
                <input type="url" name="Website" class="form-control" value="{{ $setting->Website }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Profile</button>
        </form>
    </div>
@endsection
