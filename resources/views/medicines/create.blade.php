
@extends('layouts.app')

@section('title', 'All Medicines')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Add a new Medicine</h3>
        <form method="POST" action="{{ route('medicines.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="name">Medicine Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="stock">Stock</label>
            <select name="stock" class="form-select">
                <option value="">Stock</option>
                <option value="Full">Full Stock</option>
                <option value="LowStock">Low Stock</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="expiry_date">Expiry Date</label>
              <input type="date" name="expiry_date">
        </div>

        <div class="mb-3">
            <label class="form-label" for="type">Type</label>
            <select name="type" class="form-select">
                <option value="">Type of Medicine</option>
                <option value="Liquid">Liquid</option>
                <option value="Tablet">Tablet</option>
                <option value="Capsule">Capsule</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="available">Status</label>
            <select name="vailable" class="form-select">
                <option value="">Medicine Status</option>
                <option value="true">Available</option>
                <option value="false">Not Available</option>
            </select>
        </div>


       <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-secondary" href="{{ route('medicines.index') }}">Cancel</a>
     </form>

    </div>
</div>

@endsection
