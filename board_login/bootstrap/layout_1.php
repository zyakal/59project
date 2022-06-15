<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>부트스트랩</title>    
    <style>
        .container { background-color: red;}
        .container-sm { background-color: skyblue;}
        .container-md { background-color: blueviolet;}
        .container-lg { background-color: yellow;}
        .container-xl { background-color: darkorange;}
        .container-xxl { background-color: salmon;}
        .container-fluid { background-color: green;}
    </style>
</head>
<body>
    <div class="container">100% xsm</div>
    <!-- Content here -->
    <div class="container-sm">100% wide until small breakpoint 576px</div>
    <div class="container-md">100% wide until medium breakpoint 768px</div>
    <div class="container-lg">100% wide until large breakpoint 992px</div>
    <div class="container-xl">100% wide until extra large breakpoint 1200px</div>
    <div class="container-xxl">100% wide until extra extra large breakpoint 1400px</div>
    <div class="container-fluid">...</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>