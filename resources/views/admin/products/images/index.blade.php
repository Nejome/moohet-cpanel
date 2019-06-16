@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">صور <span class="text-primary">{{$product->name}}</span></h3>
            </div>
        </div>

        <div class="row">

            @foreach($images as $image)

                <div class="col-md-3" style="border: 1px solid #efefef;">
                    <img src="{{$image->Medium}}" width="100%" style="height: 250px;">
                </div>

            @endforeach

        </div>

    </div>

@endsection