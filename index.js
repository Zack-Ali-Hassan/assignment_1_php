btn_Action = "Insert";
loadData();
$("#btn_add_student").on("click", function () {
  $("#modal_student").modal("show");
});
$("#form_student").on("submit", (event) => {
  event.preventDefault();

  let name = $("#name").val();
  let gender = $("#gender").val();
  let mobile = $("#mobile").val();
  let address = $("#address").val();
  let std_class = $("#std_class").val();
  let id = $("#update_info").val();

  //checking inputs
  const isValidMobile = /^61\d{7}$/.test(mobile);
  if (name == "") {
    displayAlert("error", "Please enter a name");
  } 
  else if (address == "") {
    displayAlert("error", "Please enter a address");
  } 
  else if (mobile == "") {
    displayAlert("error", "Please enter a mobile");
  } 
  else if (std_class == "") {
    displayAlert("error", "Please enter a class");
  }
  else if(!isValidMobile){
    displayAlert("error", "Please enter a valid mobile");
  }
  else {
    let sending_data = {};
    if (btn_Action == "Insert") {
      sending_data = {
        action: "register_student",
        name,
        gender,
        mobile,
        address,
        std_class,
      };
    } else {
      sending_data = {
        id,
        name,
        gender,
        address,
        mobile,
        std_class,
        action: "update_student",
      };
    }

    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "index_api.php",
      data: sending_data,
      success: function (data) {
        let status = data.status;
        let response = data.message;
        if (status) {
          displayAlert("success", response);

          btn_Action = "Insert";
          loadData();
        } else {
          displayAlert("error", response);
        }
      },
      error: function (data) {
        displayAlert("error", data.responseText);
      },
    });
  }
});

function loadData() {
  $("#table_student tbody").html("");
  let send_data = {
    action: "read_students",
  };
  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "index_api.php",
    data: send_data,
    success: function (data) {
      let status = data.status;
      let response = data.message;

      if (status) {
        let html = "";
        let tr = "";
        response.forEach((item) => {
          tr += "<tr>";
          for (let data in item) {
            tr += `<td>${item[data]}</td>`;
          }
          tr += `<td><a class="btn btn-primary update_info" update_info =${item["id"]} ><i class="fas fa-edit"></i></a>
         &nbsp;&nbsp <a class="btn btn-danger delete_info" delete_info =${item["id"]}><i class="fas fa-trash"></i></a></td>`;
          tr += "</tr>";
        });
        $("#table_student tbody").append(tr);

      }
    },
    error: function (data) {
      displayAlert("error", data.responseText);
    },
  });
}

function delete_student(id) {
  let sending_data = {
    action: "delete_student",
    id,
  };

  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "index_api.php",
    data: sending_data,
    success: function (data) {
      let status = data.status;
      let response = data.message;
      console.log(response)
      if (status) {
        Swal.fire({
          title: "Good job",
          text: response,
          icon: "success",
        });
        // alert(response);
        loadData();
      }
      else{
        Swal.fire({
          title: "Warning",
          text: response,
          icon: "warning",
        });
      }
      
    },
    error: function (data) {
      Swal.fire({
        title: "Warning",
        text: data.responseText,
        icon: "warning",
      });
    },
  });
}
function fetch_student(id) {
  let sending_data = {
    action: "read_single_student",
    id,
  };

  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "index_api.php",
    data: sending_data,
    success: function (data) {
      let status = data.status;
      let response = data.message;
      if (status) {
        btn_Action = "Update";
        $("#modal_student").modal("show");
        $("#update_info").val(response[0].student_id);
        $("#name").val(response[0].student_name);
        $("#gender").val(response[0].gender);
        $("#address").val(response[0].address);
        $("#mobile").val(response[0].mobile);
        $("#std_class").val(response[0].std_class);
      }
    },
    error: function (xhr, status, error) {
      alert("Unknown error...");
      // let errorMessage = xhr.responseText;
      // alert("Error: " + errorMessage);
    },
  });
}

$("#table_student").on("click", "a.update_info", function () {
  let id = $(this).attr("update_info");
  fetch_student(id);
});
$("#table_student").on("click", "a.delete_info", function () {
  let id = $(this).attr("delete_info");
  if (confirm(`Are you sure you want to delete this student id : ${id}`)) {
    delete_student(id);
  }
});

function displayAlert(type, message) {
  let success = document.querySelector(".alert-success");
  let error = document.querySelector(".alert-danger");
  if (type == "success") {
    success.classList = "alert alert-success";
    error.classList = "alert alert-danger d-none";
    success.innerHTML = message;
    setTimeout(() => {
      success.classList = "alert alert-success d-none";

      $("#modal_customer").modal("hide");
      $("#form_customer")[0].reset();
    }, 3000);
  } else {
    error.classList = "alert alert-danger";
    success.classList = "alert alert-success d-none";
    error.innerHTML = message;
  }
}
