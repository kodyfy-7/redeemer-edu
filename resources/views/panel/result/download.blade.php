<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="text-center">
                                <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mt-5">
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
                            </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Name:</strong> </td>
                                    <td>{{ $result->student->name }}</td>
                                    <td><strong>Gender: </strong></td>
                                    <td>{{ $result->student->gender }}</td>
                                    <td><strong>Age: </strong></td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td><strong>Class</strong> </td>
                                    <td>{{ $result->student->classroom->classroom_name }}</td>
                                    <td><strong>Registration ID: </strong></td>
                                    <td colspan="3">{{ $result->student->registration_id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>No in class:</strong> </td>
                                    <td>19</td>
                                    <td><strong>Term: </strong></td>
                                    <td>{{ $year->term }}</td>
                                    <td><strong>Session: </strong></td>
                                    <td>{{ $year->session }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12">
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
                                        </tr>
                                    @empty
                                        No data
                                    @endforelse
                                    <tr>
                                        <td colspan="7" align="right">Attendance</td>
                                        <td>79</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">Total</td>
                                        <td>{{ $result->mks_obtained }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">Average</td>
                                        <td>{{ $result->average }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">Grade</td>
                                        <td>{{ $result->grade }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" align="center">Teacher's Comment
                                        </td>
                                        <td colspan="6" align="center">{{ $result->comment }}</td>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!--<table id="examp" style="border: 1px solid black;">-->
                    <!--    <table class="table table-bordered table-center mb-0 datatable">-->
                    <!--        <tr class="text-center">-->
                    <!--            <td>-->
                    <!--                <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="...">-->
                    <!--            </td>-->
                    <!--            <td>-->
                    <!--                <table class="table table-bordered" style="float:right; margin-top:0">-->
                    <!--                    <tr class="text-center">-->
                    <!--                        <td>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>-->
                    <!--                    </tr>-->
                    <!--                    <tr class="text-center">-->
                    <!--                        <td>1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>-->
                    <!--                    </tr>-->
                    <!--                    <tr class="text-center">-->
                    <!--                        <td>Tel: 08035132506-->
                    <!--                        </td>-->
                    <!--                    </tr>    -->
                    <!--            </table></td>-->
                    <!--        </tr>-->
                    <!--    </table>-->
                    <!--    <br> <br>-->
                    <!--    <table class="table table-bordered">-->
                    <!--        <tr>-->
                    <!--            <td><strong>Name:</strong> </td>-->
                    <!--            <td>{{ $result->student->name }}</td>-->
                    <!--            <td><strong>Gender: </strong></td>-->
                    <!--            <td>{{ $result->student->gender }}</td>-->
                    <!--            <td><strong>Age: </strong></td>-->
                    <!--            <td></td>-->
                    <!--        </tr>-->
                    <!--        <tr>-->
                    <!--            <td><strong>Class</strong> </td>-->
                    <!--            <td>{{ $result->student->classroom->classroom_name }}</td>-->
                    <!--            <td><strong>Registration ID: </strong></td>-->
                    <!--            <td colspan="3">{{ $result->student->registration_id }}</td>-->
                    <!--        </tr>-->
                    <!--        <tr>-->
                    <!--            <td><strong>No in class:</strong> </td>-->
                    <!--            <td></td>-->
                    <!--            <td><strong>Term: </strong></td>-->
                    <!--            <td>{{ $year->term }}</td>-->
                    <!--            <td><strong>Session: </strong></td>-->
                    <!--            <td>{{ $year->session }}</td>-->
                    <!--        </tr>-->
                    <!--    </table>-->
    
                    <!--    <br>-->
                    <!--        <table id="example1" class="table table-bordered table-striped table-responsive">-->
                    <!--            <thead>-->
                    <!--                <tr>-->
                    <!--                    <th width="5%">S/N</th>-->
                    <!--                    <th width="auto">Subject</th>-->
                    <!--                    <th width="auto">Project</th>-->
                    <!--                    <th width="auto">Assignment</th>-->
                    <!--                    <th width="auto">Assessment</th>-->
                    <!--                    <th width="auto">Exam</th>-->
                    <!--                    <th width="auto">Total</th>-->
                    <!--                    <th width="auto">Grade</th>-->
                    <!--                    <th width="auto">Comment</th>-->
                    <!--                    <th width="auto">Position</th>-->
                    <!--                </tr>-->
                    <!--            </thead>-->
                    <!--            <tbody>-->
                    <!--                @forelse ($details as $detail)-->
                    <!--                    <tr>-->
                    <!--                        <td> {{ $loop->iteration }} </td>-->
                    <!--                        <td> {{ $detail->subject->subject_title }} </td>-->
                    <!--                        <td>  {{ $detail->project }}</td>-->
                    <!--                        <td>  {{ $detail->assignment }}</td>-->
                    <!--                        <td> {{ $detail->assessment }}</td>-->
                    <!--                        <td> {{ $detail->exam }}</td>-->
                    <!--                        <td> {{ $detail->total }}</td>-->
                    <!--                        <td> {{ $detail->grade }}</td>-->
                    <!--                        <td> {{ $detail->comment }}</td>-->
                    <!--                        <td> {{ $detail->position }}</td>-->
                    <!--                    </tr>-->
                    <!--                @empty-->
                    <!--                    No data-->
                    <!--                @endforelse-->
                    <!--                {{-- <tr>-->
                    <!--                    <td colspan="7" align="right">Attendance</td>-->
                    <!--                    <td>79</td>-->
                    <!--                </tr> --}}-->
                    <!--                <tr>-->
                    <!--                    <td colspan="9" align="right">Total</td>-->
                    <!--                    <td>{{ $result->mks_obtained }}</td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td colspan="9" align="right">Average</td>-->
                    <!--                    <td>{{ $average }}</td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td colspan="9" align="right">Grade</td>-->
                    <!--                    <td>{{ $grade }}</td>-->
                    <!--                </tr>-->
                    <!--            </tbody>-->
                    <!--            {{-- <tfoot>-->
                    <!--                <tr>-->
                    <!--                    <td colspan="2" align="center">Teacher's Comment-->
                    <!--                    </td>-->
                    <!--                    <td colspan="6" align="center">{{ $result->comment }}</td>-->
                    <!--                </tr>-->
                    <!--            </tfoot> --}}-->
                    <!--        </table> -->
                            
                    <!--    </table>-->
                    <!--</table>-->
                    <table class="table" style="border-collapse: collapse; border: 1px solid black;">
                        <tr class="text-center" style="padding: 8px; border: 1px solid black;">
                                            <td>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>
                                          </tr>
                                          <tr class="text-center" style="padding: 8px; border: 1px solid black;">
                                            <td>1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>
                                          </tr>
                                          <tr class="text-center" style="padding: 8px; border: 1px solid black;">
                                            <td>Tel: 08035132506</td>
                                          </tr>
                                    <!--<tr>-->
                                      <!--<td style="padding: 8px; border: 1px solid black;">-->
                                      <!--  <img src="{{ asset('front/assets/img/aboutImg.png') }}" class="me-3 flex-shrink-0" alt="...">-->
                                      <!--  {{-- <img src="https://res.cloudinary.com/uche-9ijakids/image/upload/v1663322573/200x200_qahr7h.png" class="me-3 flex-shrink-0" alt="..."> --}}-->
                                      <!--</td>-->
                                    <!--  <td>-->
                                    <!--    <table class="table table-bordered" style="float: right; margin-top: 0; border-collapse: collapse; border: 1px solid black;">-->
                                    <!--      <tr class="text-center" style="padding: 8px; border: 1px solid black;">-->
                                    <!--        <td>REDEEMER'S TREASURES INTERNATIONAL SCHOOLS</td>-->
                                    <!--      </tr>-->
                                    <!--      <tr class="text-center" style="padding: 8px; border: 1px solid black;">-->
                                    <!--        <td>1 Redemption Way Km 7, Benin Sapele RD, Benin City</td>-->
                                    <!--      </tr>-->
                                    <!--      <tr class="text-center" style="padding: 8px; border: 1px solid black;">-->
                                    <!--        <td>Tel: 08035132506</td>-->
                                    <!--      </tr>-->
                                    <!--    </table>-->
                                    <!--  </td>-->
                                    <!--</tr>-->
                                </table> 
                                  
                                <br>
                                <br>
                                  
                                <table class="table table-bordered">
                                <tr>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Name:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">{{ $result->student->name }}</td>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Gender:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">{{ $result->student->gender }}</td>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Age:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">-</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Class</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">{{ $result->student->classroom->classroom_name }}</td>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Registration ID:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;" colspan="3">{{ $result->student->registration_id }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>No in class:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">-</td>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Term:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">{{ $year->term }}</td>
                                    <td style="padding: 8px; border: 1px solid black;"><strong>Session:</strong></td>
                                    <td style="padding: 8px; border: 1px solid black;">{{ $year->session }}</td>
                                </tr>
                                </table>
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                        <th width="5%" style="padding: 8px; border: 1px solid black;">S/N</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Subject</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Project</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Assessment</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Exam</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Total</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Grade</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Comment</th>
                                        <th width="auto" style="padding: 8px; border: 1px solid black;">Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($details as $detail)
                                        <tr>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $loop->iteration }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->subject->subject_title }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->project }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->assessment }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->exam }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->total }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->grade }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->comment }}</td>
                                            <td style="padding: 8px; border: 1px solid black;">{{ $detail->position }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td style="padding: 8px; border: 1px solid black;" colspan="9">No data</td>
                                        </tr>
                                        @endforelse
                                        {{-- <tr>
                                        <td style="padding: 8px; border: 1px solid black;" colspan="8" align="right">Total</td>
                                        <td style="padding: 8px; border: 1px solid black;">{{ $result->mks_obtained }}</td>
                                        </tr>
                                        <tr>
                                        <td style="padding: 8px; border: 1px solid black;" colspan="8" align="right">Average</td>
                                        <td style="padding: 8px; border: 1px solid black;">{{ $average }}</td>
                                        </tr>
                                        <tr>
                                        <td style="padding: 8px; border: 1px solid black;" colspan="8" align="right">Grade</td>
                                        <td style="padding: 8px; border: 1px solid black;">{{ $grade }}</td>
                                        </tr> --}}
                                    </tbody>
                                </table> 

                                <table class="table">
                                    <tr>
                                        <td colspan="8">Result Analysis</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px; border: 1px solid black;"><strong>Marks Obtainable</strong></td>
                                        <td style="padding: 8px; border: 1px solid black;">-</td>
                                        <td style="padding: 8px; border: 1px solid black;"><strong>Marks Obtained</strong></td>
                                        <td style="padding: 8px; border: 1px solid black;">{{ $result->mks_obtained }}</td>
                                        <td style="padding: 8px; border: 1px solid black;"><strong>Pupil's Average</strong></td>
                                        <td style="padding: 8px; border: 1px solid black;">{{ $average }}</td>
                                        <td style="padding: 8px; border: 1px solid black;"><strong>Grade</strong></td>
                                        <td style="padding: 8px; border: 1px solid black;">{{ $grade }}</td>
                                    </tr>
                                </table>

                                <table class="table">
                                    <tr>
                                        <td>
                                            <tr>
                                                <td colspan="2">Key to Grade</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>A+ (OUTSTANDING) = 90 - 100 </strong></td>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>C (GOOD) 60 - 69
                                                </strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>A (EXCELLENT) = 80 - 89 </strong></td>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>D (PASS) 50 - 59 </strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>B (VERY GOOD) = 70 - 79
                                                </strong></td>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>E (FAIR) 40 - 49
                                                </strong></td>
                                            </tr>
                                        </td>
                                        <td>
                                            <tr>
                                                <td colspan="2">Key to Grade</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>A+ (OUTSTANDING) = 90 - 100 </strong></td>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>C (GOOD) 60 - 69
                                                </strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>A (EXCELLENT) = 80 - 89 </strong></td>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>D (PASS) 50 - 59 </strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>B (VERY GOOD) = 70 - 79
                                                </strong></td>
                                                <td style="padding: 8px; border: 1px solid black;"><strong>E (FAIR) 40 - 49
                                                </strong></td>
                                            </tr>
                                        </td>
                                    </tr>
                                </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
