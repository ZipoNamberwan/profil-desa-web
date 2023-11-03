@extends('main')

@section('stylesheet')
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/assets/vendor/datatables2/datatables.min.css" />
<link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css" />
<link rel="stylesheet" href="/assets/css/container.css">
<link rel="stylesheet" href="/assets/css/text.css">
@endsection

@section('container')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-bell"></i></a></li>
                            <li class="breadcrumb-item"><a href="/characteristics">Judul Kolom</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Judul Kolom</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-3">Tambah Judul Kolom</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="formupdate" autocomplete="off" method="post" action="/characteristics" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="name">Nama Judul Kolom<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" value="{{ @old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-control-label" for="step">Daftar Item Judul Kolom</label>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="table-responsive py-2">
                                                <table class="table" width="100%" id="row-table">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="col-1">No</th>
                                                            <th class="col-3">Nama Item</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="px-1">1</td>
                                                            <td class="px-1 pr-5">
                                                                <input id="rowidfirst" type="hidden" name="rowid[]" @if (old('rowid.0')) value="{{ old('rowid.0') }}" @endif>
                                                                <input class="form-control" type="text" id="itemfirst" name="item[]" @if (old('item.0')) value="{{ old('item.0') }}" @endif>
                                                                @error('item.0')
                                                                <div class="error-feedback">
                                                                    kosong
                                                                </div>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        @if (old('item'))
                                                        @for ($i = 1; $i < count(old('item')); $i++) <tr>
                                                            <td class="px-1">{{$i+1}}</td>
                                                            <td class="px-1 pr-5">
                                                                <input type="hidden" name="rowid[]" @if (old('rowid'.$i)) value="{{ old('rowid.'.$i) }}" @endif><input class="form-control d-inline mr-2" type="text" id="itemfirst" name="item[]" @if (old('item.'.$i)) value="{{ old('item.'.$i) }}" @endif><button id="btnName{{ $i }}" onclick="removerow('btnName{{ $i }}')" class="btn btn-icon btn-sm btn-outline-danger d-inline" type="button"><span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span></button>
                                                                @error('item.'.$i)
                                                                <div class="error-feedback">
                                                                    kosong
                                                                </div>
                                                                @enderror
                                                            </td>
                                                            </tr>
                                                            @endfor
                                                            @endif
                                                            <tr>
                                                                <td colspan="3">
                                                                    <button onclick="addrow()" type="button" class="btn btn-secondary btn-sm">
                                                                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                                                        <span class="btn-inner--text">Tambah Item</span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3" id="sbmtbtn" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('optionaljs')
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    var rowcount = @if(old('item')) {{count(old('item'))}}@else 1 @endif;

    function makeButtonId(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    function addrow() {
        var rowtable = document.getElementById('row-table');

        rowcount++;
        var row = rowtable.insertRow(rowcount);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        cell1.className = 'px-1';
        cell2.className = 'pl-1 pr-5 nowrap';

        var buttonid = makeButtonId(10);

        cell1.innerHTML = rowcount;
        cell2.innerHTML = '<input type="hidden" name="rowid[]">' + "<input class=\"form-control d-inline mr-2\" type=\"text\" name=\"item[]\"><button id=\"btnName" + buttonid + "\" onclick=\"removerow('btnName" + buttonid + "')\" class=\"btn btn-icon btn-sm btn-outline-danger d-inline\" type=\"button\"><span class=\"btn-inner--icon\"><i class=\"fas fa-trash-alt\"></i></span></button>"
   }

    function removerow(btnName) {
        rowcount--;
        var id;
        var table = document.getElementById('row-table');
        var rowCount = table.rows.length;

        for (var i = 1; i < rowCount - 1; i++) {
            var row = table.rows[i];
            if (row.cells[1]) {
                var rowObj = row.cells[1].childNodes[2];
                var rowId = row.cells[1].childNodes[0];
                if (rowObj) {
                    if (rowObj.id == btnName) {
                        table.deleteRow(i);
                        id = rowId.value;
                        if (id) {
                            appendremovedactivity(id);
                        }
                        rowCount--;
                    }
                }
            }
        }
        reindex();
    }

    function reindex() {
        var table = document.getElementById('row-table');
        var startmain = 1;
        for (var i = 1; i < table.rows.length - 1; i++) {
            var row = table.rows[i];
            row.cells[0].innerHTML = startmain++;
        }
    }

    function appendremovedactivity(id) {
        var form = document.getElementById('formupdate');
        var hidden = document.createElement("input");
        hidden.setAttribute("type", "hidden");
        hidden.setAttribute("name", "removedactivity[]");
        hidden.setAttribute("id", "removedactivity[]");
        hidden.setAttribute("value", id);

        form.appendChild(hidden);
    }
</script>
@endsection