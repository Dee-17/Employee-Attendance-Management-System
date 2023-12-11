// output the selected date
document.getElementById('search_button').addEventListener('click', function() {
    var selected_date = document.getElementById('picked_date').value;
    // display an alert if there's no date entered
    if(selected_date == "") {
        document.getElementById('selected_date').innerHTML = "NO DATE SELECTED";
    } else {
        // format date
        var date_parts = selected_date.split("-");
        var date = new Date(date_parts[0], date_parts[1]-1);        
        // display date on screen
        var month_name = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        document.getElementById('selected_date').innerHTML = (month_name[date.getMonth()] + ' ' + date.getFullYear()).toUpperCase();
    }
    // close modal
    $('#calendar_modal').modal('hide'); 
    });
    // changes the container shown on screen
    $(document).ready(function() {
        $('#search_button').on('click', function() {
        $('#date_picked').show();
        $('#current_date').hide();
    });
});