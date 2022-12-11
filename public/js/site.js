$("#parse-news").on("click", function () {
    let _token = $('input[name="_token"]').val();
    $("#spinner").show();
    $("#news").hide();
    $.ajax({
        type: "POST",
        url: "/parse-news",
        data: { _token: _token },
        success: function (result) {
            $("#spinner").hide();
            $("#news").show();
            $("#appendDivNews").html(result);
            window.location.reload();
        },

        error: function () {
            $("#spinner").hide();
            $("#news").show();
            alert("An error occurred, please try again!");
        },
    });
});
