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
                    <p class="card-title">ÜRÜN YÖNETİMİ</p>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('product.create')}}" class="btn btn-primary"> Yeni Ürün Oluştur</a>
                            <div class="table-responsive">
                                <table class="display expandable-table" style="width:100%">
                                    <thead>
                                    <br>
                                    <tr>
                                        <th >Resim</th>
                                        <th style="text-align:center">Name</th>
                                        <th style="text-align:center">Sahibi</th>
                                        <th  style="text-align:center;">Açıklama</th>
                                        <th >Fiyat</th>
                                        <th >Kategorisi</th>
                                        <th >Renk</th>
                                        <th style="text-align:center;">Durum</th>
                                        <th style="text-align:center;">İşlem</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($products) && $products->count()>0)

                                        @foreach($products as $product)

                                            <tr>
                                            <tr>
                                                <td  class="py-1">
                                                    <img id="image" style="width:50px; height:50px" src="{{asset('img/products/'.$product->product_image ?? '')}}"
                                                         alt="{{$product->product_desc}}">
                                                </td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->getUser->name ??  ''}}</td>
                                                <td style="text-align:center;">{{$product->product_desc ?? 'açıklaması yok'}}</td>
                                                <td>{{$product->product_price}}₺</td>
                                                <td><a href="{{route('subcategory.edit',$product->category->id)}}"><strong>{{$product->category->name}}</strong> </a></td>
                                                <td>{{$product->color}}</td>
                                                <td>
                                                    <div class="checkbox" item-id="{{$product->id}}">
                                                        <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif"
                                                               data-onstyle="success" data-offstyle="danger"
                                                               {{$product->status== '1' ? 'checked' : ''}} data-toggle="toggle">
                                                    </div>

                                                </td>
                                                <td class="d-flex">
                                                    <a title="Düzenle"
                                                       href="{{route('product.edit',$product->id)}}"
                                                       class="btn btn-primary mr-2"><i class='far fa-edit'> </i>
                                                    </a>
                                                    <button style="margin-left:0px ;background-color: crimson" title="Sil"
                                                            type="button" data-doggle="tooltip"
                                                            onclick="sil('{{route('product.destroy',$product->id)}}','{{$product->product_name}}',
                                            '{{asset('img/products').'/'.$product->product_image}}')"
                                                            class="btn"><i class="fa fa-trash  "></i></button>

                                                </td>

                                            </tr>

                                        @endforeach

                                    @else
                                        <tr>
                                            <td class="py-1">
                                                <h3 style="text-align: center">Ürün bulunamadı</h3>
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
            "<img src='" + image + "' style='width:400px;'>" + ' \n' + name + ' ürününü silmek istediğinize emin misiniz?',



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
                    url: "{{route('product.status.update')}}",
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

