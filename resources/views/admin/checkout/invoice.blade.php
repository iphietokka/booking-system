
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{$transaction->invoice_id}}</title>

    <style type="text/css">
        @page {
            margin: 0px;

        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        #customers {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
          width: 100%;
             font-size:12px;
        }
        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        }

        tfoot tr td {
            font-weight: bold;
           font-size:12px;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
              font-size:12px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{$transaction->guest->name}}</h3>
                <pre>
{{$transaction->guest->address}}
Indonesia
<br /><br />
Date : {{date('d F Y')}}
Payment Method : {{$transaction->method}}
Status: Paid
</pre>
            </td>
            <td align="center">
                <img src="assets/images/default.jpg" alt="Logo" width="70" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

              @foreach($company as $dt)
                <h3>{{$dt->name}}</h3>
                <pre>
                   {{$dt->website}}
                   {{$dt->address}}
                   {{$dt->phone}}
                    Indonesia
                </pre>
                @endforeach

            </td>
        </tr>

    </table>
</div>

<div class="invoice" style="overflow-x:auto;">
          <h4 align="center" style="font-size: 12px;">Details  {{$transaction->invoice_id}}</h4>
    <table id="customers">
        <thead>
        <tr>
           <th>Service / Products</th>
            <th class="text-center">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Room Type : {{$transaction->room->roomtype->name}}</td>
                        <td>{{$transaction->room->roomtype->price_night_format}}</td>
                        <td>{{$diffday ? $diffday : 1}} Malam</td>
                        <td>Rp. {{number_format($transaction->room->roomtype->price_night * ($diffday ? $diffday : 1)),2}}</td>
                        <?php $sub_total = $transaction->room->roomtype->price_night * ($diffday ? $diffday : 1) ; ?>
        </tr>
        @foreach($service as $services)
                    <tr>
                        <td>{{$services->service->name}}</td>
                        <td>{{$services->service->price}}</td>
                        <td>{{$services->qty.' '.$services->service->unit}}</td>
                        <td>{{$services->total_format}}</td>
                        <?php $sub_total = $sub_total + $services->total; ?>
                    </tr>
                    @endforeach

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td align="left">Sub Total</td>
            <td align="left" class="gray">Rp. {{number_format($sub_total,2)}}</td>
        </tr>
         <tr>
            <td colspan="2"></td>
            <td align="left">Deposit</td>
            <td align="left" class="gray">Rp. {{number_format($transaction->deposite,2)}}</td>
        </tr>
         <tr>
            <td colspan="2"></td>
            <td align="left">Grand Total</td>
            <?php $total = $sub_total  - $transaction->deposite ; ?>
            <td align="left" class="gray">Rp. {{number_format($total,2)}}</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>

