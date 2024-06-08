<?php
$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
?>

<header class="my-header shadow-lg p-3 rounded">
    <a class="btn btn-primary" type="button" href="carReservation.php">Reservation</a>
    <div class="searchbar position-relative">
        <div class="d-flex mb-0" action="/" role="search">
            <input class="form-control me-2" type="search" autocomplete="off"
                   placeholder="Search products" id="keyword"
                   onfocus="$('#searchDialog').removeClass('d-none'); loadSuggestionList();"
                   onkeyup="loadSuggestionList()"
                   onblur="setTimeout(function(){$('#searchDialog').addClass('d-none'); }, 200)">
            <button class="btn btn-outline-dark" type="button" onclick="search()">Search</button>
        </div>
        <div class="card position-absolute cardIndex d-none cardWidth" id="searchDialog">
            <div class="card-body p-0">
                <p class="text-body-tertiary m-1 ms-2">Recent Searches </p>
                <div class="list-group listHeight m-0" id="recentSearch">
                </div>
                <p class="text-body-tertiary m-1 ms-2">Suggestions </p>
                <div class="list-group listHeight m-0" id="suggestionList">
                </div>
            </div>
        </div>
    </div>

    <a href="index.php" class="text-decoration-none">
        <img class="logo" href="index.php" src="images/logo.png" alt="Yi Li's Car Rent Shop"/>
        <span class="title fw-bold">Yi Li's Car Rent</span>
    </a>

    <script>
      function loadSuggestionList(){
        $('#suggestionList').html('');
        $('#recentSearch').html('');
        const keyword  = $('#keyword').val();
        console.log(keyword);
        if(keyword === ''){
          $.cookie.json = true;
          let keywords = $.cookie('keywords');
          console.log(keywords);
          keywords.forEach(word => {
              $('#recentSearch').append(`<a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="loadCars('${word}'); $('#keyword').val('${word}')">${word}</a>`);
          });
        } else {
          $.getJSON('cars.json', function(data){
            data.cars.forEach(car => {
              if(`${car.brand} ${car.car_model}`.toLowerCase().includes(keyword.toLowerCase())){
                $('#suggestionList').append(`
                <a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="loadCars('', ${car.id})">${car.brand} ${car.car_model}</a>
              `);
              }
            });
          });
        }

      }
    </script>


</header>
