<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Cancelled</title>
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

        .cancel-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .cancel-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 100%;
        }

        .cancel-icon {
            font-size: 5rem;
            color: #dc3545; /* Bootstrap danger red */
        }

        .transaction-info p {
            margin-bottom: 0.4rem;
        }

        @media (max-width: 576px) {
            .cancel-icon {
                font-size: 3.5rem;
            }

            .btn-md {
                font-size: 1rem;
                padding: 0.75rem 1.25rem;
            }
        }

</style>

</head>
<body>






<div class="cancel-wrapper">
    <div class="cancel-card p-4 text-center">
        <div class="cancel-icon mb-3">
            <i class="bi bi-x-circle-fill"></i>
        </div>
        <h2 class="fw-bold mb-2 text-danger">Payment Cancelled!</h2>
        <p class="text-muted mb-4">Unfortunately, your payment was cancelled or could not be processed due to one or more of the following reasons:</p>

        <div class="transaction-info border-top border-bottom py-3 text-start">
            <ul class="text-start mt-3 text-muted">
                <li>Insufficient funds in your card.</li>
                <li>Incorrect card details entered.</li>
                <li>Communication issues with the bank server.</li>
                <li>Temporary payment gateway downtime or maintenance.</li>
                <li>Timeout or technical issues during the payment process.</li>
            </ul>
            <p class="fst-italic mt-3">
                Please try again or contact our support team for assistance.<br>
                Thank you for your understanding.
            </p>
        </div>

        <div class="mt-4 d-grid gap-2">
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
