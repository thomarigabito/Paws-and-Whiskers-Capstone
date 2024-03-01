$(document).ready(function() {
    // Load dealer from database
    $.ajax({
        url: '.././model/dealer.php',
        type: 'GET',
        success: function(response) {
            var dealer = JSON.parse(response);
            var selectDealer1 = $('#dealer');
            var selectDealer2 = $('#editDealer');
            dealer.forEach(function(dealer) {
                selectDealer1.append('<option value="' + dealer.id + '">' + dealer.dealer_name + '</option>');
                selectDealer2.append('<option value="' + dealer.id + '">' + dealer.dealer_name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching dealer: ' + error);
        }
    });
});