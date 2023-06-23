<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui nilai input berdasarkan ID Penyewa
        $('#id_penyewa').change(function() {
        var idPenyewa = $(this).val();

        $.ajax({
            url: '/get-penyewa-info/' + idPenyewa,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#nama_penyewa').val(response.nama_penyewa);
                $('#no_hp').val(response.no_hp);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
        });

        // // Fungsi untuk memperbarui nilai input berdasarkan ID Penyewa
        // $('#id_kaset').change(function() {
        // var idKaset = $(this).val();

        // $.ajax({
        //     url: '/get-kaset-info/' + idKaset,
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(response) {
        //         $('#judul').val(response.judul);
        //         $('#harga_sewa').val(response.harga_sewa);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(xhr.responseText);
        //     }
        // });
        // });
        
        // Fungsi untuk memperbarui nilai input berdasarkan ID Kaset
        $('#id_kaset').change(function() {
        var idKaset = $(this).val();

        $.ajax({
            url: '/get-kaset-info/' + idKaset,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#judul').val(response.judul);
                $('#harga_sewa').val(response.harga_sewa);
                // updateTotalHarga();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
        });

    $(document).ready(function() {
        // Fungsi untuk mengupdate total harga berdasarkan jumlah sewa
        $('#jumlah_sewa').keyup(function() {
            updateTotalHarga();
        });

        // Fungsi untuk mengupdate total harga
        function updateTotalHarga() {
            var hargaSewa = parseFloat($('#harga_sewa').val());
            var jumlahSewa = parseFloat($('#jumlah_sewa').val());
            var totalHarga = hargaSewa * jumlahSewa;

            $('#total_harga').val(totalHarga.toFixed(0));
        }
    });

        // Fungsi untuk memperbarui nilai input berdasarkan ID Kaset
        $('#id_trx').change(function() {
        var idTransaksi = $(this).val();

        $.ajax({
            url: '/get-transaksi-info/' + idTransaksi,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#nama_penyewa').val(response.nama_penyewa);
                $('#judul').val(response.judul);
                $('#tanggal_pengembalian').val(response.tanggal_pengembalian);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
        });
    
    });
</script>

<script>
    function harga(input) {
        var value = input.value,
        value = value.split('.').join('');
        
        if (value.length > 3) {
            value = value.substring(0, value.length - 3) + '.' + value.substring(value.length - 3, value.length);
        }
        
        input.value = value;
    }    
</script>

{{-- <script src="{{ asset('template/assets/datatables/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('template/assets/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script src="{{ asset('template/assets/datatables/pdfmake-0.2.7/pdfmake.min.js')}}"></script>
  <script src="{{ asset('template/assets/datatables/pdfmake-0.2.7/vfs_fonts.js')}}"></script>
  <script src="{{ asset('template/assets/datatables/dataTables.bootstrap5.min.js')}}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.js"></script>
  <script>
      var buttonCommon = {
          init: function (dt, node, config) {
              var table = dt.table().context[0].nTable;
              if (table) config.title = $(table).data('export-title')
            },
            title: 'default title'
        };
        
        // Kaset
        $(document).ready(function () {
            $('#kaset').DataTable({
                dom: 'Blfrtip',
                lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5',
                        title: 'default title',
                        text: '<i class="bi bi-filetype-xlsx"></i> Export Excel',
                        className: 'btn btn-success my-3 ml-2',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5',
                        title: 'default title',
                        text: '<i class="bi bi-printer-fill"></i> Cetak PDF',
                        className: 'btn btn-warning my-3 ml-2',
                        messageTop: '',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        },
                        orientation: 'landscape',
                        pageSize: 'TABLOID',
                        customize: function (doc) {
                            var tblBody = doc.content[1].table.body;
                            // ***
                            //This section creates a grid border layout
                            // ***
                            doc.content[1].layout = {
                                hLineWidth: function(i, node) {
                                    return (i === 0 || i === node.table.body.length) ? 2 : 1;},
                                    vLineWidth: function(i, node) {
                                        return (i === 0 || i === node.table.widths.length) ? 2 : 1;},
                                        hLineColor: function(i, node) {
                                            return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';},
                                            vLineColor: function(i, node) {
                                                return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';}
                                            };
                  // ***
                  //This section loops thru each row in table looking for where either
                  //the second or third cell is empty.
                  //If both cells empty changes rows background color to '#FFF9C4'
                  //if only the third cell is empty changes background color to '#FFFDE7'
                  // ***
                  $('#tableID').find('tr').each(function (ix, row) {
                      var index = ix;
                      var rowElt = row;
                      $(row).find('td').each(function (ind, elt) {
                          if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                              delete tblBody[index][ind].style;
                              tblBody[index][ind].fillColor = '#FFF9C4';
                            }
                            else
                            {
                                if (tblBody[index][2].text == '') {
                                    delete tblBody[index][ind].style;
                                    tblBody[index][ind].fillColor = '#FFFDE7';
                                }
                            }
                        });
                    });
                }
            }),
        ]
    });
});

// Penyewa
$(document).ready(function () {
    $('#penyewa').DataTable({
        dom: 'Blfrtip',
        lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
        buttons: [
            $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
                title: 'default title',
                text: '<i class="bi bi-filetype-xlsx"></i> Export Excel',
                className: 'btn btn-success my-3 ml-2',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            }),
            $.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5',
                title: 'default title',
                text: '<i class="bi bi-printer-fill"></i> Cetak PDF',
                className: 'btn btn-warning my-3 ml-2',
                messageTop: '',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                },
                orientation: 'landscape',
                pageSize: 'TABLOID',
                customize: function (doc) {
                    var tblBody = doc.content[1].table.body;

                    doc.content[1].layout = {
                        hLineWidth: function(i, node) {
                            return (i === 0 || i === node.table.body.length) ? 2 : 1;},
                            vLineWidth: function(i, node) {
                                return (i === 0 || i === node.table.widths.length) ? 2 : 1;},
                                hLineColor: function(i, node) {
                                    return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';},
                                    vLineColor: function(i, node) {
                                        return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';}
                                    };

                  $('#tableID').find('tr').each(function (ix, row) {
                      var index = ix;
                      var rowElt = row;
                      $(row).find('td').each(function (ind, elt) {
                          if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                              delete tblBody[index][ind].style;
                              tblBody[index][ind].fillColor = '#FFF9C4';
                            }
                            else
                            {
                                if (tblBody[index][2].text == '') {
                                    delete tblBody[index][ind].style;
                                    tblBody[index][ind].fillColor = '#FFFDE7';
                                }
                            }
                        });
                    });
                }
            }),
        ]
    });
});

