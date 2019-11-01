@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="offset-md-2 col-md-8">

            <div class="card">
                <div class="card-header"><CENTER><STRONG>MPESA TRANSACTIONS</STRONG></CENTER>
                </div>

                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PHONE NUMBER</th>


                                    <th>AMOUNT</th>

                                    <th>REFERENCE</th>
                                </tr>
                            </thead>
                             <tbody>
                        @foreach ($trans as $tran)
                                   <tr>
                                    <th>{{ $tran->id }}</th>
                                    <th>{{ $tran->phone }}</th>                                
                                    <th>{{ $tran->amount }}</th>
                                    <th>{{ $tran->reference }}</th>
                                    <td>
                                   </tr>
                        @endforeach
                            </tbody>
                        </table>
                                        {!! $trans->links(); !!}

                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
