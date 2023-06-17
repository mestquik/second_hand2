@extends('backend.layout.app')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">LOGO YÖNETİMİ</h4>
            <a href="{{route('logo.create')}}" class="btn btn-primary"> Yeni Logo Oluştur</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Name</th>
                        <th>Açıklama</th>
                        <th>Durum</th>
                        <th>işlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($logos) && $logos->count()>0)
                        @foreach($logos as $logo)
                            <tr>
                                <td class="py-1">
                                    <img id="image" src="{{asset('img/logos/'.$logo->image ?? '')}}"
                                         alt="{{$logo->content}}">
                                </td>
                                <td>{{$logo->name}}</td>
                                <td>{{$logo->content ?? 'açıklaması yok'}}</td>
                                <td>
                                    <div class="checkbox" item-id="{{$logo->id}}">

                                        <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif"
                                               data-onstyle="success" data-offstyle="danger"
                                               {{$logo->status== '1' ? 'checked' : ''}} data-toggle="toggle">

                                    </div>

                                </td>

                                <td class="d-flex">
                                    <a title="Düzenle"
                                       href="{{route('logo.edit',$logo->id)}}"
                                       class="btn btn-primary mr-2"><i class='far fa-edit'> </i>
                                    </a>
                                    <button style="margin-left:0px ;background-color: crimson" title="Sil"
                                            type="button" data-doggle="tooltip"
                                            onclick="sil('{{route('logo.destroy',$logo->id)}}','{{$logo->name}}',
                                            '{{asset('/img/logos/').'/'.$logo->image}}')"
                                            class="btn"><i class="fa fa-trash  "></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="py-1">
                                <h3 style="text-align: center">logo bulunamadı</h3>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



<form method="post" id="delFrm">
@csrf
@method('delete')
</form>


<script>


function sil(id, name, image) {


    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btnn btn-danger',
            cancelButton: 'btnn btn-success'
        },
        buttonsStyling: true
    })

    swalWithBootstrapButtons.fire({


        title:

            "<img src='" + image + "' style='width:400px;'>" + ' \n' + name + ' logosunu silmek istediğinize emin misiniz?',


        text: "Geri alamayacaksınız!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Evet, sil',
        cancelButtonText: 'Hayır, iptal et!',
        reverseButtons: true
    }).then((result) => {
            if (result.isConfirmed) {

                $('#delFrm').attr('action', id);
                $('#delFrm').submit();

            }
        }
    )
}
</script>

@endsection


@section('customjs')

    <script>

        $(document).on('change', '.durum', function (e) {

            id = $(this).closest('.checkbox').attr('item-id');
            statu = $(this).prop('checked');
            $.ajax(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    type: "PUT",
                    url: "{{route('logo.statu.update')}}",
                    data: {
                        id: id,
                        statu: statu,
                    },
                    success: function (response) {
                        if (response.status == 'true') {
                            alertify.success('Durum "Aktif" hale getirildi');
                        } else {

                            alertify.error('Durum "Pasif" hale getirildi');

                        }

                    }
                });


        });
    </script>
@endsection
