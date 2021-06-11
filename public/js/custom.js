/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
function modalConfirm(btn) {
  $("#modal-confirm").modal("show");
  let id = btn.getAttribute("data-id");
  $("#btnConfirm").attr("href", baseUrl + "/delete/" + id);
}
if ($("#pageMenu") && $("#pageMenu").length) {
  $(".btn-edit").click(function (el) {
    let id = el.target.getAttribute("data-id");
    $.get(baseUrl + "/getData/" + id, function (data, status) {
      if (status == "success") {
        let response = JSON.parse(data);
        if (response.status) {
          let menu = response.response.menu;
          $("#form-modal").attr("action", baseUrl + "/update/" + id);
          $("#menu").attr("value", menu);
          $("#header-h5").html("Ubah Menu");
        } else {
          window.location.reload();
        }
      }
    });
    $("#modal-form").modal("show");
  });
  $("#modal-form").on("hidden.bs.modal", function (el) {
    $("#header-h5").html("Tambah Menu");
    $("#form-modal").attr("action", baseUrl + "/add");
    $("#menu").attr("value", "");
  });
}

if ($("#pageSubmenu") && $("#pageSubmenu").length) {
  $(".btn-edit").click(function (el) {
    let id = el.target.getAttribute("data-id");
    $.get(baseUrl + "/getData/" + id, function (data, status) {
      if (status == "success") {
        let response = JSON.parse(data);
        if (response.status) {
          let responses = response.response;
          $("#header-h5").html("Tambah Submenu");
          $("#form-modal").attr("action", baseUrl + "/update/" + id);
          $("#title").attr("value", responses.title);
          $("#menu option[value=" + responses.menu_id + "]").attr("selected", "selected");
          $("#url").attr("value", responses.url);
          $("#icon").attr("value", responses.icon);
          $("#is_active option[value=" + responses.is_active + "]").attr("selected", "selected");
        } else {
          window.location.reload();
        }
      }
    });
    $("#modal-form").modal("show");
  });
  $("#modal-form").on("hidden.bs.modal", function (el) {
    $("#header-h5").html("Tambah Submenu");
    $("#form-modal").attr("action", baseUrl + "/add");
    $("#title").attr("value", "");
    $("#menu option[value=none]").attr("selected", "selected");
    $("#url").attr("value", "");
    $("#icon").attr("value", "");
    $("#is_active option[value=none]").attr("selected", "selected");
  });
}
if ($("#pageUser") && $("#pageUser").length) {
  $(".btn-edit").click(function (el) {
    let id = el.target.getAttribute("data-id");
    $.get(baseUrl + "/getData/" + id, function (data, status) {
      if (status == "success") {
        let response = JSON.parse(data);
        if (response.status) {
          let responses = response.response;
          $("#header-h5").html("Tambah User");
          $("#form-modal").attr("action", baseUrl + "/update/" + id);
          $("#name").attr("value", responses.name);
          $("#email").attr("value", responses.email);
          $("#role option[value=" + responses.role_id + "]").attr("selected", "selected");
          $("#password").attr("value", "");
          $("#r_password").attr("value", "");
        } else {
          window.location.reload();
        }
      }
    });
    $("#modal-form").modal("show");
  });
  $("#modal-form").on("hidden.bs.modal", function (el) {
    $("#header-h5").html("Ubah User");
    $("#form-modal").attr("action", baseUrl + "/add");
    $("#name").attr("value", "");
    $("#email").attr("value", "");
    $("#role option[value=none]").attr("selected", "selected");
    $("#password").attr("value", "");
    $("#r_password").attr("value", "");
  });
}

if ($("#pageRole") && $("#pageRole").length) {
  $(".btn-edit").click(function (el) {
    let id = el.target.getAttribute("data-id");
    $.get(baseUrl + "/getData/" + id, function (data, status) {
      if (status == "success") {
        let response = JSON.parse(data);
        if (response.status) {
          let role = response.response.role;
          $("#form-modal").attr("action", baseUrl + "/update/" + id);
          $("#role").attr("value", role);
          $("#header-h5").html("Ubah Menu");
        } else {
          window.location.reload();
        }
      }
    });
    $("#modal-form").modal("show");
  });
  $("#modal-form").on("hidden.bs.modal", function (el) {
    $("#header-h5").html("Tambah Role");
    $("#form-modal").attr("action", baseUrl + "/add");
    $("#role").attr("value", "");
  });

  $(".btn-access").click(function (el) {
    $("input[type=checkbox]").attr("checked", false);
    let id = el.target.getAttribute("data-id");
    $.get(baseUrl + "/getRoleAccess/" + id, function (data, status) {
      if (status == "success") {
        let response = JSON.parse(data);
        if (response.status) {
          let roleaccess = response.response;
          roleaccess.forEach(function (i) {
            $("#menu" + i).attr("checked", "checked");
          });
        }
      }
    });
    $("#modal-access form").attr("action", baseUrl + "/role_access/" + id);
    $("#modal-access").modal("show");
  });
}
