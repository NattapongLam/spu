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
                <h3 class="card-title">รายงานแจ้งซ่อม</h3>
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
                            <th>วันที่</th>
                            <th>เลขที่เอกสาร</th>
                            <th>ไซต์งาน</th>
                            <th>วัสดุอุปกรณ์</th>
                            <th>หมายเหตุ</th>
                            <th>ผู้แจ้งซ่อม</th>
                            <th>ผลการซ่อม</th>
                            <th>ผู้ซ่อม</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">
                                    @if ($item->sta_name == "รอซ่อม")
                                        <span class="badge badge-warning">{{$item->sta_name}}</span>
                                    @elseif($item->sta_name == "ยกเลิก")
                                        <span class="badge badge-danger">{{$item->sta_name}}</span>                              
                                    @elseif($item->sta_name == "ซ่อมเสร็จแล้ว")
                                        <span class="badge badge-success">{{$item->sta_name}}</span>
                                    @endif
                            </td>
                            <td>{{\Carbon\Carbon::parse($item->rep_date)->format('d/m/Y')}}</td>
                            <td>{{$item->rep_docuno}}</td>
                            <td>{{$item->job_name}}</td>
                            <td>{{$item->equ_name}}</td>
                            <td>{{$item->rep_desc}}</td>
                            <td>{{$item->emp_name}}</td>
                            <td>{{$item->app_name}}</td>
                            <td>{{$item->app_reamrk}}</td>
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