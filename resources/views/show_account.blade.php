@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show_account</title>
</head>

<body>
    <form action="" method='GET'>
        @csrf
        <table border="2" class="table table-hover table-green">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Transaction</th>
                    <th scope="col">Deduct</th>
                    <th scope="col">Action</th>
                    <th scop="col"><button type="button" class="btn btn-dark float-right"><a href="Account"> Add
                                Account</a></button>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($data as $dha)
                    <td> {{$dha['id']}}</td>
                    <td> {{$dha['bankname']}}</td>
                    <td> {{$dha['accountnumber']}}</td>
                    <td> {{$dha['balance']}}</td>
                    <td> {{$dha['transfer']}}</td>
                    <td> {{$dha['deduct']}}</td>
                    <td>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this Account?')"><a
                                        class="text-black" type="button" href="{{'delete/'.$dha['id']}}">Delete</a>
                                </button><br>
                                <button class="btn btn-outline-success"><a class="text-black" type="button"
                                        href="{{'update/'.$dha['id']}}">Update</a>
                                </button><br>
                                <button class="btn btn-outline-secondary"><a class="text-black" type="button"
                                        href="{{'show_account_user/'.$dha['id']}}">User..</a>
                                </button><br>
                                <button class="btn btn-outline-secondary"><a class="text-black" type="button"
                                        href={{'transactionshow/'.$dha['id']}}>Transaction</a>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</form>

</html>
@endsection