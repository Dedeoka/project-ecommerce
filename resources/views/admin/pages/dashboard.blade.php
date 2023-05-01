@extends('layouts.admin.layout')
@section('title')
<h2>Dashboard</h2>
@endsection
@section('content')
    <div class="dashboard-container">
        <div class="chart-container">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">Sales Report</p>
                  <a href="#" class="text-info">View all</a>
                 </div>
                  <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="sales-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="side-menu-container">
            <ul>
                <li>
                    <img src="{{ asset('img/pembayaran-sukses.png') }}" alt="">
                    <p>Pembayaran Sukses</p>
                </li>
                <li>
                    <img src="{{ asset('img/pesanan-dikirim.png') }}" alt="">
                    <p>Pesanan Dikirim</p>
                </li>
                <li>
                    <img src="{{ asset('img/pesanan-diterima.png') }}" alt="">
                    <p>Pesanan Diterima</p>
                </li>
                <li>
                    <img src="{{ asset('img/pesanan-gagal.png') }}" alt="">
                    <p>Pesanan Gagal</p>
                </li>
            </ul>
        </div>
    </div>
@endsection
