@extends('layout.master')

@push('styles')
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('argon/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
@endpush

@section('content')

    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if(isset(Auth::user()->image) && Auth::user()->image != '')
                                        <img src="{{asset('images/'.Auth::user()->image)}}" class="rounded-circle">
                                    @else
                                        <img src="{{asset('images/man2.png')}}" class="rounded-circle">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-light float-right" data-toggle="modal" data-target="#image_modal">تعديل الصورة</a>
                        </div>
                    </div>
                    @include('customers.change_image_modal')
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">{{$orders_count}}</span>
                                        <span class="description">طلباتي</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{$products_count}}</span>
                                        <span class="description">منتجاتي</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{number_format($row->wallet->current_balance, 2)}}</span>
                                        <span class="description">رصيدي</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{$row->name}}
                            </h3>

                            <div class="h5 font-weight-300">
                                {{$row->country}}, {{$row->town}}
                            </div>

                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{$row->user->email}}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>
                                @if($row->phone != null)
                                    {{$row->phone}}
                                @else
                                    <span class="text-danger">لم تقم بإضافة رقم هاتفك بعد</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">

                            <div class="col-7">
                                <h3 class="mb-0">بياناتي</h3>
                            </div>

                            <div class="col-5 text-center">

                                @if($row->user->password != NULL)
                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#password_modal">تعديل كلمة المرور</a>
                                @else
                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#password_modal">إضافة كلمة مرور</a>
                                @endif

                                @if($row->phone == '')
                                    <a href="#" class="btn btn-sm btn-default" data-toggle="modal" data-target="#phone_modal">اضافة رقم الهاتف</a>
                                @else
                                    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#phone_modal">تعديل رقم الهاتف</a>
                                @endif

                            </div>

                            @if($row->user->password != NULL)
                                @include('customers.change_password_modal')
                            @else
                                @include('customers.add_password_modal')
                            @endif

                            @include('customers.phone_verification_modal')

                        </div>

                        <!-- Public Errors -->
                        @if($errors->any())
                            <ul class="alert alert-danger mt-3">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                    <!-- Password Flash Messages -->
                        @if(session()->has('incorrect_password'))
                            <div class="alert alert-danger mt-3">{{session()->get('incorrect_password')}}</div>
                        @endif
                        @if(session()->has('password_changed'))
                            <div class="alert alert-success mt-3">{{session()->get('password_changed')}}</div>
                        @endif

                    <!-- Phone Verification Flash Messages -->
                        @if(session()->has('sent_message'))
                            <div class="alert alert-success mt-3">{{session()->get('sent_message')}}</div>
                        @endif
                        @if(session()->has('error_message'))
                            <div class="alert alert-warning mt-3">{{session()->get('error_message')}}</div>
                        @endif
                        @if(session()->has('wrong_code'))
                            <div class="alert alert-danger mt-3">{{session()->get('wrong_code')}}</div>
                        @endif
                        @if(session()->has('phone_verified'))
                            <div class="alert alert-success mt-3">{{session()->get('phone_verified')}}</div>
                        @endif

                    <!-- Image Change Flash Messages -->
                        @if(session()->has('image_changed'))
                            <div class="alert alert-success mt-3">{{session()->get('image_changed')}}</div>
                        @endif

                    </div>

                    <form method="POST" action="{{route('customers.update', ['id' => $row->id])}}">

                        {{csrf_field()}}

                        @method('PUT')

                        <div class="card-body">
                            <div class="pl-lg-4">

                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                @endif

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">الإسم</label>
                                            <input type="text" name="name" value="{{$row->name}}" id="input-username" class="form-control form-control-alternative">
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">البريد الإلكتروني</label>
                                            <input type="email" name="email" value="{{$row->user->email}}" id="input-email" class="form-control form-control-alternative">
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">رقم الهوية</label>
                                            <input type="text" name="identification_number" value="{{$row->identification_number}}" id="input-first-name" class="form-control form-control-alternative">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">رمز البلد</label>
                                            <input type="text" name="country_code" value="{{$row->country_code}}" id="input-last-name" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4" />

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">العنوان</label>
                                            <input id="input-address" type="text" name="address" value="{{$row->address}}" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">البلد</label>
                                            <input type="text" name="country" value="{{$row->country}}" id="input-city" class="form-control form-control-alternative">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">المدينة</label>
                                            <input type="text" name="town" value="{{$row->town}}" id="input-country" class="form-control form-control-alternative">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">تعديل</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">محيط</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">

                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">معلومات عننا</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">تواصل معنا</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">سياسات الإستخدام</a>
                        </li>

                    </ul>
                </div>
            </div>
        </footer>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
@endpush