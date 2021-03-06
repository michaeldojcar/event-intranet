@extends('layouts.fullscreen')


@section('title', ucfirst($group->name) . ' - ' . $main_event->name)


@push('css')
    <link rel="stylesheet"
          type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fh-3.1.4/r-2.2.2/datatables.min.css"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/magicsuggest/2.1.4/magicsuggest-min.css"/>
@endpush

@section('navbar_top')
    @include('tabor_web.layout.navbar_top')
@endsection

@section('sidebar')
    @include('tabor_web.layout.sidebar')
@endsection

@push('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/magicsuggest/2.1.4/magicsuggest-min.js"></script>--}}
@endpush
