@extends('layouts.admin.layout')
@section('title')
<h2>Data Produk</h2>
@endsection
@section('content')
<div class="category-container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-head">
                    <h4 class="card-title">Tabel Produk</h4>
                    <button class="refresh-btn">Refresh</button>
                    <button class="tambah-btn">Tambah Data</button>
                </div>
            <div class="table-responsive">
                <table class="table table-striped" id="productTable">
                <thead class="text-center">
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-2">Nama Produk</th>
                        <th class="col-md-2">Harga</th>
                        <th class="col-md-3">Deskripsi</th>
                        <th class="col-md-1">Rating</th>
                        <th class="col-md-1">Stok</th>
                        <th class="col-md-1">Berat</th>
                        <th class="col-md-4">Aksi</th>
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
                <h4 class="modal-title" id="modelHeading">Tambah Data Produk</h4>
            </div>
            <div class="modal-body">
                <form id="ProductForm" name="ProductForm" class="form-horizontal">
                    <input type="hidden" name="product_id" id="product_id">

                    <div class="form-group">
                        <label for="product_name" class="col-sm-5 control-label">Nama Produk</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nama Produk..." value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-5 control-label">Harga</label>
                        <div class="input-group mb-3 col-sm-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Harga Produk..." id="price" name="price" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-5 control-label">Deskripsi Produk</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" aria-label="With textarea" id="description" name="description" placeholder="Deskripsi Produk" value="" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id" class="col-sm-5 control-label">Kategori Produk</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="category_id" name="category_id" aria-placeholder="category_id" >
                            <option value="" selected disabled hidden>Kategori Produk</option>
                            @foreach ( $category as $item )
                            <option value="{{ $item->id }}">{{ $item->nama_category }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stock" class="col-sm-5 control-label">Stok</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stok Produk..." value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="weight" class="col-sm-5 control-label">Berat</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Berat Produk..." value="" maxlength="50" required="">
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

<div class="modal fade" id="modalImage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Tambah Foto Produk</h4>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" class="form-horizontal">
                    <input type="hidden" name="category_id" id="category_id">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="file" class="custom-file-input" id="customFile" name="customFile ">
                            <label class="custom-file-label" for="customFile">Choose file</label>
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
        $('#productTable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ url('ajaxproduct') }}",
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable:false,
            },{
                data : 'product_name',
                name : 'product_name',
            },{
                data : 'price',
                name : 'price',
            },{
                data : 'description',
                name : 'description',
                orderable: false,
            },{
                data : 'product_rate',
                name : 'product_rate',
            },{
                data : 'stock',
                name : 'stock',
            },{
                data : 'weight',
                name : 'weight',
                orderable: false,
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

    // $('body').on('click', '.image-btn', function(e) {
    //     e.preventDefault();
    //     $('#modalImage').modal('show');
    //     $('.simpan-btn').click(function() {
    //         simpan();
    //     });
    // });

    // 03_PROSES EDIT
    $('body').on('click', '.edit-btn', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: "{{ url('ajaxproduct') }}" + '/' + id + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#ajaxModel').modal('show');
                $('#product_name').val(response.result.product_name);
                $('#price').val(response.result.price);
                $('#description').val(response.result.description);
                $('#stock').val(response.result.stock);
                $('#weight').val(response.result.weight);
                $('#category_id').val(response.result.category_id);
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
                url: "{{ url('ajaxproduct') }}" + '/' + id,
                method: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            $('#productTable').DataTable().ajax.reload();
        }
    });
    // fungsi simpan dan update
    function simpan(id = '') {
        if (id == '') {
            var var_url = "{{ route('ajaxproduct.store') }}";
            var var_type = 'POST';
        } else {
            var var_url = "{{ url('ajaxproduct') }}" + '/' + id;
            var var_type = 'PATCH';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {
                _token: '{{csrf_token()}}',
                product_name: $('#product_name').val(),
                price: $('#price').val(),
                description: $('#description').val(),
                stock: $('#stock').val(),
                weight: $('#weight').val(),
                category_id: $('#category_id').val()
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
                $('#productTable').DataTable().ajax.reload();
            }
        });
    }
    $('#ajaxModel').on('hidden.bs.modal', function() {
        $('#procut_name').val('');
        $('#price').val('');
        $('#description').val('');
        $('#stock').val('');
        $('#weight').val('');
        $('#category_id').val('');
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
</script>
@endsection
