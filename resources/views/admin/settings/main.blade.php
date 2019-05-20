<div class="row">

    <div class="form-group col-md-6 @if( $errors->first('name') != '' ) has-error @endif">
        <label class="custom_form_label">الاسم</label>
        <input name="name" value="{{$setting->name}}"  type="text" class="form-control">
        <span class="text-danger">{{$errors->first('name')}}</span>
    </div>

    <div class="form-group col-md-6">
        <label class="custom_form_label">الايميل</label>
        <input name="email" value="{{$setting->email}}"  type="email" class="form-control">
        <span class="text-danger">{{$errors->first('email')}}</span>
    </div>

</div>

<div class="row">

    <div class="form-group col-md-6">
        <label class="custom_form_label">رقم الهاتف</label>
        <input name="phone" value="{{$setting->phone}}" type="text" class="form-control">
        <span class="text-danger">{{$errors->first('phone')}}</span>
    </div>

    <div class="form-group col-md-6">
        <label class="custom_form_label">الفاكس</label>
        <input name="fax" value="{{$setting->fax}}"  type="text" class="form-control">
        <span class="text-danger">{{$errors->first('fax')}}</span>
    </div>

</div>

<div class="row">

    <div class="form-group col-md-6">
        <label class="custom_form_label">الموقع</label>
        <input name="location" value="{{$setting->location}}" type="text" class="form-control">
        <span class="text-danger">{{$errors->first('location')}}</span>
    </div>


</div>