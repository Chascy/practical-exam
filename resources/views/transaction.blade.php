<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRANSACTION PAGE</title>
</head>
<body>
    <h1>TRANSACTION HERE</h1>

    <div>ID: {{ $transaction->id }}</div>
    <div>Title: {{ $transaction->transaction_title }}</div>
    <div>Description: {{ $transaction->description }}</div>
    <div>Status: {{ $transaction->status }}</div>
    <div>Amount: {{ $transaction->total_amount }}</div>
    <div>Number: {{ $transaction->transaction_number }}</div>
    <div>Created at: {{ $transaction->created_at }}</div>

    <form action="{{ route('deleteTransaction', ['id' => $transaction->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete Transaction</button>
    </form>
    <form action="{{ route('showAllTransactions') }}" method="GET">
        @method('GET')
        <button type="submit">Back to Home</button>
    </form>
</body>
</html>