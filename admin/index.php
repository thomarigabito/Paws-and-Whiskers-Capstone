<?php include('header.php'); ?>
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table Inventory
                        <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addStockModal">Add Stocks</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Purchase Qty</th>
                                        <th>Purchase Cost</th>
                                        <th>Total Purchase</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="inventoryTableBody">
                                    <!-- Inventory list will be loaded here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Purchase Qty</th>
                                        <th>Purchase Cost</th>
                                        <th>Total Purchase</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table Products
                        <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Products</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Logo</th>
                                        <th>Category</th>
                                        <th>Dealer</th>
                                        <th>Purchase Cost</th>
                                        <th>Sales Price</th>
                                        <th>Net Income</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productTableBody">
                                    <!-- Product list will be loaded here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Logo</th>
                                        <th>Category</th>
                                        <th>Dealer</th>
                                        <th>Purchase Cost</th>
                                        <th>Sales Price</th>
                                        <th>Net Income</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Stocks Modal -->
    <div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addStockForm">
                        <div class="form-group">
                            <label for="code">Product Code</label>
                            <select type="text" class="form-control" id="code" name="code">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Purchase Qty</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                        <button type="AddStock" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Stocks Modal -->
<div class="modal fade" id="editStockModal" tabindex="-1" role="dialog" aria-labelledby="editStockModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editStockModalLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editStockForm">
                    <input type="hidden" id="editStockID" name="id">
                    <div class="form-group">
                        <label for="code">Product Code</label>
                        <select type="text" class="form-control" id="editProduct_id" name="code">
                        </select>
                        <label for="name">Quantity</label>
                        <input type="text" class="form-control" id="editQty" name="editQty">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-group">
                        <label for="code">Product Code</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Logo</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select type="text" class="form-control" id="category" name="category">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dealer">Dealer</label>
                        <select type="text" class="form-control" id="dealer" name="dealer">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="purchase_cost">Purchase Cost</label>
                        <input type="text" class="form-control" id="purchase_cost" name="purchase_cost">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" class="form-control" id="sale_price" name="sale_price">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" name="editId">
                    <div class="form-group">
                        <label for="code">Product Code</label>
                        <input type="text" class="form-control" id="editCode" name="code">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="editDescription" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="image">Logo</label>
                        <input type="file" class="form-control" id="editImage" name="image">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select type="text" class="form-control" id="editCategory" name="category">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dealer">Dealer</label>
                        <select type="text" class="form-control" id="editDealer" name="dealer">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="purchase_cost">Purchase Cost</label>
                        <input type="text" class="form-control" id="editPurchase_cost" name="purchase_cost">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" class="form-control" id="editSale_price" name="sale_price">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>