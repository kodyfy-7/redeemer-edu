@extends('layouts.panelv2')

@section('pageStatus')
  firstPage
@endsection

@section('style')
<style>
    .small-box {
  border-radius: 0.25rem;
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  display: block;
  margin-bottom: 20px;
  position: relative;
}

.small-box > .inner {
  padding: 10px;
}

.small-box > .small-box-footer {
  background: rgba(0, 0, 0, 0.1);
  color: rgba(255, 255, 255, 0.8);
  display: block;
  padding: 3px 0;
  position: relative;
  text-align: center;
  text-decoration: none;
  z-index: 10;
}

.small-box > .small-box-footer:hover {
  background: rgba(0, 0, 0, 0.15);
  color: #ffffff;
}

.small-box h3 {
  font-size: 2.2rem;
  font-weight: bold;
  margin: 0 0 10px 0;
  padding: 0;
  white-space: nowrap;
}

@media (min-width: 992px) {
  .col-xl-2 .small-box h3,
  .col-lg-2 .small-box h3,
  .col-md-2 .small-box h3 {
    font-size: 1.6rem;
  }
  .col-xl-3 .small-box h3,
  .col-lg-3 .small-box h3,
  .col-md-3 .small-box h3 {
    font-size: 1.6rem;
  }
}

@media (min-width: 1200px) {
  .col-xl-2 .small-box h3,
  .col-lg-2 .small-box h3,
  .col-md-2 .small-box h3 {
    font-size: 2.2rem;
  }
  .col-xl-3 .small-box h3,
  .col-lg-3 .small-box h3,
  .col-md-3 .small-box h3 {
    font-size: 2.2rem;
  }
}

.small-box p {
  font-size: 1rem;
}

.small-box p > small {
  color: #f8f9fa;
  display: block;
  font-size: 0.9rem;
  margin-top: 5px;
}

.small-box h3,
.small-box p {
  z-index: 5;
}

.small-box .icon {
  color: rgba(0, 0, 0, 0.15);
  z-index: 0;
}

.small-box .icon > i {
  font-size: 90px;
  position: absolute;
  right: 15px;
  top: 15px;
  transition: all 0.3s linear;
}

.small-box .icon > i.fa, .small-box .icon > i.fas, .small-box .icon > i.far, .small-box .icon > i.fab, .small-box .icon > i.glyphicon, .small-box .icon > i.ion {
  font-size: 70px;
  top: 20px;
}

.small-box:hover {
  text-decoration: none;
}

.small-box:hover .icon > i {
  font-size: 95px;
}

.small-box:hover .icon > i.fa, .small-box:hover .icon > i.fas, .small-box:hover .icon > i.far, .small-box:hover .icon > i.fab, .small-box:hover .icon > i.glyphicon, .small-box:hover .icon > i.ion {
  font-size: 75px;
}

@media (max-width: 767.98px) {
  .small-box {
    text-align: center;
  }
  .small-box .icon {
    display: none;
  }
  .small-box p {
    font-size: 12px;
  }
}

</style>
    
@endsection

@section('content')
@if (auth()->user()->role->role_slug == 'admin')
    <!-- top tiles -->
    {{-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Session</span>
                <div class="count"><small>{{ $year->session }}</small></div>
                <span class="count_bottom"><i class="green">{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Students</span>
                <div class="count green">{{ $students }}</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Employees</span>
                <div class="count">{{ $employees }}</div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
        
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $year->session }}</h3>
                    <p>{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">Session <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $students }}</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Students <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $employees }}</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Employees <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $year->session }}</h3>
                    <p>{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">Session <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row" style="display: inline-block;">
        <div class="top_tiles">
          <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
              <div class="count">{{ $year->session }}</div>
              <h3>Session</h3>
              <p>{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-comments-o"></i></div>
              <div class="count">{{ $students }}</div>
              <h3>Students</h3>
              <p>&nbsp;</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-comments-o"></i></div>
              <div class="count">{{ $employees }}</div>
              <h3>Employees</h3>
              <p>&nbsp;</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-calendar"></i></div>
              <div class="count">179</div>
              <h3>New Sign ups</h3>
              <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-check-square-o"></i></div>
              <div class="count">179</div>
              <h3>New Sign ups</h3>
              <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
          </div>
        </div>
      </div> --}}
    <!-- /top tiles -->
@else
    <!-- top tiles -->
    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $year->session }}</h3>
                    <p>{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">Session <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <div class="small-box bg-primary">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ count(auth()->user()->guardian->guardianWards) }}</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">{{ \Str::plural('Child', count(auth()->user()->guardian->guardianWards)) }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $employees }}</h3>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Employees <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="color: #ffffff">
                    <h3>{{ $year->session }}</h3>
                    <p>{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">Session <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
    </div>
    {{-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-6 col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Session</span>
                <div class="count"><small>{{ $year->session }}</small></div>
                <span class="count_bottom"><i class="green">{{ $year->term == 1 ? 'First' : ($year->term == 2 ? 'Second' : 'Third') }} </i> Term</span>
            </div>
            <div class="col-md-6 col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> {{ \Str::plural('Child', count(auth()->user()->guardian->guardianWards)) }}</span>
                <div class="count green">{{ count(auth()->user()->guardian->guardianWards) }}</div>
            </div>        
        </div>
    </div> --}}
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ \Str::plural('Child', count(auth()->user()->guardian->guardianWards)) }}</h2>
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
                                        <th>Rgistration ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (auth()->user()->guardian->guardianWards as $ward)                        
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ward->student->registration_id }}</td>
                                        <td>{{ $ward->student->name }}</td>
                                        <td>
                                            <a href="{{ route('my.student.show', $ward->student->student_slug) }}" class="btn btn-sm btn-info">
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
@endif
@endsection