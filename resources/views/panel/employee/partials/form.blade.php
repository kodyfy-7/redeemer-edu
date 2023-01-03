
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <select class="form-control select" name="title" id="title" required>
            <option value="">Please select title</option>
            <option value="Mr">Mr</option>
            <option value="Ms">Ms</option>
        </select>
    </div>
</div>
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full name <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" name="name" value="{{ old('name') ?? $employee->name }}" required="required" class="form-control">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone number <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" placeholder="" name="phone_number" value="{{ old('phone_number') ?? $employee->phone_number  }}"  class="form-control" required autofocus>
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
</div>
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="role_id">Employee role <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <select class="form-control select" name="role_id" id="role_id" required>
            <option value="">Please select role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id}}" @if($role->id == $employee->role_id ?? old('role_id')) selected @endif>{{ $role->role_title }}</option>
            @endforeach
        </select>
        @error('role_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="ln_solid"></div>
<div class="col-12">
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</div>
     