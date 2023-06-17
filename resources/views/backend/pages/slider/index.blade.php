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
            <h4 class="card-title">SLİDER YÖNETİMİ</h4>

            <a href="{{route('slider.create')}}" class="btn btn-primary"> Yeni Slider Oluştur</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Name</th>
                        <th>Açıklama</th>
                        <th>Link</th>
                        <th>Durum</th>
                        <th>işlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($sliders) && $sliders->count()>0)
                        @foreach($sliders as $slider)
                            <tr>
                                <td class="py-1">
                                    <img id="image" src="{{asset('img/sliders/'.$slider->image ?? '')}}"
                                         alt="{{$slider->content}}">
                                </td>
                                <td>{{$slider->name}}</td>
                                <td>{{$slider->content ?? 'açıklaması yok'}}</td>
                                <td>{{$slider->link}}</td>
                                <td>
                                    <div class="checkbox" item-id="{{$slider->id}}">

                                        <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif"
                                               data-onstyle="success" data-offstyle="danger"
                                               {{$slider->status== '1' ? 'checked' : ''}} data-toggle="toggle">

                                    </div>

                                </td>

                                <td class="d-flex">
                                    <a title="Düzenle"
                                       href="{{route('slider.edit',$slider->id)}}"
                                       class="btn btn-primary mr-2"><i class='far fa-edit'> </i>
                                    </a>
                                    <button style="margin-left:0px ;background-color: crimson" title="Sil"
                                            type="button" data-doggle="tooltip"
                                            onclick="sil('{{route('slider.destroy',$slider->id)}}','{{$slider->name}}',
                                            '{{asset('/img/sliders/').'/'.$slider->image}}')"
                                            class="btn"><i class="fa fa-trash  "></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="py-1">
                                <h3 style="text-align: center">slider bulunamadı</h3>
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

            "<img src='" + image + "' style='width:400px;'>" + ' \n' + name + ' sliderini silmek istediğinize emin misiniz?',


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
                    url: "{{route('slider.status.update')}}",
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
