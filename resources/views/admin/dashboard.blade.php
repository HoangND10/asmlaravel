@extends('admin.layoutadmin')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Phone Summary</h1>
    <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover bg-white custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Categories</th>
                            <th>Total Products</th>
                            <th>Total Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($summary as $item)
                            <tr>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->total_products }}</td>
                                <td>{{ $item->total_quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection