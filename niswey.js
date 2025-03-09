$(document).ready(function() {
    // Load contact data into modal
    $(".edit-btn").click(function() {
        $("#editId").val($(this).data("id"));
        $("#editName").val($(this).data("name"));
        $("#editPhone").val($(this).data("phone"));
        $("#editModal").modal("show");

    });

    // Update contact
    $("#editForm").submit(function(e) {
        e.preventDefault();
        let id = $("#editId").val();
        let name = $("#editName").val();
        let phone = $("#editPhone").val();

        $.post("index.php?m=feedback&a=update", { id: id, name: name, phone: phone }, function(response) {
                
            let jsonData = JSON.parse(response);
            if (jsonData.response === "success") {
                $("#row_" + id).find("td:eq(1)").text(name);
                $("#row_" + id).find("td:eq(2)").text(phone);
                $("#editModal").modal("hide");
                $(".close").click()
            }
            else
            {
                alert("Update failed!");
            }
        });
    });

    // Delete contact
    $(".delete-btn").click(function() {
        let id = $(this).data("id");

        if (confirm("Are you sure you want to delete this contact?")) {
            $.post("index.php?m=feedback&a=delete", { id: id }, function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.response === "success") {
                    alert("Delete Successfully!");
                    $("#row_" + id).remove();
                } else {
                    alert("Delete failed!");
                }
            });
        }
    });


    // Import contacts from XML
  $("#importForm").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: "index.php?m=feedback&a=import",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response === "success") {
                alert('Import completed');
            }
            else{
                alert('Issue with Import');
            }
        }
    });
});
});
