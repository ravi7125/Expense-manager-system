@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>

        <form action="/updatetransaction" method="POST">
            @csrf
            <input type="hidden" name="id" value={{$transaction['id']}}>      
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" value="{{$transaction['type']}}">
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{$transaction['category']}}">
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{$transaction['amount']}}">
            </div>

            <div class="form-group">
                <label for="amount">Note</label>
                <input type="text" class="form-control" id="note" name="note" value="{{$transaction['note']}}">
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
