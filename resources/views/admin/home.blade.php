@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Добро пожаловать')

@section('adminPageContent')

<p>
Добро пожаловать,
@if(Session::has('login')) 
  {{ Session::get('login') }}
@endif
</p>
@endsection

@section('adminPageScripts')

@endsection