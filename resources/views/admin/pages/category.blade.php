@extends('layouts.admin.layout')
@section('title')
<h2>Data Kategori</h2>
@endsection
@section('content')
<div class="category-container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-head">
                    <h4 class="card-title">Tabel Kategori</h4>
                    <button class="refresh-btn">Refresh</button>
                    <button class="tambah-btn">Tambah Data</button>
                </div>
            <div class="table-responsive">
                <table class="table table-striped" id="categoryTable">
                <thead class="text-center">
                    <tr>
                        <th class="col-md-2">No</th>
                        <th class="col-md-5">Kode Kategory</th>
                        <th class="col-md-5">Nama Kategory</th>
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
                <h4 class="modal-title" id="modelHeading">Tambah Data Kategori</h4>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" class="form-horizontal">
                    <input type="hidden" name="category_id" id="category_id">

                    <div class="form-group">
                        <label for="kode_category" class="col-sm-5 control-label">Kode Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="kode_category" name="kode_category" placeholder="Kode Kategori" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_category" class="col-sm-5 control-label">Nama Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_category" name="nama_category" placeholder="Nama Kategori" value="" maxlength="50" required="">
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
        $('#categoryTable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ url('ajaxcategory') }}",
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable:false,
            },{
                data : 'kode_category',
                name : 'kode_category',
            },{
                data : 'nama_category',
                name : 'nama_category',
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
            url: "{{ url('ajaxcategory') }}" + '/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#ajaxModel').modal('show');
                $('#kode_category').val(response.result.kode_category);
                $('#nama_category').val(response.result.nama_category);
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
                url: "{{ url('ajaxcategory') }}" + '/' + id,
                method: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            $('#categoryTable').DataTable().ajax.reload();
        }
    });
    // fungsi simpan dan update
    function simpan(id = '') {
        if (id == '') {
            var var_url = "{{ route('ajaxcategory.store') }}";
            var var_type = 'POST';
        } else {
            var var_url = "{{ url('ajaxcategory') }}" + '/' + id;
            var var_type = 'PATCH';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {
                kode_category: $('#kode_category').val(),
                nama_category: $('#nama_category').val(),
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
                $('#categoryTable').DataTable().ajax.reload();
            }
        });
    }
    $('#ajaxModel').on('hidden.bs.modal', function() {
        $('#kode_category').val('');
        $('#nama_category').val('');
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
</script>
@endsection
