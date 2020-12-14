@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">LogEntrada {{ $logentrada->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/log-entrada') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/log-entrada/' . $logentrada->id . '/edit') }}" title="Edit LogEntrada"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('logentrada' . '/' . $logentrada->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete LogEntrada" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $logentrada->id }}</td>
                                    </tr>
                                    <tr><th> Cliente Id </th><td> {{ $logentrada->cliente_id }} </td></tr><tr><th> Evento Id </th><td> {{ $logentrada->evento_id }} </td></tr><tr><th> HoraEntrada </th><td> {{ $logentrada->horaEntrada }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
