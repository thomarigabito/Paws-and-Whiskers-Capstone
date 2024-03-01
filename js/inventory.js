$(document).ready(function() {    
    // Load stocks on page load
    loadStocks();

    // Add inventory form submit
    $('#addStockForm').submit(function (e) {
        e.preventDefault();
        var data = $(this).serialize();
            $.post('.././model/inventory.php', data, function(response) {
                console.log(response);
                $('#addStockModal').modal('hide');
                loadStocks(); 
        });
    });

    // Delete stocks button click
    $(document).on('click', '.delStocksBtn', function () {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                type: 'POST',
                url: '.././model/inventory.php?id=' + id,
                data: {deleteId:id},
                success: function (response) {
                    console.log(response);
                    loadStocks();
                }
            });
        }
    });

    // Edit stocks button click
    $(document).on('click', '.editStocksBtn', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'GET', 
            url: '.././model/inventory.php?id=' + id,
            data: {editId:id},
            success: function (response) {
                var data = JSON.parse(response);
                $('#editStockID').val(data.id);
                $('#editProduct_id').val(data.product_id);
                $('#editQty').val(data.quantity);
                $('#editStockModal').modal('show');
            }
        });
    });

    // Update Stocks form submit
    $('#editStockForm').submit(function (e) {
        e.preventDefault();
        var data = $(this).serialize();
            $.post('.././model/inventory.php', data, function (response) {
                $('#editStockModal').modal('hide');
                loadStocks();
        });
    });

    // Function to view stocks
    function loadStocks() {
        $.ajax({
            type: 'GET',
            url: '.././model/inventory.php',
            success: function (response) {
                var stocks = JSON.parse(response);
                var rows = '';
                stocks.forEach(function (stock) {
                    rows += '<tr>';
                    rows += '<td>' + stock.code + '</td>';
                    rows += '<td>' + stock.name + '</td>';
                    rows += '<td>' + stock.description + '</td>';
                    rows += '<td>' + stock.quantity + '</td>';
                    rows += '<td>' + stock.purchase_cost + '</td>';
                    rows += '<td>' + stock.quantity*stock.purchase_cost + '</td>';
                    rows += '<td>';
                    rows += '<button class="btn btn-sm btn-success editStocksBtn" data-id="' + stock.id + '">Edit</button> ';
                    rows += '<button class="btn btn-sm btn-danger delStocksBtn" data-id="' + stock.id + '">Delete</button>';
                    rows += '</td>';
                    rows += '</tr>';
                });
                $('#inventoryTableBody').html(rows);
            }
        });
    }
});