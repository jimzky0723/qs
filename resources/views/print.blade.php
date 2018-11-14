<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print Code</title>
    <style>
        .wrapper {
            border: 2px solid #000;
            padding:10px;
            text-align: center;
            width: 250px;
        }
        h3,h4,h5 {
            padding: 0;
            margin: 0;
        }
        h3 {
            font-size: 100px;
            line-height: 110px;
        }
        h4 {
            font-size:23px;
        }
        @media print {
            html, body {
                width: 50mm;
                height: 50mm;
            }
            /* ... the rest of the rules ... */
        }
    </style>
</head>
<body onload="print(); close();">
<div class="wrapper">
    <h4>Talisay District Hospital</h4>
    <h3>{{ \Illuminate\Support\Facades\Session::get('printNumber') }}</h3>
    <h4>{{ \Illuminate\Support\Facades\Session::get('printSection') }}</h4>
    <h5>{{ date('F d, Y') }}</h5>
    <h5>{{ date('h:i A') }}</h5>
</div>
</body>
</html>