@extends('layout.master')
@section('main')
    <div class="container">
        <div class="row" style="margin:30px;">
            <div class="col-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseActivity" aria-expanded="false" aria-controls="collapseActivity">
                    Add Activity
                </button>
                <div class="collapse" id="collapseActivity" style="margin-top: 10px;">
                    <div class="card card-body">
                        <form action="{{route('addActivity')}}" method="POST">
                            @csrf
                            <input type="number" name="userid" value="{{session()->get('id')}}" hidden>
                            <div class="row">
                                @if (session()->has('activityError'))
                                    <p class="text-danger">{{ session()->get('activityError') }}</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="activity_date">Activity Date</label>
                                </div>
                                <div class="col-8">
                                    <input type="date" name="activity_date" id="activity_date" placeholder="Activity Date" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('activity_date') as $error)
                                            {{$error}}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="time_spent">Time Spent</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" name="time_spent" id="time_spent" placeholder="Time Spent" required>
                                    <small class="text-danger">
                                        @foreach ($errors->get('time_spent') as $error)
                                            {{$error}}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-8">
                                    <textarea name="description" id="description" rows="10" required></textarea>
                                    <small class="text-danger">
                                        @foreach ($errors->get('description') as $error)
                                            {{$error}}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="12">
                                    <button type="submit" class="btn btn-primary">Submit Activity</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3 offset-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMail" aria-expanded="false" aria-controls="collapseMail">Send Report</button>
                <div class="collapse" id="collapseMail" style="margin-top: 10px;">
                    <div class="card card-body">
                        <form action="{{route('sendEmail')}}" method="post">
                            @csrf
                            <input type="number" name="userid" value="{{session()->get('id')}}" hidden>
                            <input type="email" name="email" id="email" placeholder="Enter Report recipient" required>
                            <small class="text-danger">
                                @foreach ($errors->get('email') as $error)
                                    {{$error}}
                                @endforeach
                            </small>
                            <button class="btn btn-primary" type="submit">Send Report</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3 offset-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInterval" aria-expanded="false" aria-controls="collapseInterval">Show Activities in Apropriate Time Interval</button>
                <div class="collapse" id="collapseInterval" style="margin-top: 10px;">
                    <div class="card card-body">
                        <form action="{{route('selectInterval')}}" method="post">
                            @csrf
                            <input type="number" name="userid" value="{{session()->get('id')}}" hidden>
                            <input type="date" name="start_date" id="start_date" placeholder="Enter Starting Date" required>
                            <input type="date" name="end_date" id="end_date" placeholder="Enter Ending Date" required>
                            <button class="btn btn-primary" type="submit">Send Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">All Activities</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Activity Date</th>
                    <th scope="col">Hours Spent</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td></td>
                        <td>{{$activity->activity_date}}</td>
                        <td>{{$activity->time_spent}}</td>
                        <td>{{$activity->description}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection