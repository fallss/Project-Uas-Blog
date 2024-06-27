<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login Histories</h1>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Login Time</th>
                <th>IP Address</th>
                <th>User Agent</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loginHistories as $history)
                <tr>
                    <td>{{ $history->user->name }}</td>
                    <td>{{ $history->login_time }}</td>
                    <td>{{ $history->ip_address }}</td>
                    <td>{{ $history->user_agent }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $loginHistories->links() }}
</div>
@endsection
?>