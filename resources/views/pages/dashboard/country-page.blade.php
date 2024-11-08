@extends('layouts.sidenav-layout')
@section('content')
    @include('components.dashboard.country.country-list')
    @include('components.dashboard.country.country-create')
    @include('components.dashboard.country.country-update')
    @include('components.dashboard.country.country-delete')
@endsection
