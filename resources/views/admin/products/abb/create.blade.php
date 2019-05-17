@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">بحث عن منتج 1688</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-9 col-centered">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        بحث عن منتج 1688

                    </div>

                    <div class="panel-body row" style="padding: 40px;">

                        <form method="POST" action="{{url('/admin/products/abb/show')}}" role="form" class="col-md-10">

                            {{csrf_field()}}

                            <div class="form-group row">

                                <label class="col-md-3 custom_form_label">رقم المنتج</label>

                                <input name="item_id" value="{{old('item_id')}}" placeholder="ادخل رقم المنتج في موقع 1688" type="text" class="form-control col-md-9">

                                <span class="text-danger">{{$errors->first('item_id')}}</span>

                            </div>


                            <div class="text-center">

                                <button type="submit" class="btn btn-primary">بحث</button>

                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection