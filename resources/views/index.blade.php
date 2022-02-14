@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="h3 m-0">{{$selectedYear}} Holidays</h3><br>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <select title="year" class="form-select" onchange="window.location.href='/holidays/'+this.value">
                                    @foreach($availableYears as $year)
                                        <option @if($year == $selectedYear) selected @endif>{{$year}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="button">PDF Download</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($holidays as $holiday)
                                    <li class="list-group-item">
                                        {{$holiday->date}}
                                        {{$holiday->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
@stop
