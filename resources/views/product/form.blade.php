@extends("layouts.app")

@section('css')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

@endsection

@section("content")
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang("sidebar.dashboard")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> {{__("sidebar.Products")}} </li>
                        </ol>
                    </nav>
                </div>

            </div>

        <div class="row">
            <form class="row" action="{{$action }}" method="post" id="submitForm" enctype="multipart/form-data">
                @csrf
                @if($product->id != null)
                @method("put")
                @endif
                <div class="col-xl-6">
                    <h6 class="mb-0 text-uppercase">{{__("custom.ProductAdd")}}</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-cart me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">{{__("sidebar.Products")}}</h5>
                            </div>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">{{__("custom.Name")}}</label>
                                    <input type="text" value="{{ $product->Name }}" name="Name" class="form-control req" id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">{{__("custom.Description")}}</label>
                                    <textarea name="Description" class="form-control req" id="inputFirstName" >{{ $product->Description }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">{{__("custom.Category")}}</label>
                                    <select name="category_id" id="" class="form-control req">
                                        <option value="">{{ __('custom.SelectCategory') }}</option>
                                        @foreach ($categories as $category)

                                            <option value="{{ $category->id }}" {{ ($category->id == $product->category_id) ? 'selected' : ''}}>{{ $category->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-6">
                    <br>
                     <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">{{__("custom.Image")}}</h5>
                            </div>
                            <hr>



                            <div class="col-md-12 ">

                                <div id="image-preview"
                                @if($product->image)
                                style=" background-image:url('{{$product->image_for_web}}');background-size: cover;background-position: center center;"
                                @endif
                                >
                                    <label for="image-upload" id="image-label">{{ __('custom.ChooseFile') }}</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                             </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-md px-5 w-100"> {{ __('custom.save') }} </button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection


@section('script')
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/plugins/jquery-preview/jquery.uploadPreview.min.js') }}"></script>

{{-- Image Preview --}}
<script type="text/javascript">
    $(document).ready(function() {
      $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label"
      });
    });


    $('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
    });
</script>

@endsection
