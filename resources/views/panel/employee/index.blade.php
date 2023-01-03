@extends('layouts.panelv2')

@section('title')
  Employees
@endsection

@section('page_action')
    <a href="{{ route('employees.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
@endsection

@section('style')
    @include('panel.utils.datatables.style')
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of employees</h2>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Class</th>
                        <th>Mobile Number</th>
                        <th class="text-end">Action</th>
                      </tr>
                    </thead>


                    <tbody>
                      @forelse ($employees as $employee)
                        <tr>
                            <td>
                                {{ $loop->iteration ?? '-'}}
                            </td>
                            <td>
                              <a href="{{ route('employees.show', $employee->employee_slug) }}">{{ $employee->title }} {{ $employee->name }}</a>
                            </td> 
                            <td>
                                @if ($employee->role->role_title == 'Administrator')
                                    <span class="badge badge-success">
                                        {{ $employee->role->role_title  }}
                                    </span> 
                                @elseif ($employee->role->role_title == 'Teacher')
                                    <span class="badge badge-info">
                                        {{ $employee->role->role_title  }}
                                    </span> 
                                @else

                                @endif
                            </td>
                            <td>
                                
                                @if ($employee->role->role_title == 'Teacher')
                                <span class="badge badge-primary">{{ $employee->classroom->classroom_name ?? 'No class'  }}</span> 
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $employee->phone_number ?? '-'  }}</td>
                            <td>
                              <a href="{{ route('employees.edit', $employee->employee_slug) }}" class="btn btn-sm btn-warning">
                                <i class="glyphicon glyphicon-edit"></i> Edit
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