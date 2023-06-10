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
                        <td>Type</td>
                        <td>: {{ $BalanceHistory->type}}</td> 
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>: {{ $BalanceHistory->amount}}</td> 
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $BalanceHistory->status}}</td> 
                    </tr>

               </table> 
               <a href="/"  class="btn btn-primary btn-sm"> Home</a>
                </div>
            </div>
        </div> 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
