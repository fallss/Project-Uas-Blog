@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"></div>{{ __('Scan website') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('scan.web.virus') }}">
                        @csrf
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required>
                        </div>
                         <button type="submit" class="btn btn-primary">Scan</button>
                    </form>
                </div>
        </div>
    </div>
</div>
</div>





