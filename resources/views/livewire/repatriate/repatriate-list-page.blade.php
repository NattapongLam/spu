<div class="mt-4"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h3 class="card-title">รายการยืมวัสดุอุปกรณ์รอส่งคืน</h3>
                  </div>
                  <div class="col-6">
                    <div class="card-tools">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right" placeholder="Search" wire:model="searchTerm"/>&nbsp;
                      </div>
                      @livewire('repatriate.repatriate-form-page')
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
                      <th>ไซต์ที่ยืม</th>                   
                      <th>ผู้อนุมัติยืม</th>
                      <th>หมายเหตุ</th>
                      <th style="width: 80px">ส่งคืน</th>
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
                        <td>{{$item->app_name}}</td>
                        <td>{{$item->app_reamrk}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal" wire:click="$emit('editRepatriate',{{$item->id}})">
                                <i class="fas fa-paper-plane"></i>
                            </button>          
                        </td>
                    </tr>
                    @endforeach                  
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{$borr->links()}}
              </div>
            </div>
        </div>
    </div>
</div>
