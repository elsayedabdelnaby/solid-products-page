@extends('layouts.app')

@section('title', 'Products')

@section('content')
    @include('products::products.index-content')
@endsection

@push('footer-scripts')
    @include('products::products.index-scripts')
@endpush
