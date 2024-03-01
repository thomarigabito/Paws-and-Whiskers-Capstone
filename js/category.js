$(document).ready(function() {
    // Load category from database
    $.ajax({
        url: '.././model/category.php',
        type: 'GET',
        success: function(response) {
            var category = JSON.parse(response);
            var selectCategory1 = $('#category');
            var selectCategory2 = $('#editCategory');
            category.forEach(function(category) {
                selectCategory1.append('<option value="' + category.id + '">' + category.category_type + '</option>');
                selectCategory2.append('<option value="' + category.id + '">' + category.category_type + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching category: ' + error);
        }
    });
});