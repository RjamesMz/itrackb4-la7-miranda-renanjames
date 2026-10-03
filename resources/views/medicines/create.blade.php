
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
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @error('name')
        <div class="invalid-feedback d-block" >{{$message}}</div>
        @enderror
        </div>
        

        <div class="mb-3">
            <label class="form-label" for="stock">Stock</label>
            <select name="stock" class="form-select">
                <option value="">Stock</option>
                <option value="Full" @selected(old('stock') == 'Full')>Full Stock</option>
                <option value="Lowstock"  @selected(old('stock') == 'Lowstock')>Low Stock</option>
            </select>
            @error('stock')
        <div class="invalid-feedback d-block" >{{$message}}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="expiry_date">Expiry Date</label>
              <input type="date" name="expiry_date" value="{{old('expiry_date')}}">
              @error('expiry_date')
        <div class="invalid-feedback d-block" >{{$message}}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="type">Type</label>
            <select name="type" class="form-select">
                <option value="">Type of Medicine</option>
                <option value="Syrup" @selected(old('type') == 'Syrup')>Liquid</option>
                <option value="Tablet" @selected(old('type') == 'Tablet')>Tablet</option>
                <option value="Capsule" @selected(old('type') == 'Capsule')>Capsule</option>
            </select>
            @error('type')
        <div class="invalid-feedback d-block" >{{$message}}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="available">Available</label>
            <select name="available" class="form-select">
                <option value="">Medicine Status</option>
                <option value="true" @selected(old('available') == 'true')>Yes</option>
                <option value="false"  @selected(old('available') == 'false')>No</option>
            </select>
         @error('available')
        <div class="invalid-feedback d-block" >{{$message}}</div>
        @enderror
        </div>


       <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-secondary" href="{{ route('medicines.index') }}">Cancel</a>
     </form>

    </div>
</div>

@endsection
