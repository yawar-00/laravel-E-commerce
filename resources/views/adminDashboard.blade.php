@extends('layouts.master')
@section('content')
<div class="container mt-5">
  <div class="row g-4">

    <!-- Users Card -->
    <div class="col-md-3">
      <div class="card text-white bg-primary h-100 shadow">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title">Total Users</h5>
            <h2>1,250</h2>
          </div>
          <i class="fas fa-users fa-2x"></i>
        </div>
      </div>
    </div>

    <!-- Orders Card -->
    <div class="col-md-3">
      <div class="card text-white bg-success h-100 shadow">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title">Orders</h5>
            <h2>865</h2>
          </div>
          <i class="fas fa-shopping-cart fa-2x"></i>
        </div>
      </div>
    </div>

    <!-- Revenue Card -->
    <div class="col-md-3">
      <div class="card text-white bg-warning h-100 shadow">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title">Revenue</h5>
            <h2>$24,320</h2>
          </div>
          <i class="fas fa-dollar-sign fa-2x"></i>
        </div>
      </div>
    </div>

    <!-- Products Card -->
    <div class="col-md-3">
      <div class="card text-white bg-danger h-100 shadow">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title">Products</h5>
            <h2>324</h2>
          </div>
          <i class="fas fa-boxes fa-2x"></i>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection