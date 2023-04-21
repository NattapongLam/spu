<div class="mt-4"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-5">
                    <h3 class="card-title">รายการแจ้งซ่อม</h3>
                  </div>
                  <div class="col-7">
                    <div class="card-tools">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right" placeholder="Search" wire:model="searchTerm"/>&nbsp;
                        <div class="input-group-append">
                          <a href="{{route('repair.create')}}"class="btn btn-primary">
                          <i class="fas fa-plus"></i>&nbsp;เพิ่มข้อมูล
                          </a>
                        </div>
                      </div>
                  </div>
                  </div>
                </div>             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class="text-center">สถานะ</th>
                      <th>วันที่</th>
                      <th>เลขที่เอกสาร</th>
                      <th>ไซต์งาน</th>
                      <th>วัสดุอุปกรณ์</th>
                      <th>หมายเหตุ</th>
                      <th style="width: 100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rep as $item)
                    <tr>
                        <td>{{$item->id}}</td>
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
                        <td>
                          @if ($item->sta_name == "รอซ่อม")
                            <a href="{{route('repair.update',$item->id)}}" 
                              class="btn btn-sm btn-warning" >
                              <i class="fas fa-edit"></i>
                            </a>  
                            @role('admin|repairman') 
                            <a href="{{route('repair.approval',$item->id)}}" 
                              class="btn btn-sm btn-info" >
                              <i class="fas fa-hands-helping"></i>
                            </a>
                            @endrole                 
                          @endif
                        </td>
                    </tr>
                    @endforeach                  
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{$rep->links()}}
              </div>
            </div>
        </div>
    </div>
</div>
