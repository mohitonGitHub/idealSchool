<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>; -->
    <title>Show Data</title>
</head>
<body>
    <div class="container mt-5">
        <h2></h2>
        <table class="table" style="border: 1px;">
        <button class="btn btn-primary" >ADD STUDENT
        <a href="{{url('/admission')}}"></a></button>
            <thead>
                <tr class="lead">
                    <th>Name</th>
                    <th>student photos</th>
                    <th>Roll Number</th>
                    <th>Date of birth</th>
                    <th>Address</th>
                    <!-- <th>Father's Name</th>
                    <th>Father's Profession</th>
                    <th>Father's contact number</th>
                    <th>Mother's Name</th>
                    <th>Mother's profession</th>
                    <th>Mother's contact number</th>
                    <th>Emergency contact number</th>
                    <th>Date of admission to the school</th>
                    <th>Whether admitted under RTE policy? Yes /No.</th>
                    <th>Class in which admitted</th>
                    <th>Siblings' Names and ages:</th>
                    <th>SAMARG ID Number</th>
                    <th>AADHAR CARD Number</th>
                    <th>Date left the school</th>
                    <th>Date of issuance of Transfer Certificate and number</th>
                    <th>Remarks</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($show as $sh)
                <tr>
                    <td value="{{ $sh->name }}">{{$sh->name}}</td>
                    <td value="{{ $sh->image }}"> {{ $sh->image }} </td>
                    <td value="{{ $sh->roll_number }}">{{ $sh->roll_number }}</td>
                    <td value="{{ $sh->dob }}"> {{ $sh->dob }} </td>
                    <td value="{{ $sh->address }}"> {{ $sh->address }} </td>
                     <td>
                     <a href="{{url('/')}}"> <span class="	glyphicon glyphicon-eye-open"></span> view</a>
                     <a href="{{url('/edit', $sh->id)}}"> <span class="glyphicon glyphicon-edit"></span> update</a>
                     <a href="{{url('/delete', $sh->id)}}"> <span class="	glyphicon glyphicon-trash"></span>Deletes</a>
                    </td>

                </tr>
                @endforeach
            </tbody>

            </tbody>

        </table>

    </div>
    
</body>



</html>


