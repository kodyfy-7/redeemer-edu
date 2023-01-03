@extends('layouts.panelv2')

@section('title')
  Students
@endsection

@section('page_action')
    <a href="{{ route('students.index') }}" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i></a>
@endsection

@section('style')
    @include('panel.utils.datatables.style')
    @include('panel.utils.notification.style')
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Create an student</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('students.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @include('panel.student.partials.form') --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="form-title"><span>Parent details</span></h5>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Parent name *</label>
                            <input class="form-control" type="text" name="parent_name"  class="form-control">
                            @error('parent_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Email *</label>
                            <input class="form-control" type="email" name="email" class="form-control">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Phone number *</label>
                            <input class="form-control" type="text" name="phone"  class="form-control">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <h5 class="form-title"><span>Student details</span></h5>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Name *</label>
                            <input class="form-control" type="text" name="name"  class="form-control">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Gender *</label>
                            <select class="form-control select" name="gender" id="gender" required>
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Date of birth*</label>
                            <input class="form-control" type="text" name="date_of_birth"  class="form-control">
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Classroom *</label>
                            <select class="form-control select" name="classroom_id" id="classroom_id" required>
                                <option value="">Select classroom</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->classroom_name }} {{ $classroom->classroom_section }}</option>
                                @endforeach
                            </select>
                            @error('classroom_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Select file </label>
                            <input class="form-control" type="file" name="upload_file">
                            @error('upload_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    @include('panel.utils.datatables.script')
    @include('panel.utils.notification.script')
@endsection