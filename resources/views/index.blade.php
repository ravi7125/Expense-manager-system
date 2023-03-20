@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>  
</head>
<body id="page-top">         
            <div class="card shadow">
                <div class=" card-body">
                    <div class="table-responsive">
                    <table border="2" class="table table-hover table-green">
                      <thead class="thead-dark">
                                <tr>
                                   <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Bank Name</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Note</th>
                                    <th>Date</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $tc)
                                <tr>
                                    <td>{{$tc['id']}}</td>
                                    <td>{{$tc->account_users->name}}</td>
                                    <td>{{$tc->account->bankname}}</td>
                                    <td>{{$tc['amount']}}</td>
                                    <td>{{$tc['type']}}</td>
                                    <td>{{$tc['category']}}</td>
                                    <td>{{$tc['note']}}</td>
                                    <td>{{$tc['created_at']}}</td>
                                    <td>
                                        <a href="{{ url('editTransaction/'.$tc->id) }}"
                                        class="btn btn-outline-success btn-sm">Edit</a>
                                        <a href="{{ url('deletetransaction/'.$tc->id) }}"
                                        class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Transaction</h5>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous">
                </script>
</body>

</html>
@endsection