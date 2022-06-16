<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel = "icon" href = "./icons/vynil-icon.svg" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/index.css">

    <style>
        .button {
    background-color: black;
    border: none;
    color: white;
    padding: 10px 35px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 11px;
    cursor: pointer;
    border-radius: 29px;
    height: fit-content;
    width: 250px;
    }
    </style>
</head>
<body>
    <section class="container" style="padding: 30px; margin-top: 60px; margin-bottom: 60px;">
        <div class="row" style="height: 370px;">
            <div class="col-6">
                <div style="position: relative;">
                    <img style="position: absolute; left: 27%; height: auto; width: 100%; max-width: 350px;" src="./images/vinyl.svg" alt="">
                    <img src="./images/sunbeam-alina-baraz.svg" style="position: absolute; height: auto; width: 100%; max-width: 350px;" alt="">
                </div>
            </div>
            <div class="col-6" style="display: flex; flex-direction: row; flex-wrap: wrap; overflow: hidden;">
                <h1 class="subtitle">Alina Baraz - Sunbeam &nbsp;</h1>
                <h3>800</h3>
                <p class="general-text">Russian American singer-songwriter and industry best-kept-secret Alina Baraz has remained one of the most consistent artists of the past few years, providing us with dreamscape lullabies and hypnotic mood music. She delivers more of that exact brand of aural escapism on her UnitedMasters label debut, the EP Sunbeam.</p>
                <button class="button title-inter">Add to cart</button>
                <button class="button title-inter">Buy now</button>
            </div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <h3 class="subtitle2">Similar to Sunbeam</h3>
            <div style="display: flex; flex-direction: row; flex-wrap: wrap; overflow: hidden;">
                <div style="width: 50%;" class="row mt-4">
                    <div class="col">
                        <a id="link" href="?seccion=detailproduct">
                            <img src="./images/blonde-frank-ocean.svg" style="max-width: 350px;" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <h3 class="title-lato" style="width: 100%;">Blonde - Frank Ocean</h3>
                        <p class="general-text" >asddawf asdfgpwargfkasdfpg arspgkapsfkg</p>
                    </div>
                </div>
                <div style="width: 50%;" class="row mt-4">
                    <div class="col">
                        <img src="./images/blonde-frank-ocean.svg" style="max-width: 350px;" alt="">
                    </div>
                    <div class="col">
                        <h3 class="title-lato" style="width: 100%;">Blonde - Frank Ocean</h3>
                        <p class="general-text" >asddawf asdfgpwargfkasdfpg arspgkapsfkg</p>
                    </div>
                </div>
                <div style="width: 50%;" class="row mt-4">
                    <div class="col">
                        <img src="./images/blonde-frank-ocean.svg" style="max-width: 350px;" alt="">
                    </div>
                    <div class="col">
                        <h3 class="title-lato" style="width: 100%;">Blonde - Frank Ocean</h3>
                        <p class="general-text" >asddawf asdfgpwargfkasdfpg arspgkapsfkg</p>
                    </div>
                </div>
                <div style="width: 50%;" class="row mt-4">
                    <div class="col">
                        <img src="./images/blonde-frank-ocean.svg" style="max-width: 350px;" alt="">
                    </div>
                    <div class="col">
                        <h3 class="title-lato" style="width: 100%;">Blonde - Frank Ocean</h3>
                        <p class="general-text" >asddawf asdfgpwargfkasdfpg arspgkapsfkg</p>
                    </div>
                </div>
                <div style="width: 50%;" class="row mt-4">
                    <div class="col">
                        <img src="./images/blonde-frank-ocean.svg" style="max-width: 350px;" alt="">
                    </div>
                    <div class="col">
                        <h3 class="title-lato" style="width: 100%;">Blonde - Frank Ocean</h3>
                        <p class="general-text" >asddawf asdfgpwargfkasdfpg arspgkapsfkg</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>