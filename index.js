$(document).ready(function () {
  loadCars();
});

function search(){
  const keyword = $('#keyword').val();
  $.cookie.json = true;
  let keywords = $.cookie('keywords');
  if(!keywords){
    keywords = [];
  }
  keywords.push(keyword);
  $.cookie('keywords', keywords);
  loadCars(keyword);
}

function renderBrands(cars){
  const root = $('#brandList');
  root.html('');
  const brands = [];
  cars.forEach(car => {
    if(!brands.includes(car.brand)){
      brands.push(car.brand);
    }
  });
  brands.sort(function (a, b) {
    return a.localeCompare(b);
  });
  brands.forEach(brand => {
     root.append(`<a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="loadCars('${brand}')">${brand}</a>`);
  });
}

function renderType(cars){
  const root = $('#typeList');
  root.html('');
  const brands = [];
  cars.forEach(car => {
    if(!brands.includes(car.type)){
      brands.push(car.type);
    }
  });
  brands.sort(function (a, b) {
    return a.localeCompare(b);
  });
  brands.forEach(type => {
    root.append(`<a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="loadCars('${type}')">${type}</a>`);
  });
}
function loadCars(keyword, id){
  $.getJSON("/cars.json", function (data){
    let cars = data.cars;
    renderBrands(cars);
    renderType(cars);
    $('#collapseType').collapse('hide');
    $('#collapseBrand').collapse('hide');
    if(id !== undefined){
      cars = cars.filter(car => car.id === id);
    } else if(keyword){
      cars = cars.filter(car =>
        car.car_model.toLowerCase().includes(keyword.toLowerCase()) ||
        car.brand.toLowerCase().includes(keyword.toLowerCase()) ||
        car.type.toLowerCase().includes(keyword.toLowerCase())
      );
    }
    renderCars(cars);
  })
}

function renderCars(cars) {
  const root = $('#card-grid');
  root.html('');
  cars.forEach(car => {
    let nodeHtml = `
        <div class="col">
          <div class="card cardHeight">
              <img src="./images/${car.image}" class="card-img-top picHeight productPic">
              <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <th scope="row">Car Name : </th>
                  <td class="card-title">${car.brand} ${car.car_model}</td>
                </tr>
                <tr>
                  <th scope="row">Price/day: </th>
                  <td class="card-title">${car.price_per_day}</td>
                </tr>
                <tr>
                  <th scope="row">Avaliablity: </th>
                  <td class="card-title">${car.availability}</td>
                </tr>
                <tr>
                  <th scope="row">Description: </th>
                  <td class="card-title">${car.description}</td>
                </tr> 
                
              </table>  
              <table class="text-center">
                <tr>
                  <div class="d-grid gap-2">
                    <button class="btn btn-primary disableBtn" type="button" onclick='loadCurrentCar(${JSON.stringify(car)})' ${car.availability === 'No' ? 'disabled' : ''}>Rent</button>
                  </div>
                </tr>
              </table>
              </div>
          </div>
        </div>`;
    root.append(nodeHtml);
  });
}
function loadCurrentCar(car){
  $.cookie.json = true;
  $.cookie('currentCar', car);
  window.location.href = 'carReservation.php';
}




