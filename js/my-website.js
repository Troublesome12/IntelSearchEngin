$(function () {
    $("#tags").autocomplete({
        source: 'search.php',
        minLength: 2
    });
});

function onSearch() {
    var word = document.getElementById("tags").value;

    $.ajax({
        type: "POST",
        url: "search.php",
        data: {input: word},
        cache: false,
        success: function (data) {
            var defination_lebel = document.getElementById("defination_lebel"); 
            defination_lebel.innerHTML = data;
        }
    });
}