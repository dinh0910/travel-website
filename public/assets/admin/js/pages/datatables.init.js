$(document).ready(
  function () {
    $("#datatable").DataTable({
      columnDefs: [{ orderable: false, targets: 0 }],
      order: [[1, 'asc']]
    });
    var a = $("#datatable-buttons").DataTable({
      lengthChange: !1,
      buttons: ["copy", "excel", "pdf"],
    });
    $("#key-datatable").DataTable({ keys: !0 }),
      $("#selection-datatable").DataTable({ select: { style: "multi" } }),
      a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
  }
);

$(document).ready(
  function () {
    $("#datatable1").DataTable({
      columnDefs: [{ orderable: false, targets: 0 }],
      order: [[1, 'asc']]
    });
    var a = $("#datatable-buttons").DataTable({
      lengthChange: !1,
      buttons: ["copy", "excel", "pdf"],
    });
    $("#key-datatable").DataTable({ keys: !0 }),
      $("#selection-datatable").DataTable({ select: { style: "multi" } }),
      a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
  }
);