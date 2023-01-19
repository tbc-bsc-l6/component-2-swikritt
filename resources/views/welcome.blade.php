@extends('layouts.app')
@section('content')
    @empty ($products)
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
        <form method="get">
            <div class="row mb-3">
                <div class="col-12">
                    <h3><b>Filters</b></h3>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="min_price">Min price</label>
                        <input type="number" class="form-control" placeholder="enter min price" name="min_price" id="min_price" value="{{$min_price}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="max_price">Max price</label>
                        <input type="number" class="form-control" placeholder="enter max price" name="max_price" id="max_price" value="{{$max_price}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="name">Search by name</label>
                        <input type="text" class="form-control" placeholder="enter product name" name="name" id="name" value="{{$name}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="sorting">Sort</label>
                        <select class="form-control" name="sorting" id="sorting">
                            <option value="" selected>select sorting order</option>
                            <option value="asc" @if($sorting == "asc") selected @endif >Ascending</option>
                            <option value="desc" @if($sorting == "desc") selected @endif >Descending</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <button type="submit" class="btn-primary btn mt-4">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3 mb-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                {{$products->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    @endif

@endsection
