$.cookie.json = true;
let currentCar = $.cookie('currentCar');
let totalCost = 0
$(document).ready(function () {
  readCurrentCar();
  $('#startDate, #endDate, #quantity').change(calculateCost);
  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      event.preventDefault()
      event.stopPropagation()
      form.classList.add('was-validated')
      if (form.checkValidity()) {
        $.post('placeOrder.php', {
          name: $('#nameInput').val(),
          mobile: $('#mobileInput').val(),
          email: $('#emailInput').val(),
          license: $('#licenseInput').val(),
          startDate: $('#startDate').val(),
          endDate: $('#endDate').val(),
          price: totalCost,
          quantity: $('#quantity').val(),
          id: currentCar.id
        }, data => {
          if(data.isSuccess){
            $("#hideButton").hide()
            $("#failMessage").html(``);
            $("#successMessage").html(`The order has been submitted successfully, please click <a href='confirm.php?id=${data.orderId}'>here</a> to confirm.`);
          }
          else{
            $("#failMessage").html(`The order is failed, please check the stock.`);
          }
        });
      }
    }, false)
  })
});

function calculateCost() {
  const startDate = new Date($('#startDate').val());
  const endDate = new Date($('#endDate').val());
  const quantity = parseInt($('#quantity').val());
  const pricePerDay = parseInt($('#carPrice').html());
  const timeDiff = endDate - startDate;
  const days = timeDiff / (1000 * 3600 * 24);

  if (!isNaN(days) && days > 0 && quantity > 0) {
    totalCost = days * quantity * pricePerDay;
    $('#totalCost').text('$' + totalCost);
  } else {
    $('#totalCost').text('$0');
  }
}

function readCurrentCar() {

  if (!currentCar) {
    alert("You haven't select any car, please back to homepage to select your car");
    window.location.href='/';
  } else {
    $.getJSON('cars.json', function (data) {
      data.cars.forEach(car => {
        if (car.id === currentCar.id) {
          currentCar.quantity = car.quantity;
          currentCar.availability = car.availability;
        }
        $('#carType').html(currentCar.type);
        $('#carBrand').html(currentCar.brand);
        $('#carName').html(currentCar.car_model);
        $('#carPrice').html(currentCar.price_per_day);
        $('#carAvailability').html(currentCar.availability);
        $('#quantity').attr('max', currentCar.quantity);
        $('#carDetailPic').attr('src', `/images/${currentCar.image}`);

        if(currentCar.availability === 'No'){
          $('#orderSection').hide();
        }
      });
    });
  }
}

function handleCancel(){
  $.cookie('currentCar', null);
  window.location.href = 'index.php';
}