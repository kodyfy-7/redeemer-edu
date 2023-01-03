
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
        <input type="text" name="subject_title" value="{{ old('subject_title') ?? $subject->subject_title }}" required="required" class="form-control">
        @error('subject_title')
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
     