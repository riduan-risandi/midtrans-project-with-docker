<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 
    </head> 

    <body>
        <div class="container">
            <h1>Invoice</h1>

            <div class="card" style="width: 18rem;"> 
                <div class="card-body">
                  <h5 class="card-title">Detail</h5>
                  <table>
                    <tr>
                        <td>Name</td>
                        <td>: {{ $order->name}}</td> 
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>: {{ $order->phone}}</td> 
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>: {{ $order->address}}</td> 
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td>: {{ $order->qty}}</td> 
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td>: {{ $order->total_price}}</td> 
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $order->status}}</td> 
                    </tr>

               </table> 
                </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
