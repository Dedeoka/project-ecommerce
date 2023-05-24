@extends('layouts.admin.layout')
@section('title')
<h2>Data Kurir</h2>
@endsection
@section('content')
<div class="category-container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-head">
                    <h4 class="card-title">Tabel Kurir</h4>
                    <button class="refresh-btn">Refresh</button>
                    <button class="tambah-btn">Tambah Data</button>
                </div>
            <div class="table-responsive">
                <table class="table table-striped" id="courierTable">
                <thead class="text-center">
                    <tr>
                        <th class="col-md-2">No</th>
                        <th class="col-md-5">Nama Kurir</th>
                        <th class="col-md-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Tambah Data Kurir</h4>
            </div>
            <div class="modal-body">
                <form id="courierForm" name="courierForm" class="form-horizontal">
                    <input type="hidden" name="courier_id" id="courier_id">

                    <div class="form-group">
                        <label for="courier" class="col-sm-5 control-label">Nama Layanan Kurir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="courier" name="courier" placeholder="Nama Layanan Kurir" value="" maxlength="50" required="">
                        </div>
                    </div>


                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary simpan-btn" id="saveBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    $(document).ready(function(){
        $('#courierTable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ url('ajaxcourier') }}",
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable:false,
            },{
                data : 'courier',
                name : 'Courier',
            },{
                data : 'action',
                name : 'Action',
                orderable: false,
                searchable:false,
            }]
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // 02_PROSES SIMPAN
    $('body').on('click', '.tambah-btn', function(e) {
        e.preventDefault();
        $('#ajaxModel').modal('show');
        $('.simpan-btn').click(function() {
            simpan();
        });
    });
    // 03_PROSES EDIT
    $('body').on('click', '.edit-btn', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: "{{ url('ajaxcourier') }}" + '/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#ajaxModel').modal('show');
                $('#courier').val(response.result.courier);
                console.log(response.result);
                $('.simpan-btn').click(function() {
                    simpan(id);
                });
            }
        });
    });
    // 04_PROSES Delete
    $('body').on('click', '.delete-btn', function(e) {
        if (confirm('Yakin mau hapus data ini?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('ajaxcourier') }}" + '/' + id,
                method: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            $('#courierTable').DataTable().ajax.reload();
        }
    });
    // fungsi simpan dan update
    function simpan(id = '') {
        if (id == '') {
            var var_url = "{{ route('ajaxcourier.store') }}";
            var var_type = 'POST';
        } else {
            var var_url = "{{ url('ajaxcourier') }}" + '/' + id;
            var var_type = 'PATCH';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {
                courier: $('#courier').val(),
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                if (response.errors) {
                    console.log(response.errors);
                    $('.alert-danger').removeClass('d-none');
                    $('.alert-danger').html("<ul>");
                    $.each(response.errors, function(key, value) {
                        $('.alert-danger').find('ul').append("<li>" + value +
                            "</li>");
                    });
                    $('.alert-danger').append("</ul>");
                } else {
                    $('.alert-success').removeClass('d-none');
                    $('.alert-success').html(response.success);
                }
                $('#courierTable').DataTable().ajax.reload();
            }
        });
    }
    $('#ajaxModel').on('hidden.bs.modal', function() {
        $('#courier').val('');
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
</script>
@endsection
