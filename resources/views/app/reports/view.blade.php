@extends('layouts.app')
@section('pagename', __('Report: :report_number', ['report_number' => $report_number]))

@section('content')
    Report: {{ $report_number }}
@endsection
