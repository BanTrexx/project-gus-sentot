@extends('adminlte::page')

@section('title', 'Admin | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid pt-4 pb-3">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4">
                <a class="text-reset" href="{{ route('home.show', 3517110) }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Penduduk Jogoroto</span>
                            <span class="info-box-number">
                                {{ $jogorotoCount }}
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <a class="text-reset" href="{{ route('home.show', 3517040) }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-fuchsia elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Penduduk Diwek</span>
                            <span class="info-box-number">
                                {{ $diwekCount }}
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <a class="text-reset" href="{{ route('home.show', 3517100) }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Penduduk Sumobito</span>
                            <span class="info-box-number">
                                {{ $sumobitoCount }}
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

{{--        <div class="card">--}}
{{--            <div class="card-header border-0">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <h3 class="card-title">Kecamatan Jogoroto</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div style="height: 30rem;">--}}
{{--                    <livewire:livewire-column-chart--}}
{{--                        key="{{ $jogorotoChart->reactiveKey() }}"--}}
{{--                        :column-chart-model="$jogorotoChart"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card">--}}
{{--            <div class="card-header border-0">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <h3 class="card-title">Kecamatan Diwek</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div style="height: 30rem;">--}}
{{--                    <livewire:livewire-column-chart--}}
{{--                        key="{{ $diwekChart->reactiveKey() }}"--}}
{{--                        :column-chart-model="$diwekChart"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card">--}}
{{--            <div class="card-header border-0">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <h3 class="card-title">Kecamatan Sumobito</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div style="height: 30rem;">--}}
{{--                    <livewire:livewire-column-chart--}}
{{--                        key="{{ $sumobitoChart->reactiveKey() }}"--}}
{{--                        :column-chart-model="$sumobitoChart"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <livewire:scripts />
    @livewireChartsScripts
@stop
