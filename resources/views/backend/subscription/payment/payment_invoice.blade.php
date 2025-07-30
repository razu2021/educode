<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #333; }
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
            line-height: 3px;
        }
        .signature_area i{
            display: inline;
            border-bottom: 1px solid #000;
        }
        .hr{
             border-bottom: 1px solid #eee;
        }

    </style>
</head>
<body>
<div class="invoice-box">
    <table>
        <tr>
            <td colspan="2" >
                <img src="http://localhost:8000/contents/frontend/assets/assetss/images/logo/logo.svg" class="logo" >
                <h2 class="heading heading1">INVOICE</h2>
                <p><strong>PRIYO MASTER</strong><br>PRIYOMASTER.COM</p>
            </td>
            <td style="text-align:right;">
                <strong>Invoice No:</strong> {{ $payment_data->tran_id }}<br>
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($payment_data->created_at)->format('d F Y') }}
            </td>
        </tr>
    </table>

    <br>
    <strong>Invoice to:</strong><br>
    {{ $course_data->username->name ?? 'Customer Name' }}<br>
    {{ $course_data->username->email ?? 'example@example.com' }}<br>
    {{ $course_data->username->phone ?? 'Phone Number' }}<br>
    {{ $course_data->username->address ?? 'Address' }}

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
     <p style="text-align: center">Thank you for your business with us!</p>
    <div class="hr"></div>
    <br>

   


    <div class=" signature_area">
        <i>Authorized by </i>
        
        <h3>Priyo Master</h3>
        <p>the best learning platfrom </p>
        <p>Administrator </p>
    </div>
      





<div class="hr"></div>

    <div class="footer">
        <p><strong>Note: </strong> Please send payment within 30 days of receiving this invoice. There will be 10% interest charge per month on late invoice.</p>
        <p>
            123-456-7890 | hello@reallygreatsite.com | 123 Anywhere St., Any City
        </p>
    </div>
</div>
</body>
</html>
