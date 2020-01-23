@extends('admin.layouts.master') 
@section('title','Donate')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All Donate
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Card_Number</th>
                                <th>Ex_date</th>
                                <th>Cvv</th>
                                <th>Zip</th>
                                <th>Taka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donate as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->card_number }}</td>
                                <td>{{ $item->ex_date }}</td>
                                <td>{{ $item->cvv }}</td>
                                <td>{{ $item->zip }}</td>
                                <td>{{ $item->taka }}$</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection