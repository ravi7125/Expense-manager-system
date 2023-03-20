
    <div class="container">
        <h1>Create Transaction</h1>

        <form action="/transactions_edit" method="POST">
            @csrf
            <input type="hidden" name="id" value={{$transaction['id']}}>
            <div class="form-group">
                
            </div>
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
                <input type="text" class="form-control" id="category" name="category" value="{{$transaction['category']}}" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{$transaction['amount']}}" required>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" id="note" name="note" value="{{$transaction['note']}}" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

