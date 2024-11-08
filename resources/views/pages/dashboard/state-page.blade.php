@extends('layouts.sidenav-layout')
@section('content')
    
    @include('components.dashboard.state.state-list')
    @include('components.dashboard.state.state-create')
    @include('components.dashboard.state.state-update')
    @include('components.dashboard.state.state-delete')
@endsection
