<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_id">Category <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <select class="form-control select" name="category_id" id="category_id" required>
            <option value="">Please select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $category->id ?? old('category_id')) selected @endif>{{ $category->cc_type }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="classroom_name">Name <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" placeholder="" name="classroom_name" value="{{ old('classroom_name') ?? $classroom->classroom_name }}"  class="form-control" required autofocus>
            @error('classroom_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="classroom_section">Section <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" placeholder="" name="classroom_section" value="{{ old('classroom_section') ?? $classroom->classroom_section }}"  class="form-control" required autofocus>
            @error('classroom_section')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="classroom_code">Code <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" placeholder="" name="classroom_code" value="{{ old('classroom_code') ?? $classroom->classroom_code }}"  class="form-control" required autofocus>
            @error('classroom_name')
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
     


<div class="row">
    <div class="col-12">
        <h5 class="form-title"><span>Classroom Details</span></h5>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Category *</label>
            <select class="form-control select" name="classroom_category_id" id="classroom_category_id" required>
                <option value="">Please select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->cc_type }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Name *</label>
            <input type="text" placeholder="" name="classroom_name" value="{{ old('classroom_name') ?? $classroom->classroom_name }}"  class="form-control" required autofocus>
            @error('classroom_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Section *</label>
            <input type="text" placeholder="" name="classroom_section" value="{{ old('classroom_section') ?? $classroom->classroom_section }}"  class="form-control" required autofocus>
            @error('classroom_section')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-6">
        <div class="form-group">
            <label>Code *</label>
            <input type="text" placeholder="" name="classroom_code" value="{{ old('classroom_code') ?? $classroom->classroom_code }}"  class="form-control" required autofocus>
            @error('classroom_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</div>