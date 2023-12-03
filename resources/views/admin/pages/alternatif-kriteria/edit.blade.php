@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Alternatif Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.alternatif-kriteria.index') }}">Alternatif</a>
                </div>
                <div class="breadcrumb-item">Edit Alternatif Kriteria</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form
                                action="{{ route('admin.alternatif-kriteria.update', $items->first()->alternatif->uuid) }}"
                                method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label>Kode Alternatif</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                        required="" name="kode"
                                        value="{{ $items->first()->alternatif->kode ?? old('kode') }}">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Alternatif</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        required="" name="nama"
                                        value="{{ $items->first()->alternatif->nama ?? old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <table class="table p-0 m-0">
                                    @foreach ($items as $item)
                                        <input type="hidden" name="kriteria_id[]" value="{{ $item->kriteria->id }}">
                                        <input type="text" name="id[]" value="{{ $item->id }}" hidden>
                                        <tr>
                                            <td class="pl-0">
                                                <div class="form-group">
                                                    <label>Kriteria</label>
                                                    <input type="text" value="{{ $item->kriteria->nama }}"
                                                        class="form-control" readonly>
                                                    @error('kriteria_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td class="pr-0">
                                                <div class="form-group">
                                                    <label>Pilih {{ $item->kriteria->nama }}</label>
                                                    <select name="sub_kriteria_id[]" id="sub_kriteria_id"
                                                        class="form-control @error('sub_kriteria_id') is-invalid @enderror">
                                                        <option value="" selected disabled>Pilih </option>
                                                        @foreach ($item->kriteria->subs as $sub)
                                                            <option @selected($sub->id == $item->sub_kriteria->id)
                                                                value="{{ $sub->id }}">{{ $sub->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('sub_kriteria_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="form-group">
                                    <button class="btn float-right btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#kriteria_id').on('change', function() {
                let kriteria_id = $(this).val();
                $.ajax({
                    url: '{{ route('admin.sub-kriteria.getByKriteriaId') }}',
                    type: 'GET',
                    data: {
                        kriteria_id
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.status) {
                            let data_sub_kriteria = response.data;
                            $('#sub_kriteria_id').empty();
                            $('#sub_kriteria_id').append(
                                `<option selected disabled>Pilih ${data_sub_kriteria[0].kriteria.nama}</option>`
                            )
                            data_sub_kriteria.forEach(sub => {
                                $('#sub_kriteria_id').append(
                                    `<option value="${sub.id}">${sub.nama}</option>`
                                )
                            });
                        }
                    }
                })
            })
        })
    </script>
@endpush
