@extends('layout.master')
@section('main')

<div class="container">
    <h4>From {{$from}} to {{$to}} you spent {{$sum}} hours on activities!</h4>
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