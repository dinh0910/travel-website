$(document).ready(
  function () {
    $("#datatable").DataTable({
      // columnDefs: [{ orderable: false, targets: 0 }],
      order: [[1, 'asc']],
      columnDefs: [
        {
          targets: [0, 2],
          orderable: false
        }
      ]
    });
    $("#datatable1").DataTable({
      columnDefs: [{ orderable: false, targets: 0 }],
      order: [[1, 'asc']]
    });
    $("#datatable2").DataTable({
      columnDefs: [{ orderable: false, targets: 0 }],
      order: [[1, 'asc']]
    });
    $("#datatable-library").DataTable({
      order: [[4, 'desc']],
      columnDefs: [
        { targets: [0, 2], orderable: false },
      ]
    });
    $("#datatable-start-end").DataTable({
      order: [[1, 'asc']],
      columnDefs: [
        { targets: [-1, 0], orderable: false },
      ]
    });
    $("#datatable-sort-2").DataTable({
      columnDefs: [{ orderable: false, targets: 0 }],
      order: [[2, 'asc']]
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
