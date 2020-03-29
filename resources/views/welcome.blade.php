
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Integração simples com Paypal - Diretamente no JavaScript</title>
            <style>
                .body-content{
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center; 
                    width: 100%;
                    background-color: #fff;
                }

                .content-box{
                    margin-top: 100px;
                    width: 40%;
                    height: 400px;
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    background-color: #fff; 
                    border-radius: 5px;
                    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                    transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                }

                .content{
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    text-align: center;
                    width: 100%;
                    height: 50%;
                    align-items: center;
                }

                .title{
                    font-family: Arial, sans-serif;
                    font-weight: 800;
                    font-size: 39pt;
                    color: #47494c;
                    text-align: center;
                }

                
            
            
            </style>
        </head>
        <body class="body-content">
            <div class="content-box">
                <div class="content"><span class="title">Integração com PayPal</span></div>
                <div class="content"><div id="paypal-button"></div></div>
            </div>

        </body>
        </html>



        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
            size: 'large',
            color: 'black',
            shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                amount: {
                    total: '0.01',
                    currency: 'USD'
                }
                }]
            });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thank you for your purchase!');
            });
            }
        }, '#paypal-button');

        </script>