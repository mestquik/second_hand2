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
                    <p class="card-title"> ALT KATEGORİ YÖNETİMİ</p>
                    <a href="{{route('subcategory.create')}}" class="btn btn-primary"> Yeni Altkategori Oluştur</a>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table" style="width:100%">
                                    <thead>
                                    <br>
                                    <tr>
                                        <th >Resim</th>
                                        <th >İsim</th>
                                        <th  style="text-align:center;">Açıklama</th>
                                        <th  style="text-align:center;">Üst Kategorisi</th>
                                        <th  style="text-align:center;">Toplam Ürün</th>
                                        <th >Durum</th>
                                        <th >İşlem</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($subcategories) && $subcategories->count()>0)

                                        @foreach($subcategories as $category)


                                                <tr>
                                                <tr>
                                                    <td  class="py-1">
                                                        <img id="image" style="width:50px; height:50px" src="{{asset('img/subcategories/').'/'.$category->image ?? '' }}"

                                                             alt="{{$category->content}}">
                                                    </td>
                                                    <td>{{$category->name}}</td>
                                                    <td style="text-align:center;">{{$category->content ?? 'açıklaması yok'}}</td>
                                                    <td  style="text-align:center;">
                                                            <a href="{{route('category.edit',$category->parent->id)}}" >
                                                                <strong>{{$category->parent->name ?? ''}}</strong>
                                                            </a>

                                                    </td>
                                                    <td style="text-align:center;">{{$category->product_count ?? 'açıklaması yok'}}</td>



                                                    <td>
                                                        <div class="checkbox" item-id="{{$category->id}}">
                                                            <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif"
                                                                   data-onstyle="success" data-offstyle="danger"
                                                                   {{$category->status== '1' ? 'checked' : ''}} data-toggle="toggle">
                                                        </div>

                                                    </td>
                                                    <td style="text-align:center;" class="d-flex">
                                                        <a title="Düzenle"
                                                          href="{{route('subcategory.edit',$category->id)}}"
                                                           class="btn btn-primary mr-2"><i class='far fa-edit'> </i>
                                                        </a>
                                                        <button style="margin-left:0px ;background-color: crimson" title="Sil"
                                                                type="button" data-doggle="tooltip"
                                                                onclick="sil('{{route('category.destroy',$category->id)}}','{{$category->name}}',
                                            '{{asset('/img/category/').'/'.$category->image}}')"
                                                                class="btn"><i class="fa fa-trash  "></i></button>

                                                    </td>

                                                </tr>

                                        @endforeach

                                    @else
                                        <tr>
                                            <td class="py-1">
                                                <h3 style="text-align: center">Alt Kategori bulunamadı</h3>
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

                    "<img src='" + image + "' style='width:400px;'>" + ' \n' + name + ' Ürününü silmek istediğinize emin misiniz?',


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
                    url: "{{route('category.statu.update')}}",
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

