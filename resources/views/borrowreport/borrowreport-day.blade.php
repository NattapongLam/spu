@extends('layouts.main')
@section('content')
<div class="mt-4"><br>
<div class="row">
    <div class="col-12">
        <form method="GET" class="form-horizontal">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-5">
                <h3 class="card-title">รายงานยืม-คืน</h3>
              </div>
              <div class="col-7">
                <div class="card-tools">
                  <div class="input-group input-group-sm"> 
                    <div class="col-12 col-md-4">
                        <input type="date" 
                        name="datestart" 
                        id="datestart" 
                        class="form-control"
                        value="{{$datestart}}">            
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="date" 
                        name="dateend" 
                        id="dateend" 
                        class="form-control"
                        value="{{$dateend}}">
                    </div> 
                    <div class="col-12 col-md-4">         
                    <div class="input-group-append">  
                        <button class="btn btn-info w-lg">
                            <i class="fas fa-search"></i> ค้นหา
                        </button>                   
                    </div>
                    </div>
                  </div>
              </div>
              </div>
            </div>             
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th class="text-center">สถานะ</th>
                          <th>วันที่ยืม</th>
                          <th>วัสดุอุปกรณ์</th>
                          <th>ผู้ขอยืม</th>
                          <th>ผู้อนุมัติยืม</th>
                          <th>ผู้รับคืน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">
                                    @if ($item->borr_hd_status == "ขอยืม")
                                        <span class="badge badge-warning">{{$item->borr_hd_status}}</span>
                                    @elseif($item->borr_hd_status == "ยกเลิก")
                                        <span class="badge badge-danger">{{$item->borr_hd_status}}</span>
                                    @elseif($item->borr_hd_status == "อนุมัติยืม")
                                        <span class="badge badge-info">{{$item->borr_hd_status}}</span>
                                    @elseif($item->borr_hd_status == "ส่งคืน")
                                        <span class="badge badge-primary">{{$item->borr_hd_status}}</span>
                                    @elseif($item->borr_hd_status == "อนุมัติคืน")
                                        <span class="badge badge-success">{{$item->borr_hd_status}}</span>
                                    @endif
                                </td> 
                                <td>
                                    {{$item->borr_hd_date}}
                                </td>
                                <td>
                                    {{$item->equ_name}} ({{$item->equ_qty}})
                                </td>
                                <td>
                                    {{$item->emp_name}}
                                </td>
                                <td>
                                    {{$item->app_name}}
                                </td>
                                <td>
                                    {{$item->return_name}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection