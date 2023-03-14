@extends("layouts.app")

@section("content")

<div class="page-wrapper">
    <div class="page-content">


        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> @lang('sidebar.dashboard') </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> {{__("sidebar.Categories")}} </li>

                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a class="btn btn-success" href="{{route("category.create")}}">{{__("custom.add")}}</a>

            </div>
        </div>

        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>{{__("custom.Name")}}</th>
                           
                            <th>{{__("custom.Action")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->Name}}</td>

                                    <td>
                                        <div class="d-flex order-actions">

                                            <a href="{{route("category.edit",$category->id)}}" class=""><i class="bx bxs-edit"></i></a>

                                            <a data-action="{{route("category.destroy",$category->id)}}" data-bs-toggle="modal" data-bs-target="#myModal" class="ms-3 open-deleteDialog"><i class="bx bxs-trash"></i></a>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<x-delete-modal />

@endsection
