@if (@isset($mainPackages) && !@empty($mainPackages) && count($mainPackages) >0 )
@php
$i=1;
@endphp
<table id="table" class="table table-hover" >
    <thead id="table" class="table-primary">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Country</th>
            <th>Description</th>
            <th>Image</th>
            <th>startDate</th>
            <th>endtDate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mainPackages as $package)
    <tr>
        <td class="align-middle">{{ $package->reservationPackage->id }}</td>
        <td class="align-middle">{{ $package->reservationPackage->title }}</td>
        <td class="align-middle">{{ $package->reservationPackage->price }}</td>
        <td class="align-middle">{{ $package->reservationPackage->country }}</td>
        <td class="align-middle">{{ $package->reservationPackage->description }}</td>
        <td class="align-middle">{{ $package->reservationPackage->image }}</td>
        <td class="align-middle">{{ $package->reservationPackage->startDate }}</td>
        <td class="align-middle">{{ $package->reservationPackage->endDate }}</td>
        <td>@if($info->active==1) Bus @else No @endif</td>
        <td>
            <a href="{{ route('dashboard.Packages.edit',$package->id) }}" class="btn btn-sm  btn-primary">Edit</a>
            <button data-id="{{ $package->id }}" class="btn btn-sm  btn-info">Detail</button>
        </td>
    </tr>
    @php
    $i++;

    @endforeach
   </tbody>
</table>
<br>
<div class="col-md-12" id="ajax_pagination_in_search">
    {{ $mainPackages->links() }}
</div>
@else
<div class="alert alert-danger">
    There/'s' no data to show
</div>
@endif
