<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel = "icon" href = "./icons/cart.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

</head>
<body class="black-scroll">
    <div class="container-fluid padding-l-20 mt-5 margin-t-10">
        <div class="row pb-4">
            <div class="col-12 col-sm-12 col-md-7 col-lg-5 col-xl-5 col-xxl-5 parent">
                <img class="img-disc-cart" src="./images/vinyl.svg" alt="">
                <img class="img-cart" src="./images/thank-u-next-ariana-grande.svg" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5  pt-3">
                <h3 class="title-lato">Ariana Grande - thank u, next</h3>
                <h4 class="pt-1 title-inter"> Price: $800</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 pe-3">
                <img class="cart-delete-icon" src="./icons/delete.svg" alt="">
                <div class="btn-group w-100" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-dark radius-l btn-less-more" ><img class="img-icono" src="./icons/less.svg" alt="-"></button>
                    <label class="btn bg-dark text-white title-inter-12 btn-less-more">1</label>
                    <button type="button" class="btn bg-dark radius-r btn-less-more"><img class="img-icono" src="./icons/more.svg" alt="-"></button>
                </div>
            </div>
        </div>
    <hr>
    <div class="row pb-4 pt-3">
        <div class="col-12 col-sm-12 col-md-7 col-lg-5 col-xl-5 col-xxl-5 parent">
            <img class="img-disc-cart" src="./images/vinyl.svg" alt="">
            <img class="img-cart" src="./images/sunbeam-alina-baraz.svg" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5  pt-3">
            <h3 class="title-lato">Alina Baraz - Sunbeam</h3>
            <h4 class="pt-1 title-inter"> Price: $800</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 pe-3">
            <img class="cart-delete-icon" src="./icons/delete.svg" alt="">
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <button type="button" class="btn bg-dark radius-l btn-less-more" ><img class="img-icono" src="./icons/less.svg" alt="-"></button>
                <label class="btn bg-dark text-white title-inter-12 btn-less-more">1</label>
                <button type="button" class="btn bg-dark radius-r btn-less-more"><img class="img-icono" src="./icons/more.svg" alt="-"></button>
              </div>
        </div>
    </div>
    <hr>
    <div class="row pb-4 pt-3">
        <div class="col-12 col-sm-12 col-md-7 col-lg-5 col-xl-5 col-xxl-5 parent">
            <img class="img-disc-cart" src="./images/vinyl.svg" alt="">
            <img class="img-cart" src="./images/sunbeam-alina-baraz.svg" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5  pt-3">
            <h3 class="title-lato">Alina Baraz - Sunbeam</h3>
            <h4 class="pt-1 title-inter"> Price: $800</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 pe-3">
            <img class="cart-delete-icon" src="./icons/delete.svg" alt="">
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <button type="button" class="btn bg-dark radius-l btn-less-more" ><img class="img-icono" src="./icons/less.svg" alt="-"></button>
                <label class="btn bg-dark text-white title-inter-12 btn-less-more">1</label>
                <button type="button" class="btn bg-dark radius-r btn-less-more"><img class="img-icono" src="./icons/more.svg" alt="-"></button>
              </div>
        </div>
    </div>
    <hr>
    </div>
    <div class="float-end p-fixed">
        <P class="title-lato">Total: <label class="text-inter-25">$2400.00 </label></P>
        <a href="?seccion=payment">
            <button type="button" class="btn bg-dark radius-l radius-r text-white btn-pay title-inter-12" >Pay</button>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>