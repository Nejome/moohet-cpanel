<div class="row">

    <div class="form-group col-md-6 @if( $errors->first('revoke_duration') != '' ) has-error @endif">
        <label class="custom_form_label">فترة سحب النقود (يوم)</label>
        <input name="revoke_duration" value="{{$setting->revoke_duration}}" type="text" class="form-control ">
        <span class="text-danger">{{$errors->first('revoke_duration')}}</span>
    </div>

    <div class="form-group col-md-6 @if( $errors->first('revoke_amount') != '' ) has-error @endif">
        <label class="custom_form_label">الحد الادني للسماح بسحب الرصيد</label>
        <input name="revoke_amount" value="{{$setting->revoke_amount}}" type="text" class="form-control">
        <span class="text-danger">{{$errors->first('revoke_amount')}}</span>
    </div>

</div>