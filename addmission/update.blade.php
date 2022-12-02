<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('path/head')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('path/navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            @include('path/sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <form action="{{ url('/update' ,$admission->id) }}" method="POST" enctype="multipart/form-data">
                                            @if(Session::get('success'))
                                            <div class="alert alert-success" role="alert">
                                                {{Session::get('success')}}
                                            </div>
                                            @endif

                                            @if(Session::get('fail'))
                                            <div class="alert alert-fail"></div>
                                            {{Session::get('fail')}}
                                            @endif

                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Name <span style="color:red;">*</span><span style="color:red"> </span></label>
                                                    <input type="text" class="form-control" name="name" value="{{$admission->name}}">
                                                    <span class="text-danger">
                                                        @error('name')
                                                        {{$message}}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Photo Of Student<span style="color:red;">*</span><span style="color:red"> </span> </label>
                                                    <input type="file" class="form-control" name="image"  value="{{$admission->image}}">
                                                    <span class="text-danger">
                                                        @error('image')
                                                        {{$message}}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>School Id <span style="color:red;">*</span><span style="color:red"> </span></label>
                                                    <input type="number" class="form-control" name="roll_number" value="{{$admission->roll_number}}">
                                                    <span class="text-danger">
                                                        @error('roll_number')
                                                        {{$message}}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Date of Birth <span style="color:red;">*</span><span style="color:red"> </span></label>
                                                    <input type="date" class="form-control" name="dob"  value="{{$admission->dob}}">
                                                    <span class="text-danger">
                                                        @error('dob')
                                                        {{$message}}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="col-md-8">
                                                    <label>Address<span style="color:red;">*</span><span style="color:red"> </span> </label>
                                                    <input type="text" class="form-control" name="address" value="{{ $admission->address }}">
                                                    <span class="text-danger">
                                                        @error('address')
                                                        {{$message}}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>father's_name <span style="color:red;">*</span><span style="color:red"> </span></label>
                                                    <input type="text" class="form-control" name="father_name"  value="{{$admission->father_name}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Father's Profession <span style="color:red;">*</span><span style="color:red"> </span></label>
                                                    <input type="text" class="form-control" name="f_profession" value="{{$admission->f_profession}}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Father's contact number <span style="color:red;">*</span></label>
                                                    <input type="number" class="form-control" name="f_contact" required="" value="{{$admission->f_contact}}">
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Mother's Name <span style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" name="mother_name" required="" value="{{$admission->mother_name}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Mother's profession <span style="color:red;">*</span> </label>
                                                    <input type="text" class="form-control" name="m_profession" value="{{$admission->m_profession}}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mother's contact number <span style="color:red;">*</span> </label>
                                                    <input type="number" class="form-control" name="m_contact" value="{{$admission->m_contact}}">
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Emergency contact number <span style="color:red;">*</span></label>
                                                    <input type="number" class="form-control" name="emergency_number" value="{{$admission->emergency_number}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Date of admission to the school <span style="color:red;">*</span> </label>
                                                    <input type="date" class="form-control" name="date_of_addmission" value="{{$admission->date_of_addmission}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="medium" class="col-form-label"> Whether admitted under RTE policy? Yes /No.<br><span style="color:red;">*</span>
                                                        <label class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="rte" checked="" class="custom-control-input"  @if($admission->rte) Checked @endif value="Yes"><span class="custom-control-label">Yes</span>
                                                        </label>
                                                        <label class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="rte" class="custom-control-input"@if($admission->rte) Checked @endif  value="No"><span class="custom-control-label">No</span>
                                                        </label>
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Class in which admitted <span style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" name="class_admitted" value="{{$admission->class_admitted}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>SAMARG ID Number <span style="color:red;">*</span> </label>
                                                    <input type="number" class="form-control" name="samarg_id" value="{{$admission->samarg_id}}">
                                                </div>

                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Siblings' Names and ages <span style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" name="sibling" placeholder="siblings name1" value="{{$admission->sibling}}"><br>
                                                    <input type="text" class="form-control" name="sibling" placeholder="siblings name2">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>AADHAR CARD Number <span style="color:red;">*</span></label>
                                                    <input type="number" class="form-control" name="aadhar_number" value="{{$admission->aadhar_number}}">
                                                </div>

                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Date left the school <span style="color:red;">*</span></label>
                                                    <input type="text" class="form-control" name="d_left_school" value="{{$admission->d_left_school}}">

                                                </div>
                                                <div class="col-md-6">
                                                    <label>Date of issuance of Transfer Certificate and number</label>
                                                    <input type="text" class="form-control" name="d_of_issuance" value="{{$admission->d_of_issuance}}">
                                                </div>

                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Remark <span style="color:red;">*</span> </label>
                                                    <input type="text" class="form-control" name="remark" value="{{$admission->remark}}">

                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('path/footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/chart.js"></script>
    <!-- End custom js for this page-->
</body>

</html>