<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quiz Result</title>
    <style>
       

        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            height: auto;
            overflow-x:hidden ;
            box-sizing: border-box;
        }

        .container {
            background: #fff;
            padding: 20px 20px;
            width:100%;
            height: auto;
            margin: 0 auto;
            box-sizing: border-box;
            page-break-inside: avoid;
            overflow-x: hidden
        }

        h1, h2, h3, h4, p {
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #7035c2;
            font-size: 26px;
            margin-bottom: 4px;
        }

        .header h3 {
            font-size: 16px;
            color: #555;
        }

        .header p {
            font-size: 13px;
            color: #555;
        }

        h2.title {
            text-align: center;
            color: #34495e;
            margin-bottom: 25px;
            font-size: 20px;
        }

        .row {
            margin: 6px 0;
            font-size: 15px;
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 180px;
            color: #2c3e50;
        }

        .hr {
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }

        .status {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #2980b9;
            margin: 30px 0 15px;
        }

        .qsn_ans {
            padding: 12px 15px;
            border-radius: 10px;
            background: #f8f9fa;
            border: 1px solid #dcdcdc;
            margin-bottom: 18px;
        }

        .qsn_ans p {
            margin: 4px 0;
            font-size: 14px;
        }

        .qsn_ans strong {
            color: #2c3e50;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-style: italic;
            font-size: 13px;
            color: #7f8c8d;
        }

        .result {
            font-size: 15px;
            font-weight: bold;
        }

        .pass {
            color: #27ae60;
        }

        .fail {
            color: #c0392b;
        }

        .highlight-red {
            color: #e74c3c;
        }

        .highlight-correct {
            color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{$siteinfo->site_name ?? 'Priyo Master'}}</h1>
            <h3>{{$siteinfo->site_slogan?? 'Priyo Master'}}</h3>
            <p>Email: {{$sitemail->email ?? 'info@priyomaster.com'}}</p>
            <p>{{$siteaddress->address ?? '128 Elephant Road, Dhaka-1205, Bangladesh'}}</p>
        </div>

        <h2 class="title">Quiz Result Report</h2>

        <div class="row"><span class="label">Quiz Title   </span>: {{ $data->title ?? 'N/A' }}</div>
        <div class="row"><span class="label">Student Name </span>: {{ Auth::user()->name }}</div>
        <div class="row"><span class="label">Student Email</span>: {{ Auth::user()->email }}</div>
        <div class="row"><span class="label">Date & Time  </span>: {{ now()->format('d M Y, h:i A') }}</div>

        <div class="row"><span class="label">Total Questions</span>: {{ $totalquestion }}</div>
        <div class="row"><span class="label">Correct Answers</span>: {{ $correct }}</div>
        <div class="row"><span class="label">Wrong Answers  </span>: {{ $wrong }}</div>
       <div class="row"><span class="label">Result</span> @if($isResult > $wrong && $correct > $wrong) 
        <strong style="color: #27ae60">: Pass</strong>
        @else
         <strong style="color: red"> : Faild </strong>
        @endif 
        </div>

       

        <div class="hr"></div>

        <div class="status">Questions & Your Answers</div>

        @foreach($allqsn as $qsn)
            @php
                $ans = $qsn->quizAnswers->first(); // শুধু প্রথম উত্তরটাই ধরছি, যদি একাধিক না থাকে
            @endphp

            <div class="qsn_ans" style="margin-bottom: 20px;">
                <p><strong>Question:</strong> {{ $qsn->question ?? 'N/A' }}</p>

                <p @if ($ans && $ans->student_answer === 'A') style="color: red;" @endif>
                    <strong>Option A:</strong> {{ $qsn->option1 ?? 'N/A' }}
                </p>
                <p @if ($ans && $ans->student_answer === 'B') style="color: red;" @endif>
                    <strong>Option B:</strong> {{ $qsn->option2 ?? 'N/A' }}
                </p>
                <p @if ($ans && $ans->student_answer === 'C') style="color: red;" @endif>
                    <strong>Option C:</strong> {{ $qsn->option3 ?? 'N/A' }}
                </p>
                <p @if ($ans && $ans->student_answer === 'D') style="color: red;" @endif>
                    <strong>Option D:</strong> {{ $qsn->option4 ?? 'N/A' }}
                </p>

                <p style="color: #27ae60;"><strong>Correct Answer:</strong> {{ $qsn->answer ?? 'N/A' }}</p>
            </div>
        @endforeach


        <div class="hr"></div>

        <div class="footer">
            Powered by Learn With Priyomaster | Excellence in Learning
        </div>
    </div>
</body>
</html>
