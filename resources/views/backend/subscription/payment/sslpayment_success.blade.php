<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .success-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .success-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 100%;
        }

        .success-icon {
            font-size: 5rem;
            color: #28a745;
        }

        .transaction-info p {
            margin-bottom: 0.4rem;
        }

        @media (max-width: 576px) {
            .success-icon {
                font-size: 3.5rem;
            }

            .btn-lg {
                font-size: 1rem;
                padding: 0.75rem 1.25rem;
            }
        }
    </style>
</head>
<body>

<div class="success-wrapper">
    <div class="success-card p-4 text-center">
        <div class="success-icon mb-3">
            <i class="bi bi-check-circle-fill"></i>
        </div>
        <h2 class="fw-bold mb-2">Payment Successful!</h2>
        <p class="text-muted mb-4">Thank you for your purchase. Your payment has been received successfully.</p>

        <div class="transaction-info border-top border-bottom py-3 text-start">
            <p><strong>Paid to:</strong> <span class="text-primary">Priyo Master</span></p>
            <p><strong>Transaction ID:</strong> {{ $payment->tran_id }}</p>
            <p><strong>Amount:</strong> {{ $payment->amount }} {{ $payment->currency }}</p>
            <p><strong>Date:</strong> {{ now()->format('F j, Y, g:i A') }}</p>
        </div>

        <div class="mt-4 d-grid gap-2">
            <a href="{{route('invoice.download',$payment->tran_id)}}" class="btn btn-warning btn-md">
                <i class="bi bi-download me-1"></i> Download Invoice
            </a>
           
            <a href="{{ url('/') }}" class="btn btn-outline-primary btn-md">
                <i class="bi bi-house-door me-1"></i> Go to Home
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional for features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
