use Illuminate\Support\Facades\DB;
<!DOCTYPE html>
<html lang="en">

<head>
    @include('include/head')
    <style>
        li.col-md-6.nav-item {
            padding: 0;
            text-align: center;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: #ffffff;
            background-color: #0090e700;
            border-bottom: 1px solid #0090e7;
            transition: ease-in-out 0.2s;
        }

        .nav-tabs .nav-link {
            background: #00000000 !important;
            color: #ffffff;
            border-radius: 0;
            border: #00000000;
            padding: 0.75rem 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        @include('include/sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            @include('include/navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Make Payment </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Fee</li>
                                <li class="breadcrumb-item"><a href="#">make-payment</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Student Info</h4>
                                </div>
                                <div class="card-block">
                                    <!-- Row start -->
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="container">
                                                @if (Session::get('success'))
                                                <div class="alert alert-success text-center">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    {{ Session::get('success') }}
                                                </div>
                                                @endif
                                                @if (Session::get('danger'))
                                                <div class="alert alert-danger text-center">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    {{ Session::get('danger') }}
                                                </div>
                                                @endif
                                            </div>
                                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                                <li class="nav-item col-md-6">
                                                    <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-selected="true">Search By Regi. No.</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item col-md-6">
                                                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-selected="false">Search By Class</a>
                                                    <div class="slide"></div>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content card-block  ">
                                                <div class="tab-pane active show" id="home3" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-default">
                                                                <label>Student Regi. No.<span style="color:red" id="allot_academic_err"></span></label>
                                                                <input type="text" name="student_regi_no" class="form-control" id="student_regi_no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-default" style="float:right">
                                                            <button type="button" id="searchForStudent2" class="btn btn-primary btn-sm" style="pointer-events:none;">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="profile3" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-default">
                                                                <label>Class <span style="color:red" id="allot_class_err"> </span></label>
                                                                <select name="class_name" class="form-control js-example-basic-single select2-hidden-accessible" id="class_name" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select Class-</option>
                                                                    @foreach($class as $r)
                                                                    <option value="{{ $r->id }}">{{ $r->class_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-default">
                                                                <label>Section <span style="color:red" id="section_err"> </span></label>
                                                                <select name="section_name" class="form-control js-example-basic-single select2-hidden-accessible" id="sec_name" tabindex="-1" aria-hidden="true">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-default">
                                                                <label>Roll No. <span style="color:red" id="roll_err"> </span></label>
                                                                <input type="text" name="roll_no" class="form-control" id="roll_no">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="form-group form-default" style="float:right">
                                                                <button type="button" id="searchForStudent" class="btn btn-primary btn-sm">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                    <!-- <div class="row" style="padding: 10px;">
                                        <div class="col-md-4">
                                            <div class="form-group form-default" id="student_name">
                                                <label>Student Name <span style="color:red" id=""> </span></label> 
                                                <input type="text" id="close" name="student_name" readonly class="form-control" style="background-color: #efe9e900;">                                               
                                            </div>
                                        </div>                                       
                                    </div> -->
                                </div>
                            </div>
                            <!-- Material tab card end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pay Fee</h5>
                                </div>
                                <div class="card-block">
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger icons-alert">
                                                <p><strong>Note!</strong> Search Student First</p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group form-default" style="margin: 10px;">
                                                <label>Fee Head <span style="color:red" id=""> </span></label>
                                                <select name="fee_head" class="form-control js-example-basic-single" id="">
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Fee Head</th>
                                                            <th class="text-center">Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <form method="POST" action="{{ url('/payFee/storePayment') }}" id="submitForm">
                                                    @csrf
                                                    <table class="table table-striped" id="print">
                                                    </table>
                                                    <div class="row m-3">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary" type="submit">Pay Fees</button>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('include/footer')
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="../../assets/vendors/select2/select2.min.js"></script> -->
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>
<script>
    $(document).ready(function() {
        // -----------------------------------------
        $('#class_name').on('change', function() {
            var classID = $(this).val();
            if (classID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/fee/pay-fee/sectionList') }}?class_id=" + classID,
                    success: function(res) {
                        if (res) {
                            $("#sec_name").empty();
                            $("#sec_name").append('<option>Select Section</option>');
                            $.each(res, function(key, value) {
                                $("#sec_name").append('<option value="' + value.id + '">' + value.section_name + '</option>');
                            });
                        } else {
                            $("#sec_name").empty();
                        }
                    }
                });
            } else {
                $("#sec_name").empty();
            }
        });
        $('#student_regi_no').click(function() {
            $('#searchForStudent2').css({
                'pointer-events': 'auto',
            });
        });
        // fertching data by class 
        $('#searchForStudent').on('click', function() {
            // $('#close').css('display', 'none');      
            $('.closeTd').css('display', 'none');
            var class_id = $('#class_name').val();
            var sec_id = $('#sec_name').val();
            var roll_no = $('#roll_no').val();
            var data = {
                'class_id': class_id,
                'sec_id': sec_id,
                'roll_no': roll_no
            }
            if (data) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/fee/pay-fee/getStudentList') }}",
                    data: data,
                    success: function(res) {
                        console.log(res);
                        var amt1 = res[0];
                        var amt2 = res[1];
                        var amt3 = res[2];
                        // var total = parseInt(amt1) + parseInt(amt2) + parseInt(amt3);
                        console.log(amt3);
                        if (res) {
                            $.each(amt1, function(key, value) {
                                $('#print').append(`<tr class="closeTd">
                                                            <th class="py-4">Student ID</th>
                                                            <td><input type="text" class="form-control" id="studentId" readonly name="studentId" value="${ value.id }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Student Name</th>
                                                            <td><input type="text" class="form-control" id="studentName" readonly name="studentName" value="${ value.student_name }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Registration No</th>
                                                            <td><input type="text" class="form-control" id="regNo" readonly name="regNo" value="${ value.regi_no }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                            <tr class="closeTd">
                                                            <th class="py-4">Fee head</th>
                                                            <td><input type="text" class="form-control" id="feeHead" readonly name="feeHead" value="${ value.fee_head }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Session</th>
                                                            <td><input type="text" class="form-control" id="session" readonly name="session" value="" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Class</th>
                                                            <td>
                                                                <input type="text" class="form-control" id="className" readonly name="" value="${ value.class_name }" style="background-color: #2A3038;">
                                                                <input type="text" class="form-control hidden" id="classId" readonly name="classId" value="${ value.class_id }" style="background-color: #2A3038; display: none;">
                                                            </td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Section</th>
                                                            <td>
                                                                <input type="text" class="form-control" id="sectionName" readonly name="sectionName" value="${ value.section_name }" style="background-color: #2A3038;">
                                                                <input type="text" class="form-control hidden" id="sectionId" readonly name="sectionId" value="${ value.section_id }" style="background-color: #2A3038; display: none;">
                                                            </td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Academic Year</th>
                                                            <td><input type="text" class="form-control" id="academicYearId" readonly name="academicYearId" value="(${value.from_academic_year }) - (${ value.to_academic_year })" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Total Amount</th>
                                                            <td><input type="text" class="form-control" id="totalAmt" name="totalAmt" readonly value="${ amt3 }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Paid Amount <span style="color:red;">*</span><span style="color:red" id=""> </span></th>
                                                            <td><input type="text" class="form-control" id="paidAmt" name="paidAmt" value="0.00"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Due Amount</th>
                                                            <td><input type="text" class="form-control" id="dueAmt" name="dueAmt" readonly value="0.00" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Due Date</th>
                                                            <td><input type="date" class="form-control" id="dueDate" name="dueDate"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Payment Date</th>
                                                            <td><input type="date" class="form-control" id="paymentDate" name="paymentDate" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Recived By</th>
                                                            <td><input type="text" class="form-control" id="recivedBy" name="recivedBy" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Remark</th>
                                                            <td><input type="text" class="form-control" id="remark" name="remark" style="background-color: #2A3038;"></td>
                                                        </tr>`);
                            });
                            $('#paidAmt').on('change', function() {
                                var paid = $('#paidAmt').val();
                                console.log(paid);
                                var dueAmt = amt3 - paid;
                                console.log(dueAmt);
                                $('#dueAmt').val(dueAmt);
                            });
                        } else {
                            console.log('only one');
                        }
                    }
                });
            } else {
                console.log('Entry denied!');
            }
        });
        // fertching data by registration no
        $('#searchForStudent2').on('click', function() {
            $('.closeTd').css('display', 'none');
            var regiNo = $('#student_regi_no').val();
            var feeHead = $('#val').val();
            var data = {
                'regiNo': regiNo,
                'feeHead': feeHead
            }
            if (data) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/fee/pay-fee/getStudentList2') }}",
                    data: data,
                    success: function(res) {
                        var amt1 = res[0];
                        var amt2 = res[1];
                        var amt3 = res[2];
                        // var total = parseInt(amt1) + parseInt(amt2) + parseInt(amt3);
                        console.log(amt3);
                        if (res) {
                            $.each(amt1, function(key, value) {
                                $('#print').append(`    <tr class="closeTd">
                                                            <th class="py-4">Student ID</th>
                                                            <td><input type="text" class="form-control" id="studentId" readonly name="studentId" value="${ value.id }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Student Name</th>
                                                            <td><input type="text" class="form-control" id="studentName" readonly name="studentName" value="${ value.student_name }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Registration No</th>
                                                            <td><input type="text" class="form-control" id="regNo" readonly name="regNo" value="${ value.regi_no }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                            <tr class="closeTd">
                                                            <th class="py-4">Fee head</th>
                                                            <td><input type="text" class="form-control" id="feeHead" readonly name="feeHead" value="${ value.fee_head }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Session</th>
                                                            <td><input type="text" class="form-control" id="session" readonly name="session" value="" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Class</th>
                                                            <td>
                                                                <input type="text" class="form-control" id="className" readonly name="" value="${ value.class_name }" style="background-color: #2A3038;">
                                                                <input type="text" class="form-control hidden" id="classId" readonly name="classId" value="${ value.class_id }" style="background-color: #2A3038; display: none;">
                                                            </td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Section</th>
                                                            <td>
                                                                <input type="text" class="form-control" id="sectionName" readonly name="sectionName" value="${ value.section_name }" style="background-color: #2A3038;">
                                                                <input type="text" class="form-control hidden" id="sectionId" readonly name="sectionId" value="${ value.section_id }" style="background-color: #2A3038; display: none;">
                                                            </td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th class="py-4">Academic Year</th>
                                                            <td><input type="text" class="form-control" id="academicYearId" readonly name="academicYearId" value="(${value.from_academic_year }) - (${ value.to_academic_year })" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Total Amount</th>
                                                            <td><input type="text" class="form-control" id="totalAmt" name="totalAmt" readonly value="${ amt3 }" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Paid Amount <span style="color:red;">*</span><span style="color:red" id=""> </span></th>
                                                            <td><input type="text" class="form-control" id="paidAmt" name="paidAmt" value="0.00"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Due Amount</th>
                                                            <td><input type="text" class="form-control" id="dueAmt" name="dueAmt" readonly value="0.00" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Due Date</th>
                                                            <td><input type="date" class="form-control" id="dueDate" name="dueDate"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Payment Date</th>
                                                            <td><input type="date" class="form-control" id="paymentDate" name="paymentDate" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Recived By</th>
                                                            <td><input type="text" class="form-control" id="recivedBy" name="recivedBy" style="background-color: #2A3038;"></td>
                                                        </tr>
                                                        <tr class="closeTd">
                                                            <th>Remark</th>
                                                            <td><input type="text" class="form-control" id="remark" name="remark" style="background-color: #2A3038;"></td>
                                                        </tr>`);
                                return false;
                            });
                            $('#paidAmt').on('change', function() {
                                var paid = $('#paidAmt').val();
                                console.log(paid);
                                var dueAmt = amt3 - paid;
                                console.log(dueAmt);
                                $('#dueAmt').val(dueAmt);
                            });
                        } else {
                            console.log('only one');
                        }
                    }
                });
            } else {
                console.log('Entry denied!');
            }
        });
        $('#PaymentSave').on('click', function() {
            var studentId = $('#studentId').val();
            var studentName = $('#student_name').val();
            var regNo = $('#regNo').val();
            var feeHead = $('#FeeHead').val();
            var session = $('#session').val();
            var session = $('#session1').val();
            var session = $('#session2').val();
            var session = $('#session2').val();
            var classId = $('#classId').val();
            var sectionId = $('#sectionId').val();
            var academicYearId = $('#academicYearId').val();
            var totalAmt = $('#totalAmt').val();
            var paidAmt = $('#paidAmt').val();
            var dueAmt = $('#dueAmt').val();
            var dueDate = $('#dueDate').val();
            var paymentDate = $('#paymentDate').val();
            var recivedBy = $('#recivedBy').val();
            var remark = $('#remark').val();
            var Data = {
                'studentId': studentId,
                'studentName': studentName,
                'regNo': regNo,
                'feeHead': feeHead,
                'session': session,
                'classId': classId,
                'sectionId': sectionId,
                'academicYearId': academicYearId,
                'totalAmt': totalAmt,
                'paidAmt': paidAmt,
                'dueDate': dueDate,
                'dueAmt': dueAmt,
                'paymentDate': paymentDate,
                'recivedBy': recivedBy,
                'remark': remark,
            };
            console.log(Data);
            $.ajax({
                type: "GET",
                url: "{{ url('/payFee/storePayment') }}",
                data: {
                    data: Data
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
        // --------------------------------------------------------------       
    });
</script>

</html>