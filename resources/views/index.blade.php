@extends('layout.app')

@section('content')
    <div class="row justify-content-center m-0">
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
                                <button class="btn btn-outline-secondary" type="button" onclick="pdfDownload()">PDF Download</button>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="holidayList">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($holidays as $holiday)
                                    <li class="list-group-item">
                                        {{$holiday->date}}
                                        <span class="ps-5">{{$holiday->name}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <script>
        // Default export is a4 paper, portrait, using millimeters for units
        function pdfDownload() {
            var doc = new jsPDF();
            doc.addHTML($('#holidayList')[0], 15, 15, {
                'background': '#fff',
            }, function() {
                doc.save('holidays_{{$selectedYear}}.pdf');
            });
        }
    </script>
@stop
