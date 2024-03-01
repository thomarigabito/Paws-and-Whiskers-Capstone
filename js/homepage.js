let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

window.onscroll = () =>{
    //searchForm.classList.remove('active');
    //shoppingCart.classList.remove('active');
    //loginForm.classList.remove('active');
    //navbar.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', function () {
	let formContainer = document.querySelector(".form-container");
	let signUpBtn = document.querySelector("#signUp");
    let loginBtn = document.querySelector("#logIn");

	var password=document.getElementById("floatingPwd");
	var confirmpwd=document.getElementById("floatingCPassword");

	var length = document.getElementById("length");
	var matchAlert = document.getElementById("matchAlert");
	var dupAlert = document.getElementById("dupAlert");

    var f = document.forms["regForm"].elements;

	loginBtn.addEventListener("click",(e) =>  {
		formContainer.classList.remove("active");
        console.log(e);
	});

	signUpBtn.addEventListener("click",(e) =>  {
		formContainer.classList.add("active");
	});

	// When the user clicks on the password field, show the message box
	password.onfocus = function() {
		document.getElementById("message").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	password.onblur = function() {
		document.getElementById("message").style.display = "none";
	}

    	// When the user starts to type something inside the password field
	password.onkeyup = function() {
        // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(password.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }
    
        // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(password.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }
    
        // Validate numbers
            var numbers = /[0-9]/g;
            if(password.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
    
        // Validate length
            if(password.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
                }
        }

	// When the user starts to type something inside the confirm password field
	confirmpwd.onkeyup = function() {
		matchAlert.style.display = "block";

		if (confirmpwd.value.match(password.value)) {
			matchAlert.innerHTML = "Password is matched";
			matchAlert.classList.remove("invalid");
			matchAlert.classList.add("valid");
			document.getElementById('onRegister').disabled = false;
		} else {
			matchAlert.innerHTML = "Password is not matched";
			matchAlert.classList.remove("valid");
			matchAlert.classList.add("invalid");
		for (var i = 0; i < f.length; i++) {
			if (f[i].value.length == 0) cansubmit = false;
			document.getElementById('onRegister').disabled = true;
			}
		}
	}

    let iconCartSpan = document.querySelector('.nav-icons span');

    let carts = [];
    loadStocks();
    // Function to view products in Homepage
    function loadStocks() {
        $.ajax({
            type: 'GET',
            url: './model/dry_dogfood.php',
            success: function (response) {
                var stocks = JSON.parse(response);
                var rows = '';
                stocks.forEach(function (stock) {
                    rows += '<div class="card m-2">';
                    rows += '<img class="card-img-top" src="./img/' + stock.image_dir + '"/>';
                    rows += '<div class="card-body">';
                    rows += '<b>' + stock.name + '</b>';
                    rows += '<p>Php '+ stock.sales_price +'.00</p>';
                    rows += '<button class="btn btn-primary addCart" data-id="' + stock.id + '">Add to cart</button>';
                    rows += '</div>';
                    rows += '</div>';
                });
                $('#dry_dogfood').html(rows);
            }
        });
        $.ajax({
            type: 'GET',
            url: './model/wet_dogfood.php',
            success: function (response) {
                var stocks = JSON.parse(response);
                var rows = '';
                stocks.forEach(function (stock) {
                    rows += '<div class="card m-2">';
                    rows += '<img class="card-img-top" src="./img/' + stock.image_dir + '"/>';
                    rows += '<div class="card-body">';
                    rows += '<b>' + stock.name + '</b>';
                    rows += '<p>Php '+ stock.sales_price +'.00</p>';
                    rows += '<button class="btn btn-primary addCart" data-id="' + stock.id + '">Add to cart</button>';
                    rows += '</div>';
                    rows += '</div>';
                });
                $('#wet_dogfood').html(rows);
            }
        });
        $.ajax({
            type: 'GET',
            url: './model/dry_catfood.php',
            success: function (response) {
                var stocks = JSON.parse(response);
                var rows = '';
                stocks.forEach(function (stock) {
                    rows += '<div class="card m-2">';
                    rows += '<img class="card-img-top" src="./img/' + stock.image_dir + '"/>';
                    rows += '<div class="card-body">';
                    rows += '<b>' + stock.name + '</b>';
                    rows += '<p>Php '+ stock.sales_price +'.00</p>';
                    rows += '<button class="btn btn-primary addCart" data-id="' + stock.id + '">Add to cart</button>';
                    rows += '</div>';
                    rows += '</div>';
                });
                $('#dry_catfood').html(rows);
            }
        });
        $.ajax({
            type: 'GET',
            url: './model/wet_catfood.php',
            success: function (response) {
                var stocks = JSON.parse(response);
                var rows = '';
                stocks.forEach(function (stock) {
                    rows += '<div class="card m-2">';
                    rows += '<img class="card-img-top" src="./img/' + stock.image_dir + '"/>';
                    rows += '<div class="card-body">';
                    rows += '<b>' + stock.name + '</b>';
                    rows += '<p>Php '+ stock.sales_price +'.00</p>';
                    rows += '<button class="btn btn-primary addCart" data-id="' + stock.id + '">Add to cart</button>';
                    rows += '</div>';
                    rows += '</div>';
                });
                $('#wet_catfood').html(rows);
            }
        });
    }

    $(document).on('click', '.addCart', function (e) {
        e.preventDefault();
        let positionClick = e.target;
        if (positionClick.classList.contains('addCart')) {
            var id = $(this).data('id');
            let itemCart = carts.findIndex((value) => value.id = id);
            if (carts.length <= 0) {
                carts = [{
                    id: id,
                    qty: 1
                }]
            }else if (itemCart < 0) {
                carts.push({
                    id:id,
                    qty: 1
                })
            }else {
                carts[itemCart].qty = carts[itemCart].qty + 1;
            }
            addCartToView();
        }
    });

    const addCartToView = () => {
        let totalQty = 0;
        if (carts.length > 0) {
            carts.forEach(cart => {
                totalQty = totalQty + cart.qty;
            })
        }
        iconCartSpan.innerText = totalQty;
    }

    // Add login form submit
    $('#signupForm').submit(function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url: '././model/homepage.php',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error uploading image: ' + error);
            }
        });
    });
});
