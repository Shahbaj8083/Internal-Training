<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/e6327647f7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="card container d-flex justify-content-center mt-5" style="width:60rem;">
        <div class="card-header">
            <a href="/myform" class="btn btn-dark">Add User <i class="fa-sharp fa-solid fa-plus"></i></a>
        </div>
    </div>

    <div class="card container d-flex justify-content-center mt-3" style="width:60rem;">
        <table class="table table-striped table-bordered" id="myTable">
            <thead style="background:blue; color:white">
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Address Proof</th>
                    <th>Proof status</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>


                @php
                $i = 1;
                @endphp

                @foreach($emp as $e)
                <tr>
                    <td>@php echo $i++; @endphp</td>
                    <td>{{$e->fname}}</td>
                    <td>{{$e->lname}}</td>
                    <td>{{$e->email}}</td>
                    <td>{{$e->address_proof}}</td>
                    <td>
                        @if($e->proof_status == 1)
                        <button class="btn">
                            <span class="badge" style="background:green; color:white">Active</span>
                        </button>

                        @else
                        <button class="btn">
                            <span class="badge" style="background:red; color:white">Inactive</span>
                        </button>
                        @endif
                    </td>
                    <td>
                        <a href="{{url('/myform/edit')}}/{{$e->emp_id}}" class="text-primary">Edit<i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                        <a href="{{url('/myform/delete')}}/{{$e->emp_id}}" class="text-danger"> Delete<i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>