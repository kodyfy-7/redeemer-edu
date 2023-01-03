@extends('layouts.panelv2')

@section('title')
  Classrooms
@endsection

@section('page_action')
    <a href="{{ route('classrooms.index') }}" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i></a>
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
          <h2>Edit an classroom</h2>
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
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('classrooms.update', $classroom->id )}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('panel.classroom.partials.form')
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    @include('panel.utils.datatables.script')
    @include('panel.utils.notification.script')
@endsection@extends('layouts.panelv2')

