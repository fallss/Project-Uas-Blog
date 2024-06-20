<!DOCTYPE html
>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG</title>
        <style>
            body{
            background-image: url('images/Blog2.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
            .container{
                margin: 0 auto;
                max-width: 800px;
                padding: 20px;
            }
            h1 {
                text-align: center;
            }
            .btn {
                display: inline-blog;
                padding: 10px 20px;
                color: #fff;
                background-color: #007bff;
                border: none,
                border-radius: 5px;
                text-decoration: none;
                margin-top: 20px;
                text-align: center;
            }
            .btn-container{
                text-align: center;
                margin-top: 20px;
            }
        </style>
    </head>
<body>
    <div class="container">
        <h1>Welcome to DJONG ARC</h1>
        <h1>PLEASE REGISTER OR LOGIN FIRST</h1>
        <a href="/register" class="register-button">Register</a>
        <h2></h2>
        <a href="/login" class="login-button">Login</a>
=======
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