@can('admin')
// Transaksi
$(document).ready(function () {
    $('#transaksi').DataTable({
        dom: 'Blfrtip',
        lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
        buttons: [
            $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
                title: 'default title',
                text: '<i class="bi bi-filetype-xlsx"></i> Export Excel',
                className: 'btn btn-success my-3 ml-2',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }),
            $.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5',
                title: 'default title',
                text: '<i class="bi bi-printer-fill"></i> Cetak PDF',
                className: 'btn btn-warning my-3 ml-2',
                messageTop: '',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                },
                orientation: 'landscape',
                pageSize: 'TABLOID',
                customize: function (doc) {
                    var tblBody = doc.content[1].table.body;

                    doc.content[1].layout = {
                        hLineWidth: function(i, node) {
                            return (i === 0 || i === node.table.body.length) ? 2 : 1;},
                            vLineWidth: function(i, node) {
                                return (i === 0 || i === node.table.widths.length) ? 2 : 1;},
                                hLineColor: function(i, node) {
                                    return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';},
                                    vLineColor: function(i, node) {
                                        return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';}
                                    };

                  $('#tableID').find('tr').each(function (ix, row) {
                      var index = ix;
                      var rowElt = row;
                      $(row).find('td').each(function (ind, elt) {
                          if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                              delete tblBody[index][ind].style;
                              tblBody[index][ind].fillColor = '#FFF9C4';
                            }
                            else
                            {
                                if (tblBody[index][2].text == '') {
                                    delete tblBody[index][ind].style;
                                    tblBody[index][ind].fillColor = '#FFFDE7';
                                }
                            }
                        });
                    });
                }
            }),
        ]
    });
});
@endcan

