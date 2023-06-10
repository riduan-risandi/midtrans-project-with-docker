<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client_key')}}"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 
    </head> 

    <body>
        <div class="container"> 

            <div class="card" style="width: 18rem;"> 
                <div class="card-body">
                  <h5 class="card-title">Detail Withdraw</h5>
                   <table>
                        
                        <tr>
                            <td>Amount</td>
                            <td>: {{ $order->amount}}</td> 
                        </tr> 

                   </table> 
                   <button class="btn btn-primary" id="pay-button">Pay</button>
                   
                </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function () {
              // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
              window.snap.pay('{{$snapToken}}', {
                onSuccess: function(result){
                  /* You may add your own implementation here */
                  window.location.href = '/balance/invoice/{{$order->id}}'
                  // alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                  /* You may add your own implementation here */
                  alert("wating your payment!"); console.log(result);
                },
                onError: function(result){
                  /* You may add your own implementation here */
                  alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                  /* You may add your own implementation here */
                  alert('you closed the popup without finishing the payment');
                }
              })
            });
        </script>


    </body>
</html>
