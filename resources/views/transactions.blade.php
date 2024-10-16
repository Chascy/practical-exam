<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRANSACTIONS PAGE</title>
</head>
<body>
    <h1>TRANSACTIONS HERE</h1>

    <form action="{{ route('createTransaction') }}" method="GET">
        @method('GET')
        <button type="submit">Create Transaction</button>
    </form>

    @foreach ($transactions as $transaction)
        <div>ID: {{ $transaction->id }}</div>
        <div>Title: {{ $transaction->transaction_title }}</div>
        <div>Description: {{ $transaction->description }}</div>
        <div>Status: {{ $transaction->status }}</div>
        <div>Amount: {{ $transaction->total_amount }}</div>
        <div>Number: {{ $transaction->transaction_number }}</div>
        <div>Created at: {{ $transaction->created_at }}</div>

        <form action="{{ route('editTransaction', ['id' => $transaction->id]) }}" method="GET">
            @method('GET')
            <button type="submit">Edit Transaction</button>
        </form>
        <form action="{{ route('viewTransaction', ['id' => $transaction->id]) }}" method="GET">
            @method('GET')
            <button type="submit">View Transaction</button>
        </form>
        <hr>
    @endforeach
</body>
</html>