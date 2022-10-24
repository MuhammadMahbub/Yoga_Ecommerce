@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
{{ config('app.name') }} | Role
@endsection

{{-- Active Menu --}}
@section('usersCreate')
active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('role.index') }}">Role</a>
        </li>
        <li class="breadcrumb-item active">Permissions</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row match-height">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Autorisation for {{ $role->name }}</h4>
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
                            <th>Import</th>
                            <th>Exporter</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Yoga Class</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_read" value="yes" class="custom-control-input" id="class-read" {{( roleHavePermission($role->id,'class','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_create" value="yes" class="custom-control-input" id="class-create" {{( roleHavePermission($role->id,'class','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_edit" value="yes" class="custom-control-input" id="class-edit" {{( roleHavePermission($role->id,'class','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="class-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="class_delete" value="yes" class="custom-control-input" id="class-delete" {{( roleHavePermission($role->id,'class','delete') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="class">Mettre à jour</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Category</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_read" value="yes" class="custom-control-input" id="category-read" {{( roleHavePermission($role->id,'category','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_create" value="yes" class="custom-control-input" id="category-create" {{( roleHavePermission($role->id,'category','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_edit" value="yes" class="custom-control-input" id="category-edit" {{( roleHavePermission($role->id,'category','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_delete" value="yes" class="custom-control-input" id="category-delete" {{( roleHavePermission($role->id,'category','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="category_export" value="yes" class="custom-control-input" id="category-export" {{( roleHavePermission($role->id,'category','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="category_import" value="yes" class="custom-control-input" id="category-import" {{( roleHavePermission($role->id,'category','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="category-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="category">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Sub Category</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_read" value="yes" class="custom-control-input" id="sub_category-read" {{( roleHavePermission($role->id,'sub_category','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_create" value="yes" class="custom-control-input" id="sub_category-create" {{( roleHavePermission($role->id,'sub_category','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_edit" value="yes" class="custom-control-input" id="sub_category-edit" {{( roleHavePermission($role->id,'sub_category','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_delete" value="yes" class="custom-control-input" id="sub_category-delete" {{( roleHavePermission($role->id,'sub_category','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="sub_category_export" value="yes" class="custom-control-input" id="sub_category-export" {{( roleHavePermission($role->id,'sub_category','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sub_category_import" value="yes" class="custom-control-input" id="sub_category-import" {{( roleHavePermission($role->id,'sub_category','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="sub_category-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="sub_category">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Coupons</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_read" value="yes" class="custom-control-input" id="coupons-read" {{( roleHavePermission($role->id,'coupons','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_create" value="yes" class="custom-control-input" id="coupons-create" {{( roleHavePermission($role->id,'coupons','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_edit" value="yes" class="custom-control-input" id="coupons-edit" {{( roleHavePermission($role->id,'coupons','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_delete" value="yes" class="custom-control-input" id="coupons-delete" {{( roleHavePermission($role->id,'coupons','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="coupons_export" value="yes" class="custom-control-input" id="coupons-export" {{( roleHavePermission($role->id,'coupons','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="coupons_import" value="yes" class="custom-control-input" id="coupons-import" {{( roleHavePermission($role->id,'coupons','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="coupons-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="coupons">Mettre à jour</button>
                            </td>
                        </tr> 
                        {{-- <tr>
                            <td>Products</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_read" value="yes" class="custom-control-input" id="products-read" {{( roleHavePermission($role->id,'products','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_create" value="yes" class="custom-control-input" id="products-create" {{( roleHavePermission($role->id,'products','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_edit" value="yes" class="custom-control-input" id="products-edit" {{( roleHavePermission($role->id,'products','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_delete" value="yes" class="custom-control-input" id="products-delete" {{( roleHavePermission($role->id,'products','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="products_export" value="yes" class="custom-control-input" id="products-export" {{( roleHavePermission($role->id,'products','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="products_import" value="yes" class="custom-control-input" id="products-import" {{( roleHavePermission($role->id,'products','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="products-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="products">Mettre à jour</button>
                            </td>
                        </tr> --}}
                        <tr>
                            <td>Orders</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="order_read" value="yes" class="custom-control-input" id="order-read" {{( roleHavePermission($role->id,'order','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="order_edit" value="yes" class="custom-control-input" id="order-edit" {{( roleHavePermission($role->id,'order','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="order-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="order_delete" value="yes" class="custom-control-input" id="order-delete" {{( roleHavePermission($role->id,'order','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="order_export" value="yes" class="custom-control-input" id="order-export" {{( roleHavePermission($role->id,'order','export') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="order">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Testimonial</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_read" value="yes" class="custom-control-input" id="testimonial-read" {{( roleHavePermission($role->id,'testimonial','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_create" value="yes" class="custom-control-input" id="testimonial-create" {{( roleHavePermission($role->id,'testimonial','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_edit" value="yes" class="custom-control-input" id="testimonial-edit" {{( roleHavePermission($role->id,'testimonial','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="testimonial-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="testimonial_delete" value="yes" class="custom-control-input" id="testimonial-delete" {{( roleHavePermission($role->id,'testimonial','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="testimonial_export" value="yes" class="custom-control-input" id="testimonial-export" {{( roleHavePermission($role->id,'testimonial','export') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="testimonial">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Client</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_read" value="yes" class="custom-control-input" id="client-read" {{( roleHavePermission($role->id,'client','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_create" value="yes" class="custom-control-input" id="client-create" {{( roleHavePermission($role->id,'client','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_edit" value="yes" class="custom-control-input" id="client-edit" {{( roleHavePermission($role->id,'client','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_delete" value="yes" class="custom-control-input" id="client-delete" {{( roleHavePermission($role->id,'client','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_assigne" value="yes" class="custom-control-input" id="client-assigne" {{( roleHavePermission($role->id,'client','assigne') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-assigne"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_export" value="yes" class="custom-control-input" id="client-export" {{( roleHavePermission($role->id,'client','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="client_import" value="yes" class="custom-control-input" id="client-import" {{( roleHavePermission($role->id,'client','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="client-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="client">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Users</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_read" value="yes" class="custom-control-input" id="user-read" {{( roleHavePermission($role->id,'user','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_create" value="yes" class="custom-control-input" id="user-create" {{( roleHavePermission($role->id,'user','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_edit" value="yes" class="custom-control-input" id="user-edit" {{( roleHavePermission($role->id,'user','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="user-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="user_delete" value="yes" class="custom-control-input" id="user-delete" {{( roleHavePermission($role->id,'user','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="user_export" value="yes" class="custom-control-input" id="user-export" {{( roleHavePermission($role->id,'user','export') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="user">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Roles</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_read" value="yes" class="custom-control-input" id="role-read" {{( roleHavePermission($role->id,'role','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_create" value="yes" class="custom-control-input" id="role-create" {{( roleHavePermission($role->id,'role','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_edit" value="yes" class="custom-control-input" id="role-edit" {{( roleHavePermission($role->id,'role','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="role-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="role_delete" value="yes" class="custom-control-input" id="role-delete" {{( roleHavePermission($role->id,'role','delete') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="role">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>About Us</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="about_read" value="yes" class="custom-control-input" id="about-read" {{( roleHavePermission($role->id,'about','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="about_edit" value="yes" class="custom-control-input" id="about-edit" {{( roleHavePermission($role->id,'about','edit') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="about">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Contacts</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_read" value="yes" class="custom-control-input" id="contact-read" {{( roleHavePermission($role->id,'contact','read') == true)?  'checked' : '' }}>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="contact_delete" value="yes" class="custom-control-input" id="contact-delete" {{( roleHavePermission($role->id,'contact','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="contact-delete"></label>
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
                                    <input type="checkbox" name="contact_export" value="yes" class="custom-control-input" id="contact-export" {{( roleHavePermission($role->id,'contact','export') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="contact">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Subscriber</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscriber_read" value="yes" class="custom-control-input" id="subscriber-read" {{( roleHavePermission($role->id,'subscriber','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="subscriber_delete" value="yes" class="custom-control-input" id="subscriber-delete" {{( roleHavePermission($role->id,'subscriber','delete') == true)?  'checked' : '' }}>
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
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscriber_export" value="yes" class="custom-control-input" id="subscriber-export" {{( roleHavePermission($role->id,'subscriber','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="subscriber-export"></label>
                                </div>
                            </td>

                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="subscriber">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Appointment</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_read" value="yes" class="custom-control-input" id="appointment-read" {{( roleHavePermission($role->id,'appointment','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_create" value="yes" class="custom-control-input" id="appointment-create" {{( roleHavePermission($role->id,'appointment','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_edit" value="yes" class="custom-control-input" id="appointment-edit" {{( roleHavePermission($role->id,'appointment','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_delete" value="yes" class="custom-control-input" id="appointment-delete" {{( roleHavePermission($role->id,'appointment','delete') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-delete"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_assigne" value="yes" class="custom-control-input" id="appointment-assigne" {{( roleHavePermission($role->id,'appointment','assigne') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-assigne"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_export" value="yes" class="custom-control-input" id="appointment-export" {{( roleHavePermission($role->id,'appointment','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="appointment_import" value="yes" class="custom-control-input" id="appointment-import" {{( roleHavePermission($role->id,'appointment','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="appointment-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="appointment">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Blogs</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_read" value="yes" class="custom-control-input" id="blogs-read" {{( roleHavePermission($role->id,'blogs','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_create" value="yes" class="custom-control-input" id="blogs-create" {{( roleHavePermission($role->id,'blogs','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_edit" value="yes" class="custom-control-input" id="blogs-edit" {{( roleHavePermission($role->id,'blogs','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_delete" value="yes" class="custom-control-input" id="blogs-delete" {{( roleHavePermission($role->id,'blogs','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="blogs_export" value="yes" class="custom-control-input" id="blogs-export" {{( roleHavePermission($role->id,'blogs','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="blogs_import" value="yes" class="custom-control-input" id="blogs-import" {{( roleHavePermission($role->id,'blogs','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="blogs-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="blogs">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Banner</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_read" value="yes" class="custom-control-input" id="banner-read" {{( roleHavePermission($role->id,'banner','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_create" value="yes" class="custom-control-input" id="banner-create" {{( roleHavePermission($role->id,'banner','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_edit" value="yes" class="custom-control-input" id="banner-edit" {{( roleHavePermission($role->id,'banner','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_delete" value="yes" class="custom-control-input" id="banner-delete" {{( roleHavePermission($role->id,'banner','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="banner_export" value="yes" class="custom-control-input" id="banner-export" {{( roleHavePermission($role->id,'banner','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="banner_import" value="yes" class="custom-control-input" id="banner-import" {{( roleHavePermission($role->id,'banner','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="banner-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="banner">Mettre à jour</button>
                            </td>
                        </tr>


<tr>
                            <td>Studio</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_read" value="yes" class="custom-control-input" id="studio-read" {{( roleHavePermission($role->id,'studio','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_create" value="yes" class="custom-control-input" id="studio-create" {{( roleHavePermission($role->id,'studio','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_edit" value="yes" class="custom-control-input" id="studio-edit" {{( roleHavePermission($role->id,'studio','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_delete" value="yes" class="custom-control-input" id="studio-delete" {{( roleHavePermission($role->id,'studio','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="studio_export" value="yes" class="custom-control-input" id="studio-export" {{( roleHavePermission($role->id,'studio','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="studio_import" value="yes" class="custom-control-input" id="studio-import" {{( roleHavePermission($role->id,'studio','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="studio-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="studio">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Team</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_read" value="yes" class="custom-control-input" id="team-read" {{( roleHavePermission($role->id,'team','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-read"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_create" value="yes" class="custom-control-input" id="team-create" {{( roleHavePermission($role->id,'team','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_edit" value="yes" class="custom-control-input" id="team-edit" {{( roleHavePermission($role->id,'team','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_delete" value="yes" class="custom-control-input" id="team-delete" {{( roleHavePermission($role->id,'team','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="team_export" value="yes" class="custom-control-input" id="team-export" {{( roleHavePermission($role->id,'team','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="team_import" value="yes" class="custom-control-input" id="team-import" {{( roleHavePermission($role->id,'team','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="team-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="team">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Yoga Shop</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_read" value="yes" class="custom-control-input" id="shop-read" {{( roleHavePermission($role->id,'shop','read') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-read"></label>-
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_create" value="yes" class="custom-control-input" id="shop-create" {{( roleHavePermission($role->id,'shop','create') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-create"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_edit" value="yes" class="custom-control-input" id="shop-edit" {{( roleHavePermission($role->id,'shop','edit') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-edit"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_delete" value="yes" class="custom-control-input" id="shop-delete" {{( roleHavePermission($role->id,'shop','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="shop_export" value="yes" class="custom-control-input" id="shop-export" {{( roleHavePermission($role->id,'shop','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="shop_import" value="yes" class="custom-control-input" id="shop-import" {{( roleHavePermission($role->id,'shop','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="shop-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="shop">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Message</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="message_read" value="yes" class="custom-control-input" id="message-read" {{( roleHavePermission($role->id,'message','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="message_delete" value="yes" class="custom-control-input" id="message-delete" {{( roleHavePermission($role->id,'message','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="message_export" value="yes" class="custom-control-input" id="message-export" {{( roleHavePermission($role->id,'message','export') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="message-export"></label>
                                </div>
                            </td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="message_import" value="yes" class="custom-control-input" id="message-import" {{( roleHavePermission($role->id,'message','import') == true)?  'checked' : '' }}>
                                    <label class="custom-control-label" for="message-import"></label>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="message">Mettre à jour</button>
                            </td>
                        </tr>

                        {{-- <tr>
                            <td>Subscribe</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscribe_read" value="yes" class="custom-control-input" id="subscribe-read" {{( roleHavePermission($role->id,'subscribe','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="subscribe_delete" value="yes" class="custom-control-input" id="subscribe-delete" {{( roleHavePermission($role->id,'subscribe','delete') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="subscribe_export" value="yes" class="custom-control-input" id="subscribe-export" {{( roleHavePermission($role->id,'subscribe','export') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="subscribe">Mettre à jour</button>
                            </td>
                        </tr> --}}

                        <tr>
                            <td>Stripe Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="stripe_read" value="yes" class="custom-control-input" id="stripe-read" {{( roleHavePermission($role->id,'stripe','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="stripe_edit" value="yes" class="custom-control-input" id="stripe-edit" {{( roleHavePermission($role->id,'stripe','edit') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="stripe">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Seo Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="seo_read" value="yes" class="custom-control-input" id="seo-read" {{( roleHavePermission($role->id,'seo','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="seo_edit" value="yes" class="custom-control-input" id="seo-edit" {{( roleHavePermission($role->id,'seo','edit') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="seo">Mettre à jour</button>
                            </td>
                        </tr>

                        <tr>
                            <td>General Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="general_setting_read" value="yes" class="custom-control-input" id="general_setting-read" {{( roleHavePermission($role->id,'general_setting','read') == true)?  'checked' : '' }}>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="general_setting">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Color Settings</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="color_setting_read" value="yes" class="custom-control-input" id="color_setting-read" {{( roleHavePermission($role->id,'color_setting','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="color_setting_edit" value="yes" class="custom-control-input" id="color_setting-edit" {{( roleHavePermission($role->id,'color_setting','edit') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="color_setting">Mettre à jour</button>
                            </td>
                        </tr>


                        <tr>
                            <td>Social URL</td>

                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="social_url_read" value="yes" class="custom-control-input" id="social_url-read" {{( roleHavePermission($role->id,'social_url','read') == true)?  'checked' : '' }}>
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
                                    <input type="checkbox" name="social_url_edit" value="yes" class="custom-control-input" id="social_url-edit" {{( roleHavePermission($role->id,'social_url','edit') == true)?  'checked' : '' }}>
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
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light perm_action_btn" data-role-id="{{ $role->id }}" data-module-name="social_url">Mettre à jour</button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection


@section('js')

<script>
    $(document).ready(function () {
        $('.perm_action_btn').click(function(e){
            e.preventDefault();
            var role_id = $(this).attr('data-role-id');
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
                url : "{{ route('role.permission') }}",
                type : 'POST',
                data : {
                    role_id     : role_id,
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
