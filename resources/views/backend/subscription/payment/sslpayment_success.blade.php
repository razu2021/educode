@extends('layouts.webmaster')
@section('website_contents')
    <style>
        :root {
            font-size: 10px;
        }

        body {
            background-color: #f4f6f9;
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
            background: #fff;
            border-radius: 1.6rem;
            box-shadow: 0 0.8rem 3rem rgba(0, 0, 0, 0.08);
            padding: 4rem 3rem;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .success-icon {
            font-size: 6rem;
            color: #28a745;
            margin-bottom: 2rem;
        }

        .success-title {
            font-size: 2.4rem;
            font-weight: 700;
            color: #2f3542;
            margin-bottom: 1rem;
        }

        .success-description {
            font-size: 1.7rem;
            color: #57606f;
            margin-bottom: 3rem;
        }

        .success-buttons .btn {
            font-size: 1.4rem;
            padding: 1rem 2rem;
            border-radius: 0.6rem;
            margin: 0.5rem;
        }
    </style>
<div class="success-wrapper py-5">
    <div class="container d-flex justify-content-center">
        <div class="success-card shadow-lg p-5 rounded-4 bg-white text-center" style="max-width: 600px;">
            <div class="text-success display-3 mb-3">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h2 class="fw-bold mb-2">Congratulations!</h2>
            <p class="text-muted mb-4 fs-5">
                Your payment was successful. Thank you for your purchase. You can now download your invoice or return to your dashboard.
            </p>
            <div class="border-top border-bottom py-4 mb-4">
                <h5 class="mb-2">Paid to <span class="text-primary fw-semibold">Educode</span></h5>
                <p class="mb-1"><strong>Transaction ID:</strong> 254565855855</p>
                <p class="mb-1"><strong>Amount:</strong> 3500 BDT</p>
                <p class="mb-0"><em>Date & Time:</em> 6/28/2025 12:45 AM</p>
            </div>
            <div class="d-grid gap-3">
                <a href="#" class="btn btn-primary btn-lg shadow-sm">
                    <i class="bi bi-download me-1"></i> Download Invoice
                </a>
                <a href="#" class="btn btn-success btn-lg shadow-sm">
                    <i class="bi bi-speedometer2 me-1"></i> Go to Dashboard
                </a>
                <a href="#" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-house-door me-1"></i> Go to Home
                </a>
            </div>
        </div>
    </div>
</div>


@endsection 