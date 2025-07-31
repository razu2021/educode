<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #333; }
        p,span,strong,h2,h3,h1{
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
        }
        table {
            width: 100%;
            line-height: 24px;
            border-collapse: collapse;
        }
        table th {
            background: #0a4b93;
            color: white;
            text-align: left;
            padding: 8px;
        }
        table td {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
        .heading { font-size: 28px; color: #0a4b93; margin-bottom: 20px; }
        .logo { max-width: 150px; }
        .total { background: #0a4b93; color: #fff; padding: 10px; }
        .footer { margin-top: 30px; font-size: 12px; text-align: center; color: #777; }
        .signature_area{
            text-align: right; 
            
        }
        .signature_area i{
            display: inline;
            border-bottom: 1px solid #000;
        }
        .hr{
             border-bottom: 1px solid #eee;
        }
        .heading1{
            text-align: center;
            display: inline-block;
            border-bottom: 5px solid #7B3DD6;
        }
        .boxbgimage{
            background-image: url("{{asset('contents/frontend/assets/assetss/images/logo/logo.svg')}}");
            background-repeat: no-repeat;
            background-position-x: center;
            background-position-y: center;
            z-index: -1;
            background-size: contain;

            
            
        }
     </style>
</head>
<body>
<div class="invoice-box ">
    <div class="pdf_headre " style="text-align: center">
        <h1 class="heading heading1">INVOICE</h1>
    </div>
    <table>
        <tr>
            <td>
                
                <p><strong style="color: #0FAE0F">PRIYO <span style="color: #7B3DD6"> MASTER </span></strong></p>
                <p>PRIYOMASTER.COM</p>
            </td>
            <td style="text-align:right;">
                <strong>Transection ID:</strong> {{ $payment_data->tran_id }}<br>
                <strong>Invoice No:</strong> {{ $payment_data->invoice_id }}<br>
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($payment_data->created_at)->format('d F Y') }}
            </td>
        </tr>
    </table>

    <br>
    <strong>Invoice to:</strong><br>
    {{ Auth::user()->name ?? 'Customer Name' }}<br>
    {{ Auth::user()->email ?? 'example@example.com' }}<br>
    {{ $payment_data->phone ?? '+88017.......11' }}<br>
    {{ $payment_data->division ?? 'Dhaka' }}, {{ $payment_data->city ?? 'Dhaka' }}, {{ $payment_data->country ?? 'Bangladesh' }}

    <br><br>

    <table>
        <thead>
        <tr>
            <th>NO</th>
            <th>DESCRIPTION</th>
            <th>QTY</th>
            <th>PRICE</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        
            <tr>
                <td>1</td>
                <td>{{ $course_data->course_name ?? 'Name Not Found !'}}</td>
                <td>1</td>
                <td>{{ $payment_data->amount }}</td>
                <td>{{ $payment_data->amount }}</td>
            </tr>
      
        </tbody>
    </table>

    <br>

    <table>
        
        <tr>
          <tr>
             <td style="text-align:right;">
                <strong>Course Price : </strong> {{ $original_price }}   <br>
                <strong>Discounted Price : </strong> {{ $discounted_price }}   <br>
                <strong>Coupon Discount : </strong> {{ $coupon_price }} {{$coupon_type}}   <br>
               
            </td>
        </tr>
           

            
        </tr>
    </table>


    <table>
        
        <tr>
            <td><strong>PAYMENT METHOD:</strong><br>
                {{$payment_data->card_brand }}<br>
                {{$payment_data->card_issuer }}<br>
                
            </td>

            <td style="text-align:right;">
                <div class="total">
                    <strong>Grand Total:  {{ $payment_data->amount }} {{$payment_data->currency}}</strong>
                </div>
            </td>
        </tr>
        
    </table>
     <p style="text-align: center ;color: #7B3DD6" >Knowledge is the best investment – Thank you for choosing us!</p>
    <div class="hr"></div>
    <br>
    <div class=" signature_area boxbgimage">
        <i>Authorized by </i>
        <h3>Priyo Master</h3>
        <p>Administrator </p>
    </div>
      
    <div class="hr"></div>

        <div class="footer">
            <p><strong>Note: </strong>  All payments are final and non-refundable. Please read the course details carefully before making a purchase.</p>
            <p>
                {{$sitephone ?? '+8801........17'}} | {{$sitemail ?? 'priyo.............@gmail.com'}}| {{$siteaddress ?? 'Physical Location is not Found !'}}
            </p>
        </div>
</div>
</body>
</html>
