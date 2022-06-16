<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel = "icon" href = "./icons/credit-card.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/payment.css">
    <link rel="stylesheet" href="./css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

</head>
<body class="black-scroll">

    <div class="row pl-10 pe-3 mt-5">
        <div class="col-12 col-sm-12 col-md-9 col-lg-8 col-xl-8 col-xxl-7">
            <!-- OXXO -->
            <div class="pt-2 ps-3 bg-gray pb-2">
                <div class="form-check">
                    <input class="form-check-input bg-black" type="radio" name="oxxo" id="oxxo" value="oxxo"/>
                    <label class="form-check-label text ms-2" for="oxxo"> OXXO </label>
                    <img class="img-icon" src="./icons/oxxo.svg" alt="OXXO">
                </div>
                <div class="mt-2 ps-5 mb-4" id="oxxo-info" hidden="true">
                    <label class="text ">REFERENCE</label>
                    <br>
                    <input class="input-r text ps-4" type="text" readonly placeholder="35481102556">
                </div>
            </div>
            <!-- CREDIT CARD -->
            <div class="mt-3 pt-2 ps-3 bg-gray pb-2">
                <div class="form-check">
                    <input class="form-check-input bg-black" type="radio" name="card" id="card" value="card"  />
                    <label class="form-check-label text  ms-2" for="credit-card"> Credit Card</label>
                    <img class="img-icon" src="./icons/visa.svg" alt="VISA">
                    <img class="img-icon" src="./icons/mastercard.svg" alt="mastercard">

                </div>
                <div class="mt-2 ps-5 row mb-4" id="credit-info" hidden="false">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                        <form action="">
                            <label class="title-inter-12 mt-2" for="">Cardholder name:</label><br>
                            <input class="input-r text ps-4 w-75" type="text" placeholder="Cardholder name" required>
                            <br>
                            <label class="title-inter-12 mt-2" for="">Card number:</label><br>
                            <input class="input-r text ps-4 w-75" type="text" minlength="16" maxlength="16" placeholder="card number" required>
                            <br>
                            <label class="title-inter-12 mt-2" for="">Expiration date</label><label class="title-inter-12 mt-2 ms-25" for="">Security code:</label><br>
                            <input class="input-r text ps-4 w-50 " type="month"  placeholder="expiration date" required>

                            <input class="input-r text ps-4 w-25" type="text" minlength="3" maxlength="3" placeholder="CVV" required>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                        <img src="./icons/card.svg" alt="" class="w-100 pe-5">
                    </div>
                   
                </div>

            </div>

            <!-- MAPA -->
            <div class="mt-3 pt-2 ps-3 pb-2 w-100">
                <img class="w-100" src="./images/happier-than-ever-billie-eilish.svg" alt="">
            </div>
        </div>
        <!-- INFO PAGO -->
        <div class="col-11 col-sm-11 col-md-2 col-lg-3 col-xl-3 col-xxl-3 bc-black ">
            <div class="text-center">
                <h5 class="title-inter bg-dark text-white mt-2 pb-1 pt-1"> Order summary</h5>
            </div>
            <label class="text ms-2 mt-2"> <strong>No. Order:</strong> <label class="ms-3">1</label></label>
            <br>
            <label class="text ms-2"> <strong>Subtotal:</strong> <label class="ms-4">$2400</label></label>
            <br>
            <label class="text ms-2"> <strong>Envio:</strong> <label class="ms-5">$400</label></label><br>
            <label class="text ms-2 mt-4"> <strong>Total to pay: <label for="">$2800</label></strong></label>
            <a href="?seccion=products"> 
                <button type="button" class="btn bg-dark radius-l radius-r text-white title-inter-12 btnFinish " >FINISH</button>
            </a>

        </div>
    </div>
    <script>
        document.querySelector('input[name=oxxo]').addEventListener("click", function(){
            hiddenInfo("oxxo")
        })

        document.querySelector('input[name=card]').addEventListener("click", function(){
            hiddenInfo("card")
        })

        function hiddenInfo(value){
            if(value == "oxxo")
            {
                document.getElementById("card").checked = false
                document.getElementById("oxxo-info").hidden = false;
                document.getElementById("credit-info").hidden = true;
            }else{
                document.getElementById("oxxo").checked = false
                document.getElementById("credit-info").hidden = false;
                document.getElementById("oxxo-info").hidden = true;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>