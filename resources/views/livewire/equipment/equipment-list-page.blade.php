<div class="mt-4"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-5">
                    <h3 class="card-title">รายการวัสดุอุปกรณ์</h3>
                  </div>
                  <div class="col-7">
                    <div class="card-tools">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right" placeholder="Search" wire:model="searchTerm"/>&nbsp;
                        <div class="input-group-append">
                          <a href="{{route('equipment.create')}}"class="btn btn-primary">
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
                      <th style="text-align: center">รูป</th>                    
                      <th style="text-align: center">รหัสวัสดุอุปกรณ์</th>
                      <th style="text-align: center">ชื่อวัสดุอุปกรณ์</th>
                      <th style="text-align: center">สถานะ</th>
                      <th style="text-align: center">ไชต์ที่จัดเก็บ</th>
                      <th style="text-align: center">ใช้งาน - ยกเลิก</th>
                      <th style="width: 40px;">แก้ไข</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($equ as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td class="text-center">
                          @if($item->equ_picture)
                          <img src="{{asset('/images/equipments/'.$item->equ_picture)}}" class="profile-user-img img-fluid img-circle">
                          @endif
                        </td>                       
                        <td>{{$item->equ_code}}</td>
                        <td>{{$item->equ_name}} ({{$item->EquipmentGroup->grou_name}})</td>
                        <td class="text-center">
                          @if($item->doc_status == "พร้อมยืม")
                          <span class="badge badge-primary">{{$item->doc_status}}</span>
                          @elseif($item->doc_status == "ขอยืม")
                          <span class="badge badge-info">{{$item->doc_status}}</span>
                          @elseif($item->doc_status == "ถูกยืม")
                          <span class="badge badge-secondary">{{$item->doc_status}}</span>
                          @elseif($item->doc_status == "กำลังส่งคืน")
                          <span class="badge badge-light">{{$item->doc_status}}</span>
                          @elseif($item->doc_status == "รอส่งซ่อม")
                          <span class="badge badge-warning">{{$item->doc_status}}</span>
                          @elseif($item->doc_status == "ส่งซ่อม")
                          <span class="badge badge-dark">{{$item->doc_status}}</span>
                          @endif
                        </td>
                        <td class="text-center">{{$item->job_name}}</td>
                        <td class="text-center">
                          @if ($item->equ_status)
                              <span class="badge badge-success">ใช้งาน</span>
                          @else  
                              <span class="badge badge-danger">ยกเลิก</span>
                          @endif
                      </td>
                        <td>
                            <a href="{{route('equipment.update',$item->id)}}" 
                              class="btn btn-sm btn-warning" >
                              <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach                  
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{$equ->links()}}
              </div>
            </div>
        </div>
    </div>
</div>
