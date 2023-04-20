<div class="mt-4"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">รายการยืมวัสดุอุปกรณ์</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 400px;">
                      <input type="text" class="form-control float-right" placeholder="Search" wire:model="searchTerm"/>&nbsp;
                      <div class="input-group-append">
                        <a href="{{route('borrow.create')}}"class="btn btn-primary">
                        <i class="fas fa-plus"></i>&nbsp;เพิ่มข้อมูล
                        </a>
                      </div>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class="text-center">สถานะ</th>
                      <th>วันที่</th>
                      <th>เลขที่เอกสาร</th>
                      <th>ไซต์ที่ยืม</th>
                      <th>หมายเหตุ</th>
                      <th style="width: 100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($borr as $item)
                    <tr>
                        <td>{{$item->id}}</td>
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
                        <td>{{\Carbon\Carbon::parse($item->borr_hd_date)->format('d/m/Y')}}</td>
                        <td>{{$item->borr_hd_docuno}}</td>
                        <td>{{$item->job_name}}</td>
                        <td>{{$item->borr_hd_desc}}</td>
                        <td>
                          @if ($item->borr_hd_status == "ขอยืม")
                            <a href="{{route('borrow.update',$item->id)}}" 
                              class="btn btn-sm btn-warning" >
                              <i class="fas fa-edit"></i>
                            </a>  
                            @role('admin') 
                            <a href="{{route('borrow.approval',$item->id)}}" 
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
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{$borr->links()}}
              </div>
            </div>
        </div>
    </div>
</div>
