@extends('layouts.panelv2')

@section('title')
    Classrooms
@endsection

@section('page_action')
    <a href="{{ route('classrooms.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
@endsection

@section('style')
    @include('panel.utils.datatables.style')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Students in {{ $classroom->classroom_name .' '. $classroom->classroom_section }}</h2>
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
                <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>S/N</th>
                                    <th>Registration ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $student->registration_id ?? '-'}}
                                            </td>
                                            <td>
                                                <a href="{{ route('students.show', $student->student_slug) }}">{{ $student->name }}</a>
                                            </td> 
                                            <td>
                                                <a href="{{ route('students.show', $student->student_slug) }}" class="btn btn-sm btn-info">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        No records found
                                    @endforelse
                                </tbody>

                                </table>
                            </div>
                        </div>
                </div>
             </div>
            </div>
          </div>
    </div>
@endsection

@section('script')
    @include('panel.utils.datatables.script')
@endsection