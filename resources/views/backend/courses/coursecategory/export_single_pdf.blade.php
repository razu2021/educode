<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Fixed Column PDF</title>
    <style>

        body {
            font-family: sans-serif;
            font-size: 10px;
        }
        .top-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 5px solid red;
        }
        .top-logo img {
        width: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background-color: #eee;
        }
        th, td {
            border: 1px solid #333;
            padding: 4px;
            text-align: left;
        }
        .footer {
        margin-top: 50px;
        background: #f5f5f5;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        border-top: 5px solid red;
        }
        .footer i {
        margin-right: 6px;
        color: red;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-body">
        <div class="pdf_header">
            <div class="top-logo">
            <img src="https://handsbd.org/contents/assets/website/assets/img/logo%20(2).png" alt="Logo">
            <div>
                <strong style="font-size: 18px;">YOUR LOGO</strong><br>
                <small>YOUR BUSINESS CATCH LINE HERE</small>
            </div>

            <div class="footer">
                <div>
                  <i class="bi bi-telephone"></i> +000 123 456 789<br>
                  <i class="bi bi-telephone"></i> +000 123 456 789
                </div>
                <div>
                  <i class="bi bi-envelope"></i> info@websiteurl.com<br>
                  <i class="bi bi-envelope"></i> name@websiteurl.com
                </div>
                <div>
                  <i class="bi bi-geo-alt"></i> 3222 Blackwell Street, Fairbanks, AK 99701
                </div>
              </div>
            </div>
        </div>
    <h3 style="text-align: center;">Database Report </h3>
    <table>
        <tbody>
         
                <tr>
                    <td>Id</td>
                    <td>::</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>::</td>
                    <td>{{ $data->category_name }}</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>::</td>
                    <td>{{ $data->category_title }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>::</td>
                    <td>{{ $data->category_des }}</td>
                </tr>
                <tr>
                    <td>URL</td>
                    <td>::</td>
                    <td>{{ $data->url }}</td>
                </tr>
                <tr>
                    <td>Slug</td>
                    <td>::</td>
                    <td>{{ $data->slug }}</td>
                </tr>
                <tr>
                    <td>Created at</td>
                    <td>::</td>
                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                </tr>
         
                <tr>
                    <td>Updated at</td>
                    <td>::</td>
                    <td>{{ $data->updated_at->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td>Created by</td>
                    <td>::</td>
                    <td>{{ $data->updated_at->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td>Updated by</td>
                    <td>::</td>
                    <td>{{ $data->creator->name }}</td>
                </tr>
                <tr>
                    <td>Updated by</td>
                    <td>::</td>
                    <td>{{ $data->editor?->name ?? 'N/A'}}</td>
                </tr>
         
        </tbody>
    </table>
    
    </div>
</div>





<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>

