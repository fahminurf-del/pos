@extends('layouts.app')
@section('content_title', 'Penerimaan Barang')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Penerimaan Barang</h4>
    </div>
    <div class="card-body">
    <div>
        <select name="select2" id="select2" class="form-control">

        </select>
    </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('#select2').select2({
            theme:'bootstrap',
            placeholder: 'Pilih Barang...',
            ajax:{
            url:"{{ route('get-data.product') }}",
            dataType:'json',
            delay:250,
            data:(params) => {
                return{
                    search:params.term
                }
            },
            processResults:(data)=>{
                console.log(data);
            }
        }
    })
    });
</script>
@endpush