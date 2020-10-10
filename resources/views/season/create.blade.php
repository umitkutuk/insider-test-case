@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create League</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('seasons.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="starts_at" class="col-md-4 col-form-label text-md-right">Starts At</label>

                            <div class="col-md-6">
                                <input type="text" name="starts_at" value="" class="form-control @error('starts_at') is-invalid @enderror"  required autofocus>

                                @error('starts_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ends_at" class="col-md-4 col-form-label text-md-right">Ends At</label>

                            <div class="col-md-6">
                                <input id="ends_at" type="text" class="form-control @error('ends_at') is-invalid @enderror" name="ends_at" value="{{ old('ends_at') }}" required autocomplete="ends_at" autofocus>

                                @error('ends_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="season" class="col-md-4 col-form-label text-md-right">Season</label>

                            <div class="col-md-6">
                                <input id="season" type="text" class="form-control @error('season') is-invalid @enderror" name="season" value="{{ old('season') }}" required autocomplete="season" autofocus>

                                @error('season')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="league_id" class="col-md-4 col-form-label text-md-right">League</label>

                            <div class="col-md-6">
                                <input id="league_id" type="text" class="form-control @error('league_id') is-invalid @enderror" name="league_id" value="{{ old('league_id') }}" required autocomplete="league_id" autofocus>

                                @error('league_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
