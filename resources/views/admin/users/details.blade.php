@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
{{ config('app.name') }} | {{ __("Users") }}
@endsection

{{-- Active Menu --}}
@section('usersCreate')
active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
        </li>
        <li class="breadcrumb-item">{{ __("Users") }}</li>
        <li class="breadcrumb-item active">{{ __("Details") }}</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row match-height">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Autorisation") }}</h4>
            </div>
            <p class="card-text ml-2">Autorisation selon les rôles</p>
            <div class="table-responsive">
                <table class="table table-striped table-borderless">
                    <thead class="thead-light">
                        <tr>
                            <th>Module</th>
                            <th>Lire</th>
                            <th>Créer</th>
                            <th>Éditer</th>
                            <th>Supprimer</th>
                            <th>Assigne</th>
                            <th>Exporter</th>
                            <th>Import</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Yoga Class</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_read" value="yes" class="custom-control-input" id="class-read" {{( userHavePermission($user->id,'class','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_create" value="yes" class="custom-control-input" id="class-create" {{( userHavePermission($user->id,'class','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_edit" value="yes" class="custom-control-input" id="class-edit" {{( userHavePermission($user->id,'class','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_delete" value="yes" class="custom-control-input" id="class-delete" {{( userHavePermission($user->id,'class','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="class">Mettre à jour</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Category</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_read" value="yes" class="custom-control-input" id="category-read" {{( userHavePermission($user->id,'category','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_create" value="yes" class="custom-control-input" id="category-create" {{( userHavePermission($user->id,'category','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_edit" value="yes" class="custom-control-input" id="category-edit" {{( userHavePermission($user->id,'category','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_delete" value="yes" class="custom-control-input" id="category-delete" {{( userHavePermission($user->id,'category','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_export" value="yes" class="custom-control-input" id="category-export" {{( userHavePermission($user->id,'category','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_import" value="yes" class="custom-control-input" id="category-import" {{( userHavePermission($user->id,'category','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="category">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Sub Category</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_read" value="yes" class="custom-control-input" id="sub_category-read" {{( userHavePermission($user->id,'sub_category','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_create" value="yes" class="custom-control-input" id="sub_category-create" {{( userHavePermission($user->id,'sub_category','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_edit" value="yes" class="custom-control-input" id="sub_category-edit" {{( userHavePermission($user->id,'sub_category','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_delete" value="yes" class="custom-control-input" id="sub_category-delete" {{( userHavePermission($user->id,'sub_category','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_export" value="yes" class="custom-control-input" id="sub_category-export" {{( userHavePermission($user->id,'sub_category','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_import" value="yes" class="custom-control-input" id="sub_category-import" {{( userHavePermission($user->id,'sub_category','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="sub_category">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Coupons</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_read" value="yes" class="custom-control-input" id="coupons-read" {{( userHavePermission($user->id,'coupons','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_create" value="yes" class="custom-control-input" id="coupons-create" {{( userHavePermission($user->id,'coupons','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_edit" value="yes" class="custom-control-input" id="coupons-edit" {{( userHavePermission($user->id,'coupons','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_delete" value="yes" class="custom-control-input" id="coupons-delete" {{( userHavePermission($user->id,'coupons','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_export" value="yes" class="custom-control-input" id="coupons-export" {{( userHavePermission($user->id,'coupons','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_import" value="yes" class="custom-control-input" id="coupons-import" {{( userHavePermission($user->id,'coupons','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="coupons">Mettre à jour</button>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td>Products</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_read" value="yes" class="custom-control-input" id="products-read" {{( userHavePermission($user->id,'products','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_create" value="yes" class="custom-control-input" id="products-create" {{( userHavePermission($user->id,'products','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_edit" value="yes" class="custom-control-input" id="products-edit" {{( userHavePermission($user->id,'products','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_delete" value="yes" class="custom-control-input" id="products-delete" {{( userHavePermission($user->id,'products','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_export" value="yes" class="custom-control-input" id="products-export" {{( userHavePermission($user->id,'products','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_import" value="yes" class="custom-control-input" id="products-import" {{( userHavePermission($user->id,'products','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="products">Mettre à jour</button>
                            </td>
                        </tr> --}}
                        <tr>
                            <td>Orders</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="order_read" value="yes" class="custom-control-input" id="order-read" {{( userHavePermission($user->id,'order','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="order-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="order_edit" value="yes" class="custom-control-input" id="order-edit" {{( userHavePermission($user->id,'order','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="order-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="order_delete" value="yes" class="custom-control-input" id="order-delete" {{( userHavePermission($user->id,'order','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="order-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="order_export" value="yes" class="custom-control-input" id="order-export" {{( userHavePermission($user->id,'order','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="order-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="order">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Testimonial</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_read" value="yes" class="custom-control-input" id="testimonial-read" {{( userHavePermission($user->id,'testimonial','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_create" value="yes" class="custom-control-input" id="testimonial-create" {{( userHavePermission($user->id,'testimonial','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_edit" value="yes" class="custom-control-input" id="testimonial-edit" {{( userHavePermission($user->id,'testimonial','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_delete" value="yes" class="custom-control-input" id="testimonial-delete" {{( userHavePermission($user->id,'testimonial','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_export" value="yes" class="custom-control-input" id="testimonial-export" {{( userHavePermission($user->id,'testimonial','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-export"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="testimonial">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Client</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_read" value="yes" class="custom-control-input" id="client-read" {{( userHavePermission($user->id,'client','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_create" value="yes" class="custom-control-input" id="client-create" {{( userHavePermission($user->id,'client','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_edit" value="yes" class="custom-control-input" id="client-edit" {{( userHavePermission($user->id,'client','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_delete" value="yes" class="custom-control-input" id="client-delete" {{( userHavePermission($user->id,'client','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_assigne" value="yes" class="custom-control-input" id="client-assigne" {{( userHavePermission($user->id,'client','assigne') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-assigne"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_export" value="yes" class="custom-control-input" id="client-export" {{( userHavePermission($user->id,'client','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_import" value="yes" class="custom-control-input" id="client-import" {{( userHavePermission($user->id,'client','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="client">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Users</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_read" value="yes" class="custom-control-input" id="user-read" {{( userHavePermission($user->id,'user','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_create" value="yes" class="custom-control-input" id="user-create" {{( userHavePermission($user->id,'user','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_edit" value="yes" class="custom-control-input" id="user-edit" {{( userHavePermission($user->id,'user','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_delete" value="yes" class="custom-control-input" id="user-delete" {{( userHavePermission($user->id,'user','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-delete"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_export" value="yes" class="custom-control-input" id="user-export" {{( userHavePermission($user->id,'user','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-export"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="user">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Banner</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_read" value="yes" class="custom-control-input" id="banner-read" {{( userHavePermission($user->id,'banner','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_create" value="yes" class="custom-control-input" id="banner-create" {{( userHavePermission($user->id,'banner','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_edit" value="yes" class="custom-control-input" id="banner-edit" {{( userHavePermission($user->id,'banner','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_delete" value="yes" class="custom-control-input" id="banner-delete" {{( userHavePermission($user->id,'banner','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_export" value="yes" class="custom-control-input" id="banner-export" {{( userHavePermission($user->id,'banner','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_import" value="yes" class="custom-control-input" id="banner-import" {{( userHavePermission($user->id,'banner','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="banner">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Contact</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_read" value="yes" class="custom-control-input" id="contact-read" {{( userHavePermission($user->id,'contact','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_create" value="yes" class="custom-control-input" id="contact-create" {{( userHavePermission($user->id,'contact','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_edit" value="yes" class="custom-control-input" id="contact-edit" {{( userHavePermission($user->id,'contact','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_delete" value="yes" class="custom-control-input" id="contact-delete" {{( userHavePermission($user->id,'contact','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_export" value="yes" class="custom-control-input" id="contact-export" {{( userHavePermission($user->id,'contact','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_import" value="yes" class="custom-control-input" id="contact-import" {{( userHavePermission($user->id,'contact','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="studio">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Studio</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_read" value="yes" class="custom-control-input" id="studio-read" {{( userHavePermission($user->id,'studio','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_create" value="yes" class="custom-control-input" id="studio-create" {{( userHavePermission($user->id,'studio','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_edit" value="yes" class="custom-control-input" id="studio-edit" {{( userHavePermission($user->id,'studio','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_delete" value="yes" class="custom-control-input" id="studio-delete" {{( userHavePermission($user->id,'studio','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_export" value="yes" class="custom-control-input" id="studio-export" {{( userHavePermission($user->id,'studio','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_import" value="yes" class="custom-control-input" id="studio-import" {{( userHavePermission($user->id,'studio','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="studio">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>About Us</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="about_read" value="yes" class="custom-control-input" id="about-read" {{( userHavePermission($user->id,'about','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="about-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="about_edit" value="yes" class="custom-control-input" id="about-edit" {{( userHavePermission($user->id,'about','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="about-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="about">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Team</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_read" value="yes" class="custom-control-input" id="team-read" {{( userHavePermission($user->id,'team','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_create" value="yes" class="custom-control-input" id="team-create" {{( userHavePermission($user->id,'team','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_edit" value="yes" class="custom-control-input" id="team-edit" {{( userHavePermission($user->id,'team','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_delete" value="yes" class="custom-control-input" id="team-delete" {{( userHavePermission($user->id,'team','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_export" value="yes" class="custom-control-input" id="team-export" {{( userHavePermission($user->id,'team','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_import" value="yes" class="custom-control-input" id="team-import" {{( userHavePermission($user->id,'team','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="team">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Yoga Shop</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_read" value="yes" class="custom-control-input" id="shop-read" {{( userHavePermission($user->id,'shop','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-read"></label>-
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_create" value="yes" class="custom-control-input" id="shop-create" {{( userHavePermission($user->id,'shop','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_edit" value="yes" class="custom-control-input" id="shop-edit" {{( userHavePermission($user->id,'shop','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_delete" value="yes" class="custom-control-input" id="shop-delete" {{( userHavePermission($user->id,'shop','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_export" value="yes" class="custom-control-input" id="shop-export" {{( userHavePermission($user->id,'shop','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_import" value="yes" class="custom-control-input" id="shop-import" {{( userHavePermission($user->id,'shop','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="shop">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Roles</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_read" value="yes" class="custom-control-input" id="role-read" {{( userHavePermission($user->id,'role','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_create" value="yes" class="custom-control-input" id="role-create" {{( userHavePermission($user->id,'role','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_edit" value="yes" class="custom-control-input" id="role-edit" {{( userHavePermission($user->id,'role','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_delete" value="yes" class="custom-control-input" id="role-delete" {{( userHavePermission($user->id,'role','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-delete"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="role">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Contacts</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_read" value="yes" class="custom-control-input" id="contact-read" {{( userHavePermission($user->id,'contact','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_edit" value="yes" class="custom-control-input" id="contact-edit" {{( userHavePermission($user->id,'contact','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-edit"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_export" value="yes" class="custom-control-input" id="contact-export" {{( userHavePermission($user->id,'contact','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-export"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="contact">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Subscriber</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscriber_read" value="yes" class="custom-control-input" id="subscriber-read" {{( userHavePermission($user->id,'subscriber','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="subscriber-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscriber_delete" value="yes" class="custom-control-input" id="subscriber-delete" {{( userHavePermission($user->id,'subscriber','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="subscriber-delete"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="subscriber">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Appointment</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_read" value="yes" class="custom-control-input" id="appointment-read" {{( userHavePermission($user->id,'appointment','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_create" value="yes" class="custom-control-input" id="appointment-create" {{( userHavePermission($user->id,'appointment','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_edit" value="yes" class="custom-control-input" id="appointment-edit" {{( userHavePermission($user->id,'appointment','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_delete" value="yes" class="custom-control-input" id="appointment-delete" {{( userHavePermission($user->id,'appointment','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_assigne" value="yes" class="custom-control-input" id="appointment-assigne" {{( userHavePermission($user->id,'appointment','assigne') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-assigne"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_export" value="yes" class="custom-control-input" id="appointment-export" {{( userHavePermission($user->id,'appointment','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_import" value="yes" class="custom-control-input" id="appointment-import" {{( userHavePermission($user->id,'appointment','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="appointment">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Blogs</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_read" value="yes" class="custom-control-input" id="blogs-read" {{( userHavePermission($user->id,'blogs','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_create" value="yes" class="custom-control-input" id="blogs-create" {{( userHavePermission($user->id,'blogs','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_edit" value="yes" class="custom-control-input" id="blogs-edit" {{( userHavePermission($user->id,'blogs','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_delete" value="yes" class="custom-control-input" id="blogs-delete" {{( userHavePermission($user->id,'blogs','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_export" value="yes" class="custom-control-input" id="blogs-export" {{( userHavePermission($user->id,'blogs','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_import" value="yes" class="custom-control-input" id="blogs-import" {{( userHavePermission($user->id,'blogs','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="blogs">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Message</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="message_read" value="yes" class="custom-control-input" id="message-read" {{( userHavePermission($user->id,'message','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="message-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="message_delete" value="yes" class="custom-control-input" id="message-delete" {{( userHavePermission($user->id,'message','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="message-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="message_export" value="yes" class="custom-control-input" id="message-export" {{( userHavePermission($user->id,'message','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="message-export"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="message">Mettre à jour</button>
                            </td>
                        </tr>

                        {{-- <tr>
                            <td>Subscribe</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscribe_read" value="yes" class="custom-control-input" id="subscribe-read" {{( userHavePermission($user->id,'subscribe','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="subscribe-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscribe_delete" value="yes" class="custom-control-input" id="subscribe-delete" {{( userHavePermission($user->id,'subscribe','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="subscribe-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscribe_export" value="yes" class="custom-control-input" id="subscribe-export" {{( userHavePermission($user->id,'subscribe','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="subscribe-export"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="subscribe">Mettre à jour</button>
                            </td>
                        </tr> --}}


                        <tr>
                            <td>Stripe Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="stripe_read" value="yes" class="custom-control-input" id="stripe-read" {{( userHavePermission($user->id,'stripe','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="stripe-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="stripe_edit" value="yes" class="custom-control-input" id="stripe-edit" {{( userHavePermission($user->id,'stripe','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="stripe-edit"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="stripe">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Seo Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="seo_read" value="yes" class="custom-control-input" id="seo-read" {{( userHavePermission($user->id,'seo','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="seo-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="seo_edit" value="yes" class="custom-control-input" id="seo-edit" {{( userHavePermission($user->id,'seo','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="seo-edit"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="seo">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>General Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="general_setting_read" value="yes" class="custom-control-input" id="general_setting-read" {{( userHavePermission($user->id,'general_setting','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="general_setting-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="general_setting_edit" value="yes" class="custom-control-input" id="general_setting-edit" {{( userHavePermission($user->id,'general_setting','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="general_setting-edit"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="general_setting">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Color Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="color_setting_read" value="yes" class="custom-control-input" id="color_setting-read" {{( userHavePermission($user->id,'color_setting','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="color_setting-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="color_setting_edit" value="yes" class="custom-control-input" id="color_setting-edit" {{( userHavePermission($user->id,'color_setting','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="color_setting-edit"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="color_setting">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Social URL</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="social_url_read" value="yes" class="custom-control-input" id="social_url-read" {{( userHavePermission($user->id,'social_url','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="social_url-read"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="social_url_edit" value="yes" class="custom-control-input" id="social_url-edit" {{( userHavePermission($user->id,'social_url','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="social_url-edit"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-user-id="{{ $user->id }}" data-module-name="social_url">Mettre à jour</button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-6 col-md-12">
        <div class="card ps scrollable-container position-relative ps--active-y">
            <div class="card-header">
                <h4 class="card-title mb-2">Chronologie de l'utilisateur</h4>
            </div>
            <div class="card-body custom-table-responsive">
                <ul class="timeline">
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <a class="no-hover" href="https://soclose.co/billing_activity/view/1118/17">
                                <span>
                                    Mise à jour d'un projet de loi <b>VOLVIK FRANCE</b> avec le montant total de <div
                                        class="badge badge-pill badge-light-success">€9000</div>, le sous-total est <div
                                        class="badge badge-pill badge-light-warning">€7500</div> et le montant de la
                                    taxe est de <div class="badge badge-pill badge-light-info">€1500</div>
                                </span> <br>
                                <small>il y a 17 heures</small>
                            </a>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <a class="no-hover" href="https://soclose.co/category_activity/vliew/1117/160">
                                <span>
                                    Updated a category, named <b>VOLVIK FRANCE</b>.
                                </span> <br>
                                <small>il y a 18 heures</small>
                            </a>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <a class="no-hover" href="https://soclose.co/category_activity/vliew/1116/160">
                                <span>
                                    Updated a category, named <b>VOLVIK FRANCE</b>.
                                </span> <br>
                                <small>il y a 18 heures</small>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ps_rail-x" style="left: 0px; bottom: 0px;">
                <div class="psthumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="psrail-y" style="top: 0px; height: 551px; right: 0px;">
                <div class="ps_thumb-y" tabindex="0" style="top: 0px; height: 123px;"></div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-lg-6 col-md-12">
        <div class="card ps scrollable-container position-relative ps--active-y">
            <div class="card-header">
                <h4 class="card-title mb-2">Activité de l'utilisateur</h4>
            </div>
            <div class="card-body custom-table-responsive">
                <ul class="timeline">
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-success  timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <span>Jerem Myara was Active from Sep-06 09:09 PM to Sep-07 12:09 AM</span> <br>
                            <small>3 heures 14 minutes 17 secondes</small>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-success  timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <span>Jerem Myara was Active from Aug-31 08:08 AM to Aug-31 12:08 PM</span> <br>
                            <small>3 heures 53 minutes 10 secondes</small>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="ps_rail-x" style="left: 0px; bottom: -248px;">
                <div class="psthumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="psrail-y" style="top: 248px; height: 551px; right: 0px;">
                <div class="ps_thumb-y" tabindex="0" style="top: 145px; height: 323px;"></div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-lg-6 col-md-12">
        <div class="card plan-card border-primary">
            <form method="post" action="https://soclose.co/admin-user-file-store" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="gXtoeCstgxa6LgKut9p68ohIGbdS8vrHBnzke0ZM"> <input
                    type="hidden" value="45" name="user_id">
                <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                    <h5 class="mb-0">Fichier</h5>
                    <button type="submit"
                        class="btn btn-primary btn-sm waves-effect waves-float waves-light">Sauvegarder</button>
                </div>
                <div class="card-body">
                    <div class="badge badge-light-primary"></div>
                    <div class="border-top">
                        <ul class="list-unstyled my-1">
                            <li>
                                <span class="align-middle">
                                    <label>Fichier:</label>
                                </span>
                            </li>
                            <li>
                                <span class="align-middle">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file"
                                                required="">
                                            <label class="custom-file-label" for="file">Choisir le fichier</label>
                                        </div>
                                    </div>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
</div>
@endsection


@section('js')

<script>
    $(document).ready(function () {
        $('.perm_action_btn').click(function(e){
            e.preventDefault();
            var user_id = $(this).attr('data-user-id');
            var module_name = $(this).attr('data-module-name');
            var read = $("input[name='"+module_name+"_read']:checked").val();
            var create = $("input[name='"+module_name+"_create']:checked").val();
            var edit = $("input[name='"+module_name+"_edit']:checked").val();
            var deletes = $("input[name='"+module_name+"_delete']:checked").val();
            var assigne = $("input[name='"+module_name+"_assigne']:checked").val();
            var importt = $("input[name='"+module_name+"_import']:checked").val();
            var exportt = $("input[name='"+module_name+"_export']:checked").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : "{{ route('users.permission.action') }}",
                type : 'POST',
                data : {
                    user_id     : user_id,
                    module_name : module_name,
                    read        : read,
                    create      : create,
                    edit        : edit,
                    delete      : deletes,
                    assigne     : assigne,
                    import      : importt,
                    export      : exportt,
                },
                success : function(data)
                {
                    toastr.success(data);
                }
            });
        });
    });
</script>

@endsection
