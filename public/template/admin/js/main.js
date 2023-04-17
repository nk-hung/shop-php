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
            $("#edit_modal_" + id).modal("toggle");

            if (result.error) {
                alert("Có lỗi xảy ra trong quá trình!");
            } else {
                alert(result.message);
            }
            console.log("#edit_modal_" + id);

            location.reload();
        },
    });
}

$("#uploadFile").change(function () {
    const form = new FormData();
    console.log($(this)[0].files);
    form.append("uploadFile", $(this)[0].files[0]);
    console.log("form", form);
    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        dataType: "JSON",
        data: form,
        url: "/admin/upload/file",
        success: function (result) {
            const { error, url } = result;
            if (error) {
                alert("Upload Faild!");
            } else {
                $("#show_image").html(
                    '<a href="' +
                        url +
                        '  " target="_blank"> <img src="' +
                        url +
                        '" width="100px" ></a>'
                );
                $("#file").val(url);
            }
        },
    });
});
