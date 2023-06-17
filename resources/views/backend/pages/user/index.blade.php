@extends('backend.layout.app')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif


<div class="row">
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">KULLANICI YÖNETİMİ</p>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="display expandable-table" style="width:100%">
                            <thead>
                            <tr>
                                <th >Resim</th>
                                <th style="text-align:center">İsim</th>
                                <th style="text-align:center">Rol</th>
                                <th  style="text-align:center;">E-mail</th>
                                <th >Ürün Toplam</th>

                                <th style="text-align:center;">Durum</th>
                                <th style="text-align:center;">İşlem</th>

                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($users) && $users->count()>0)
                                @foreach($users as $user)

                                    <tr>
                                    <tr>
                                        <td  class="py-1">
                                            <img id="image" style="width:50px; height:50px" src="{{asset('img/users'.'/'.$user->image ?? '')}}">
                                        </td>
                                        <td>{{$user->name}}</td>
                                        @foreach($user->roles as $role)

                                        @endforeach
                                        <td>
                                            @if ($user->is_admin())
                                            {{$role->name}}
                                            @else
                                                Standart Kullanıcı

                                            @endif
                                        </td>

                                        <td>{{$user->email}}</td>
                                        <td> <a href="{{route('user.products',$user->id)}}" ></strong> {{$user->getProduct->count()}}</a></td>
                                        <td>
                                            <div class="checkbox" item-id="{{$user->id}}">
                                                <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif"
                                                       data-onstyle="success" data-offstyle="danger"
                                                       {{$user->status== '1' ? 'checked' : ''}} data-toggle="toggle">
                                            </div>

                                        </td>
                                        <td class="d-flex">
                                            <a title="Düzenle"
                                               href="{{route('user.edit',$user->id)}}"
                                               class="btn btn-primary mr-2"><i class='far fa-edit'> </i>
                                            </a>
                                            <button style="margin-left:0px ;background-color: crimson" title="Sil"
                                                    type="button" data-doggle="tooltip"
                                                    onclick="sil('{{route('user.destroy',$user->id)}}','{{$user->name}}',
                                    '{{asset('img/users').'/'.$user->image}}')"
                                                    class="btn"><i class="fa fa-trash  "></i></button>

                                        </td>

                                    </tr>

                            @endforeach
                            @else
                                <tr>
                                    <td class="py-1">
                                        <h3 style="text-align: center">Kullanıcı bulunamadı</h3>
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
    "<img src='" + image + "' style='width:400px;'>" + ' \n' + name + ' kullanıcısı silmek istediğinize emin misiniz?',



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
            url: "{{route('user.statu.update')}}",
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

