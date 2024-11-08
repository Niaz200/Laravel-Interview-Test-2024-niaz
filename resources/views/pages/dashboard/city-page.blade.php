@extends('layouts.sidenav-layout')
@section('content')
    @include('components.dashboard.city.city-create')
    @include('components.dashboard.city.city-list')
    @include('components.dashboard.city.city-update')
    @include('components.dashboard.city.city-delete')
@endsection
