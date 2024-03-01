$(document).ready(function () {

    // Load products on page load
    loadProducts();

    // fetched data from database to select product from in add stock form
    $.ajax({
        url: '.././model/product.php',
        type: 'GET',
        success: function(response) {
            var data = JSON.parse(response);
            var selectCode = $('#code');
            var selectCode1 = $('#editProduct_id');
            data.forEach(function(data) {
                selectCode.append('<option value="' + data.id + '">' + data.code + ' ' + data.name + '</option>');
                selectCode1.append('<option value="' + data.id + '">' + data.code + ' ' + data.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching dealer: ' + error);
        }
    });

    // Add product form submit
    $('#addForm').submit(function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url: '.././model/product.php',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $('#addProductModal').modal('hide');
                loadProducts();
            },
            error: function(xhr, status, error) {
                console.error('Error uploading image: ' + error);
            }
        });
    });

    // Edit product button click
    $(document).on('click', '.editBtn', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'GET', 
            url: '.././model/product.php?id=' + id,
            data: {editId:id},
            success: function (response) {
                var product = JSON.parse(response);
                console.log(product);
                $('#editId').val(product.id);
                $('#editCode').val(product.code);
                $('#editName').val(product.name);
                $('#editDescription').val(product.description);
                //$('#editImage').val(product.image_dir);
                $('#editCategory').val(product.category);
                $('#editDealer').val(product.dealer);
                $('#editPurchase_cost').val(product.purchase_cost);
                $('#editSale_price').val(product.sales_price);
                $('#editProductModal').modal('show');
            }
        });
    }); 

    // Update product form submit
    $('#editForm').submit(function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '.././model/product.php',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $('#editProductModal').modal('hide');
                loadProducts();
            },
            error: function(xhr, status, error) {
                console.error('Error uploading image: ' + error);
            }
        });
    });

    // Delete product button click
    $(document).on('click', '.deleteBtn', function () {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                type: 'POST',
                url: '.././model/product.php?id=' + id,
                data: {deleteId:id},
                success: function (response) {
                    console.log(response);
                    loadProducts();
                }
            });
        }
    });

    // Function to load products
    function loadProducts() {
        $.ajax({
            type: 'GET',
            url: '.././model/product.php',
            success: function (response) {
                var products = JSON.parse(response);
                var rows = '';
                products.forEach(function (product) {
                    rows += '<tr>';
                    rows += '<td>' + product.code + '</td>';
                    rows += '<td>' + product.name + '</td>';
                    rows += '<td>' + product.description + '</td>';
                    rows += '<td class="w-25 h-0">' + '<img class="img-fluid img-thumbnail" src=".././img/' + product.image_dir + '"/></td>';
                    rows += '<td>' + product.category_type + '</td>';
                    rows += '<td>' + product.dealer_name + '</td>';
                    rows += '<td>' + product.purchase_cost + '</td>';
                    rows += '<td>' + product.sales_price + '</td>';
                    rows += '<td>' + (product.sales_price-product.purchase_cost) + '</td>';
                    rows += '<td>';
                    rows += '<button class="btn btn-sm btn-success editBtn" data-id="' + product.id + '">Edit</button> ';
                    rows += '<button class="btn btn-sm btn-danger deleteBtn" data-id="' + product.id + '">Delete</button>';
                    rows += '</td>';
                    rows += '</tr>';
                });
                $('#productTableBody').html(rows);
            }
        });
    }
});
