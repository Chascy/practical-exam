<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT TRANSACTION PAGE</title>
</head>
<body>
    <h1>EDIT TRANSACTION HERE</h1>

    <form action="{{ route('updateTransaction', ['id' => $transaction->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="transaction_title">Title:</label>
        <input type="text" name="transaction_title" id="transaction_title" value="{{ $transaction->transaction_title }}" required><br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="{{ $transaction->description }}" required><br>
        <label for="status">Status:</label>
        <select name="status" id="status" value="{{ $transaction->status }}" required>
            <option value="Successful">Successful</option>
            <option value="Declined">Declined</option>
        </select>><br>
        <label for="total_amount">Amount:</label>
        <input type="number" name="total_amount" id="total_amount" value="{{ $transaction->total_amount }}" required><br>
        <label for="transaction_number">Number:</label>
        <input type="number" name="transaction_number" id="transaction_number" value="{{ $transaction->transaction_number }}" required><br>

        <button type="submit">Update Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        @method('GET')
        <button type="submit">Back to Home</button>
    </form>
</body>
</html>