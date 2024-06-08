<?php
session_start();
?>


<html>
<head>
    <title>Yi Li Car Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="index.js"></script>
</head>
<body>
<?php require_once('header.php') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-4 col-md-3 col-lg-2">
            <div class="mt-5">
                <p class="d-inline-flex gap-1">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseType" aria-expanded="false" aria-controls="collapseExample">
                        Browse by type
                    </button>
                </p>
                <div class="collapse" id="collapseType">
                    <div class="card card-body p-0">
                        <div class="list-group" id="typeList">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <p class="d-inline-flex gap-1">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseExample">
                        Browse by brand
                    </button>
                </p>
                <div class="collapse" id="collapseBrand">
                    <div class="card card-body p-0">
                        <div class="list-group" id="brandList">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8 col-md-9 col-lg-10">
            <div class="row row-cols-1 row-cols-md-3 g-4 m-4 col" id="card-grid">
            </div>
            <h2 class=" text-center text-bg-warning p-3">Hire a car in Australia’s most iconic city<span></span></h2>
            <div class="container">
                <p>Sydney is a spectacular city, with a world-famous harbour and beautiful beaches that are the envy of the world. There’s hardly a more iconic building anywhere than the Sydney Opera House. But there’s more to explore in Sydney than just its stunning waterfront.</p>
                <h2>Rent a car with us and explore Sydney’s outer regions</h2>
                <p>Sydney is surrounded by beaches and national parks that are easily accessible from the city. With an abundance of wildlife and birdlife to see, we recommend getting out and exploring the beautiful surrounds of Australia’s prettiest city.</p>
                <h3>Explore the Night</h3>
                <p>After a day spent exploring Sydney’s wild surrounds, get yourself ready for a night on the town. Start by heading to Sydney’s Circular Quay and The Rocks district, a vibrant hub, packed with great bars and restaurants set against the stunning backdrop of the iconic Opera House and Harbour Bridge. There is no better way to experience the glamour of Sydney than a night spent marvelling at the harbour’s sparkling lights.</p>
                <h3>Head for the Waves</h3>
                <p>Sydney is renowned for its beaches, with Bondi Beach, located 7 kilometres from Sydney CBD, arguably Australia’s most famous. It’s a hot spot for celebrities, tourists and backpackers alike – and a must-see for any visitor to Sydney. A drive further north will lead you to the other seaside suburbs of Manly, Newport and Palm Beach, which are all great spots to soak up some sun and take a dip.</p>
                <p>Sydney is Australia’s most famous city for a reason. Its harbour is quite unlike any other in the world – and its beauty is unrivalled. Visitors are dazzled by everything it has to offer. The more you explore, the more you fall in love. When you’re leaving, you’ll want to take the beach-going lifestyle and sun with you everywhere you go.</p>
            </div>
        </div>
    </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
