<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice Email</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header {
      text-align: center;
      padding: 10px 0;
      border-bottom: 2px solid #4CAF50;
    }

    .header h1 {
      color: #4CAF50;
    }

    .content {
      padding: 20px;
    }

    .invoice-details {
      margin-top: 20px;
    }

    .invoice-details table {
      width: 100%;
      border-collapse: collapse;
    }

    .invoice-details th, .invoice-details td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    .invoice-details th {
      background-color: #f4f4f4;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 12px;
      color: #777;
    }

    .footer a {
      color: #4CAF50;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <h1>Invoice from {{ config('app.name') }}</h1>
    </div>

    <div class="content">
      <p>Dear {{ $customerName }},</p>
      <p>Thank you for your recent purchase. Here are the details of your invoice:</p>

      <div class="invoice-details">
        <table>
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
            <tr>
              <td>{{ $item['name'] }}</td>
              <td>{{ $item['quantity'] }}</td>
              <td>${{ number_format($item['price'], 2) }}</td>
              <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <p><strong>Total Amount: ${{ number_format($totalAmount, 2) }}</strong></p>
      <p>We appreciate your business!</p>
    </div>

    <div class="footer">
      <p>If you have any questions, feel free to contact us at <a href="mailto:support@example.com">support@example.com</a>.</p>
      <p>Thank you for choosing {{ config('app.name') }}.</p>
    </div>
  </div>

</body>
</html>
