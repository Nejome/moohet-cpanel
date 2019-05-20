<div class="row">

    <div class="form-group col-md-6">
        <label class="custom_form_label">الوصف</label>
        <textarea name="description" class="form-control" rows="7">
            {{$setting->description}}
        </textarea>
        <span class="text-danger">{{$errors->first('description')}}</span>
    </div>

    <div class="form-group col-md-6">
        <label class="custom_form_label">الكلمات المفتاحية</label>
        <textarea name="keywords" class="form-control" rows="7">
            {{$setting->keywords}}
        </textarea>
        <span class="text-danger">{{$errors->first('keywords')}}</span>
    </div>

</div>

<div class="row">

    <div class="form-group col-md-6">
        <label class="custom_form_label">سياسات الخصوصية</label>
        <textarea name="privacy_policy" class="form-control" rows="7">
            {{$setting->privacy_policy}}
        </textarea>
        <span class="text-danger">{{$errors->first('privacy_policy')}}</span>
    </div>

    <div class="form-group col-md-6">
        <label class="custom_form_label">الشروط و الاحكام</label>
        <textarea name="terms_condition" class="form-control" rows="7">
            {{$setting->terms_condition}}
        </textarea>
        <span class="text-danger">{{$errors->first('terms_condition')}}</span>
    </div>

</div>