@can('admin')
// Pengembalian
$(document).ready(function () {
    $('#pengembalian').DataTable({
        dom: 'Blfrtip',
        lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
        buttons: [
            $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
                title: 'default title',
                text: '<i class="bi bi-filetype-xlsx"></i> Export Excel',
                className: 'btn btn-success my-3 ml-2',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5]
                }
            }),
            $.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5',
                title: 'default title', 
                text: '<i class="bi bi-printer-fill"></i> Cetak PDF',
                className: 'btn btn-warning my-3 ml-2',
                messageTop: '',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5]
                },
                orientation: 'landscape',
                pageSize: 'TABLOID',
                customize: function (doc) {
                    var tblBody = doc.content[1].table.body;

                    doc.content[1].layout = {
                        hLineWidth: function(i, node) {
                            return (i === 0 || i === node.table.body.length) ? 2 : 1;},
                            vLineWidth: function(i, node) {
                                return (i === 0 || i === node.table.widths.length) ? 2 : 1;},
                                hLineColor: function(i, node) {
                                    return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';},
                                    vLineColor: function(i, node) {
                                        return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';}
                                    };

                  $('#tableID').find('tr').each(function (ix, row) {
                      var index = ix;
                      var rowElt = row;
                      $(row).find('td').each(function (ind, elt) {
                          if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                              delete tblBody[index][ind].style;
                              tblBody[index][ind].fillColor = '#FFF9C4';
                            }
                            else
                            {
                                if (tblBody[index][2].text == '') {
                                    delete tblBody[index][ind].style;
                                    tblBody[index][ind].fillColor = '#FFFDE7';
                                }
                            }
                        });
                    });
                }
            }),
        ]
    });
});
@endcan

@can('admin')
// Akun
$(document).ready(function () {
    $('#akun').DataTable({
        dom: 'Blfrtip',
        lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
        buttons: [
            $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
                title: 'default title',
                text: '<i class="bi bi-filetype-xlsx"></i> Export Excel',
                className: 'btn btn-success my-3 ml-2',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
            }),
            $.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5',
                title: 'default title', 
                text: '<i class="bi bi-printer-fill"></i> Cetak PDF',
                className: 'btn btn-warning my-3 ml-2',
                messageTop: '',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                },
                orientation: 'landscape',
                pageSize: 'TABLOID',
                customize: function (doc) {
                    var tblBody = doc.content[1].table.body;

                    doc.content[1].layout = {
                        hLineWidth: function(i, node) {
                            return (i === 0 || i === node.table.body.length) ? 2 : 1;},
                            vLineWidth: function(i, node) {
                                return (i === 0 || i === node.table.widths.length) ? 2 : 1;},
                                hLineColor: function(i, node) {
                                    return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';},
                                    vLineColor: function(i, node) {
                                        return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';}
                                    };

                  $('#tableID').find('tr').each(function (ix, row) {
                      var index = ix;
                      var rowElt = row;
                      $(row).find('td').each(function (ind, elt) {
                          if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                              delete tblBody[index][ind].style;
                              tblBody[index][ind].fillColor = '#FFF9C4';
                            }
                            else
                            {
                                if (tblBody[index][2].text == '') {
                                    delete tblBody[index][ind].style;
                                    tblBody[index][ind].fillColor = '#FFFDE7';
                                }
                            }
                        });
                    });
                }
            }),
        ]
    });
});
@endcan

$(document).ready(function() {
  var currentUrl = window.location.pathname; // Mendapatkan path URL halaman saat ini

  $('.sidebar-link').each(function() {
    var linkUrl = $(this).attr('href'); // Mendapatkan URL pada setiap menu link

    if (currentUrl === linkUrl) {
      $(this).closest('.sidebar-item').addClass('active'); // Menambahkan class 'active' pada elemen parent menu link yang sesuai dengan URL saat ini
      $(this).closest('.has-sub').addClass('submenu-open'); // Menambahkan class 'submenu-open' pada elemen parent menu link yang merupakan submenu
    }
  });
});

$(document).ready(function() {
  var currentUrl = window.location.pathname; // Mendapatkan path URL halaman saat ini

  $('.submenu-link').each(function() {
    var linkUrl = $(this).attr('href'); // Mendapatkan URL pada setiap menu link

    if (currentUrl === linkUrl) {
      $(this).closest('.submenu-item').addClass('active'); // Menambahkan class 'active' pada elemen parent menu link yang sesuai dengan URL saat ini
      $(this).closest('.has-sub').addClass('submenu-open'); // Menambahkan class 'submenu-open' pada elemen parent menu link yang merupakan submenu
    }
  });
});

</script>

<!-- Include Choices JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const transaksi = document.querySelector('.choices_transaksi');
    if (transaksi) {
      new Choices(transaksi);
    }
    });
  const choices1 = new Choices(document.querySelector('.choices_penyewa'));
  const choices2 = new Choices(document.querySelector('.choices_kaset'));
//   const choices3 = new Choices(document.querySelector('.choices_transaksi'));

</script>

<script src="{{ asset('template/assets/static/js/components/dark.js')}}"></script>
<script src="{{ asset('template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('template/assets/compiled/js/app.js')}}"></script>

<!-- Need: Apexcharts -->
{{-- <script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('template/assets/static/js/pages/dashboard.js')}}"></script> --}}