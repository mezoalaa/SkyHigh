@extends('layouts.app')



@section('title', 'List Packages')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>List of Packages</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 text-end">
            <a href="{{ route('dashboard.Packages.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Package
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="search_by_text" class="form-control" placeholder="Search packages...">
        </div>
    </div>

    <div id="ajax_response_searchDiv">

        @if ($mainPackages->count() > 0)
        <table id="table" class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($mainPackages as $package)
                    @if($package->reservationPackage) <!-- Check if reservationPackage is not null -->
                        <tr>

                            <td class="align-middle">{{ $package->id }}</td>
                            <td class="align-middle">{{ $package->reservationPackage->title }}</td>
                            <td class="align-middle">{{ $package->reservationPackage->price }}</td>
                            <td class="align-middle">{{ $package->reservationPackage->country }}</td>
                            <td class="align-middle">{{ $package->reservationPackage->description }}</td>
                            <td class="align-middle">
                                @if ($package->reservationPackage->image)
                                    <img src="{{ asset(''.$package->reservationPackage->image) }}" alt="Image" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    No Image Available
                                @endif
                            </td>
                            <td class="align-middle">{{ $package->reservationPackage->startDate }}</td>
                            <td class="align-middle">{{ $package->reservationPackage->endDate }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('dashboard.Packages.show', $package->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('dashboard.Packages.edit', $package->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('dashboard.packages.delete', ['id' => $package->id]) }}" id="deleteBtn"
                                        method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="9" class="text-center">Incomplete Data</td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $mainPackages->links() }}
        @else
            <div class="alert alert-danger">
                Sorry, there's no data to show.
            </div>
        @endif
    </div>
</div>
@endsection


@section('script')
    <script src="{{ asset('admin_assets/js/searchPackage.js') }}"></script>
@endsection


