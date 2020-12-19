@extends('layout.master')
@section('main')
   <div class="container">
       <h1 class="text-center text-primary">Log In</h1>
       <div class="row">
           <div class="col-6 offset-3">
               <div class="card" style="background-color: #0d6efd66;">
                    <div class="card-body">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 text-center">
                                    @if (session()->has('message'))
                                        <p class="text-danger">{{ session()->get('message') }}</p>
                                    @endif
                                    @if (isset($error))
                                        <p class="text-danger">{{ $error }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="username" id="username" placeholder="Username" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('username') as $error)
                                            {{$error}}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-6">
                                    <input type="password" name="password" id="password" placeholder="Password" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('password') as $error)
                                            {{$error}}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-4">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-4 offset-4">
                                <a class="btn btn-success" href="{{route('register')}}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
   </div>
@endsection