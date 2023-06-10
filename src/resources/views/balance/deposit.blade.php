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
            <h1>Deposit</h1>

            <div class="card" style="width: 18rem;"> 
                <div class="card-body">
                    <h5>INFO SALDO : {{number_format($saldo->amount,2)}}</h5>    
                  <form action="/balance/topup" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="amount" >
                        @error('amount')
                            <div class="help-block with-errors" style="color:#a94442; font-size:12px;">
                                {{ $message }} </div>
                        @enderror
                    </div> 
                    <button class="btn btn-primary">topup</button>
                  </form>
                </div>
            </div>
        </div> 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
