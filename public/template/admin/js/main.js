$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function ajaxRemove(id, url) {
    console.log("id", id, "url", url);
    $.ajax({
        type: "DELETE",
        datatype: "JSON",
        data: { id },
        url,
        success: function (result) {
            console.log(result);
            if (result.error) {
                alert("Có lỗi xảy ra trong quá trình!");
            } else {
                alert(result.message);
            }
        },
    });
}
