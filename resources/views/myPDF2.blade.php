<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title') ::: {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('panelv2/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('panelv2/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('panelv2/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('panelv2/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('panelv2/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('panelv2/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('panelv2/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    @yield('style')
    <!-- Custom Theme Style -->
    <link href="{{ asset('panelv2/build/css/custom.min.css') }}" rel="stylesheet">
    <style>
        .bordered-div {
          border: 1px solid black;
        }
        hr {
    border: 1px solid black;
  }
      </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            
                            <div class="x_content">
                                {{-- <table class="table">
                                    <table class="table table-center mb-0 datatable">
                                        <tr class="text-center">
                                            <td>
                                                <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">
                                            </td>
                                            <td>
                                                <table class="table table-bordered" style="float:right; margin-top:0">
                                                    <tr class="text-center">
                                                        <td>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td>1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td>Tel: 08035132506
                                                        </td>
                                                    </tr>    
                                            </table></td>
                                        </tr>
                                    </table>
                                    <br> <br>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>Name:</strong> </td>
                                            <td>{{ $result->student->name }}</td>
                                            <td><strong>Gender: </strong></td>
                                            <td>{{ $result->student->gender }}</td>
                                            <td><strong>Age: </strong></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Class</strong> </td>
                                            <td>{{ $result->student->classroom->classroom_name }}</td>
                                            <td><strong>Registration ID: </strong></td>
                                            <td colspan="3">{{ $result->student->registration_id }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>No in class:</strong> </td>
                                            <td>-</td>
                                            <td><strong>Term: </strong></td>
                                            <td>{{ $year->term }}</td>
                                            <td><strong>Session: </strong></td>
                                            <td>{{ $year->session }}</td>
                                        </tr>
                                    </table>
                
                                    <br>
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th width="5%">S/N</th>
                                                <th width="auto">Subject</th>
                                                <th width="auto">Project</th>
                                                <th width="auto">Assessment</th>
                                                <th width="auto">Exam</th>
                                                <th width="auto">Total</th>
                                                <th width="auto">Grade</th>
                                                <th width="auto">Comment</th>
                                                <th width="auto">Position</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($details as $detail)
                                                <tr>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $detail->subject->subject_title }} </td>
                                                    <td>  {{ $detail->project }}</td>
                                                    <td> {{ $detail->assessment }}</td>
                                                    <td> {{ $detail->exam }}</td>
                                                    <td> {{ $detail->total }}</td>
                                                    <td> {{ $detail->grade }}</td>
                                                    <td> {{ $detail->comment }}</td>
            
                                                    <td> {{ $detail->position }}</td>
                                                </tr>
                                            @empty
                                                No data
                                            @endforelse
                                            <tr>
                                                <td colspan="8" align="right">Total</td>
                                                <td>{{ $result->mks_obtained }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" align="right">Average</td>
                                                <td>{{ $average }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" align="right">Grade</td>
                                                <td>{{ $grade }}</td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </table> --}}
                                {{-- <table class="table">
                                    <tr>
                                      <td>
                                        <div class="row">
                                          <div class="col-3">
                                            <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">
                                          </div>
                                          <div class="col">
                                            <table class="table table-bordered">
                                              <tr class="text-center">
                                                <td>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>
                                              </tr>
                                              <tr class="text-center">
                                                <td>1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>
                                              </tr>
                                              <tr class="text-center">
                                                <td>Tel: 08035132506</td>
                                              </tr>
                                            </table>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                                        <thead>
                                                        <tr>
                                                            <th width="5%">S/N</th>
                                                            <th width="auto">Subject</th>
                                                            <th width="auto">Project</th>
                                                            <th width="auto">Assessment</th>
                                                            <th width="auto">Exam</th>
                                                            <th width="auto">Total</th>
                                                            <th width="auto">Grade</th>
                                                            <th width="auto">Comment</th>
                                                            <th width="auto">Position</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse ($details as $detail)
                                                            <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $detail->subject->subject_title }}</td>
                                                            <td>{{ $detail->project }}</td>
                                                            <td>{{ $detail->assessment }}</td>
                                                            <td>{{ $detail->exam }}</td>
                                                            <td>{{ $detail->total }}</td>
                                                            <td>{{ $detail->grade }}</td>
                                                            <td>{{ $detail->comment }}</td>
                                                            <td>{{ $detail->position }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                            <td colspan="9">No data</td>
                                                            </tr>
                                                        @endforelse
                                                        <tr>
                                                            <td colspan="8" align="right">Total</td>
                                                            <td>{{ $result->mks_obtained }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8" align="right">Average</td>
                                                            <td>{{ $average }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8" align="right">Grade</td>
                                                            <td>{{ $grade }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                          
                                    </tr>
                                </table> --}}

                                <div class="container-fluid">
                                    <div class="row bordered-div">
                                        <div class="col-md-6">
                                            <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">
                                        </div>
                                      <div class="col-md-6 bordered-div">
                                        <h3>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</h3>
                                        <hr>
                                        <p>1 Redemption Way Km 7, Benin Sapele RD, Benin City</p>
                                        <hr>
                                        <p>Tel: 08035132506</p>
                                      </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2"><strong>Name:</strong></div>
                                                <div class="col-md-2">Agboola Hadassah Imoleloluwa</div>
                                                <div class="col-md-2"><strong>Gender:</strong></div>
                                                <div class="col-md-2">Female</div>
                                                <div class="col-md-2"><strong>Age</strong></div>
                                                <div class="col-md-2">19</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
                                  
                                {{-- <table class="table">
                                    <tr>
                                        <td>
                                                <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">Tel: 08035132506</td>
                                    </tr>
                                    <tr>
                                      <td><strong>Name:</strong></td>
                                      <td>Agboola Hadassah Imoleloluwa</td>
                                      <td><strong>Gender:</strong></td>
                                      <td>Male</td>
                                      <td><strong>Age:</strong></td>
                                      <td>19</td>
                                    </tr>
                                    <tr>
                                      <td><strong>Class:</strong></td>
                                      <td>Nursery 1</td>
                                      <td><strong>Registration ID:</strong></td>
                                      <td>1</td>
                                    </tr>
                                    <tr>
                                      <td><strong>No in class:</strong></td>
                                      <td>2</td>
                                      <td><strong>Term</strong></td>
                                        <td>2</td>
                                        <td><strong>Term</strong></td>
                                        <td>2</td>
                                </table> --}}
                                  
                                {{-- use --}}
                                {{-- <table class="table">
                                    <tr>
                                      <td>
                                        <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">
                                      </td>
                                      <td>
                                        <table class="table table-bordered" style="float:right; margin-top:0">
                                          <tr class="text-center">
                                            <td>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>
                                          </tr>
                                          <tr class="text-center">
                                            <td>1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>
                                          </tr>
                                          <tr class="text-center">
                                            <td>Tel: 08035132506</td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                </table> 
                                  
                                <br>
                                <br>
                                  
                                <table class="table table-bordered">
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>{{ $result->student->name }}</td>
                                    <td><strong>Gender:</strong></td>
                                    <td>{{ $result->student->gender }}</td>
                                    <td><strong>Age:</strong></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><strong>Class</strong></td>
                                    <td>{{ $result->student->classroom->classroom_name }}</td>
                                    <td><strong>Registration ID:</strong></td>
                                    <td colspan="3">{{ $result->student->registration_id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>No in class:</strong></td>
                                    <td>-</td>
                                    <td><strong>Term:</strong></td>
                                    <td>{{ $year->term }}</td>
                                    <td><strong>Session:</strong></td>
                                    <td>{{ $year->session }}</td>
                                </tr>
                                </table>
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                    <th width="5%">S/N</th>
                                    <th width="auto">Subject</th>
                                    <th width="auto">Project</th>
                                    <th width="auto">Assessment</th>
                                    <th width="auto">Exam</th>
                                    <th width="auto">Total</th>
                                    <th width="auto">Grade</th>
                                    <th width="auto">Comment</th>
                                    <th width="auto">Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($details as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail->subject->subject_title }}</td>
                                        <td>{{ $detail->project }}</td>
                                        <td>{{ $detail->assessment }}</td>
                                        <td>{{ $detail->exam }}</td>
                                        <td>{{ $detail->total }}</td>
                                        <td>{{ $detail->grade }}</td>
                                        <td>{{ $detail->comment }}</td>
                                        <td>{{ $detail->position }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9">No data</td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                    <td colspan="8" align="right">Total</td>
                                    <td>{{ $result->mks_obtained }}</td>
                                    </tr>
                                    <tr>
                                    <td colspan="8" align="right">Average</td>
                                    <td>{{ $average }}</td>
                                    </tr>
                                    <tr>
                                    <td colspan="8" align="right">Grade</td>
                                    <td>{{ $grade }}</td>
                                    </tr>
                                </tbody>
                                </table> --}}
                                  
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
      </div>
  
      <!-- jQuery -->
      <script src="{{ asset('panelv2/vendors/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('panelv2/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('panelv2/vendors/fastclick/lib/fastclick.js') }}"></script>
      <!-- NProgress -->
      <script src="{{ asset('panelv2/vendors/nprogress/nprogress.js') }}"></script>
      <!-- Chart.js -->
      <script src="{{ asset('panelv2/vendors/Chart.js/dist/Chart.min.js') }}"></script>
      <!-- gauge.js -->
      <script src="{{ asset('panelv2/vendors/gauge.js/dist/gauge.min.js') }}"></script>
      <!-- bootstrap-progressbar -->
      <script src="{{ asset('panelv2/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
      <!-- iCheck -->
      <script src="{{ asset('panelv2/vendors/iCheck/icheck.min.js') }}"></script>
      <!-- Skycons -->
      <script src="{{ asset('panelv2/vendors/skycons/skycons.js') }}"></script>
      <!-- Flot -->
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.pie.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.time.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.stack.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.resize.js') }}"></script>
      <!-- Flot plugins -->
      <script src="{{ asset('panelv2/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/flot.curvedlines/curvedLines.js') }}"></script>
      <!-- DateJS -->
      <script src="{{ asset('panelv2/vendors/DateJS/build/date.js') }}"></script>
      <!-- JQVMap -->
      <script src="{{ asset('panelv2/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="{{ asset('panelv2/vendors/moment/min/moment.min.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
      
      @yield('script')
      <!-- Custom Theme Scripts -->
      <script src="{{ asset('panelv2/build/js/custom.min.js') }}"></script>
      
    </body>
  </html>
