@extends('layouts.mainAdmin')

@section('content')
    @include('panel.dashboard._widget')
    @include('panel.dashboard._directAccess')

    @include('alerts._errors')

    @include('panel.dashboard._addCustomerPatient')
    @include('panel.dashboard._clients')
    @include('panel.dashboard._events')
@endsection