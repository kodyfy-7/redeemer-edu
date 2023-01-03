@extends('layouts.panelv2')

@section('title')
    Students
@endsection

@section('page_action')
    @if (auth()->user()->role->role_slug == 'admin')
        <a href="{{ route('students.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
    @endif
    
@endsection

@section('style')
    @include('panel.utils.datatables.style')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                <h2>Profile</h2>
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
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ asset('panelv2/images/user.png') }}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ $student->name }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $student->registration_id }}
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> {{ $student->classroom->classroom_name }}
                        </li>

                        <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> {{ $student->gender }}
                        </li>

                        <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> {{ $student->date_of_birth }}
                        </li>
                      </ul>

                      @if (auth()->user()->role->role_slug == 'admin')
                        <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br />
                      @endif

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Report Cards</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Classroom</th>
                                                    <th>Session</th>
                                                    <th>Term</th>
                                                    <th>Grade</th>
                                                    <th>Score</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($results as $result)
                                                    <tr>
                                                        <td>{{ $result->student->classroom->classroom_name }}</td>
                                                        <td>{{ $result->calendar_year->session }}</td>
                                                        <td>{{ $result->calendar_year->term }}</td>
                                                        <td>{{ $result->grade }}</td>
                                                        <td>{{ $result->mks_obtained }}</td>
                                                        <td>{{ $result->updated_at }}</td>
                                                        <td>
                                                          @if (auth()->user()->role->role_slug == 'admin')
                                                            <a class="btn btn-sm btn-info" href="{{ route('results.show', $result->result_slug) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                                          @else
                                                            <a class="btn btn-sm btn-info" href="{{ route('my.result.show', $result->result_slug) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                                          @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                          </div>
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