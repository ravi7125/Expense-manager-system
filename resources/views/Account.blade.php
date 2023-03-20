@extends('layouts.app')

@section('content')

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Bank Detail</h3>

                    <form action="" method='POST'>
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label" for="typebankname">Bank name</label>
                            <input type="text" id="use_id" class="form-control form-control-lg @error('bankname') is-invalid @enderror" name="bankname" value="{{ old('bankname') }}" required />
                            @error('bankname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="typeacnumber">Account number</label>
                            <input type="text" id="" class="form-control form-control-lg @error('accountnumber') is-invalid @enderror" name="accountnumber" value="{{ old('accountnumber') }}" required/>
                            @error('accountnumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="typeacnumber">Balance</label>
                            <input type="text" id="" class="form-control form-control-lg @error('balance') is-invalid @enderror" name="balance" value="{{ old('balance') }}" required/>
                            @error('balance')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="typeTransfer">Transfer</label>
                            <input type="text" id="use_id" class="form-control form-control-lg @error('transfer') is-invalid @enderror" name="transfer" value="{{ old('transfer') }}" required/>
                            @error('transfer')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="typededuct">Total Deduct</label>
                            <input type="text" id="use_id" class="form-control form-control-lg @error('deduct') is-invalid @enderror" name="deduct" value="{{ old('deduct') }}" required />
                            @error('deduct')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
