<div class="mt-4"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-5">
                    <h3 class="card-title">รายการไซต์งาน</h3>
                  </div>
                  <div class="col-7">
                    <div class="card-tools">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right" placeholder="Search" wire:model="searchTerm"/>&nbsp;
                        <div class="input-group-append">
                          @livewire('job-site.job-site-form-page')
                          <button type="button" 
                          class="btn btn-primary" 
                          data-toggle="modal" 
                          data-target="#modal" 
                          wire:click="$emit('btnCreateJobSite')">
                          <i class="fas fa-plus"></i>&nbsp;เพิ่มข้อมูล
                          </button>
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
                      <th style="text-align: center">สถานะ</th>
                      <th style="text-align: center">รหัสไซต์งาน</th>
                      <th style="text-align: center">ชื่อไซต์งาน</th>
                      <th style="width: 40px">แก้ไข</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($job as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td class="text-center">
                            @if ($item->job_status)
                                <span class="badge badge-success">ใช้งาน</span>
                            @else  
                                <span class="badge badge-danger">ยกเลิก</span>
                            @endif
                        </td>
                        <td>{{$item->job_code}}</td>
                        <td>{{$item->job_name}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal" wire:click="$emit('editJobSite',{{$item->id}})">
                            <i class="fas fa-edit"></i>
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
               {{$job->links()}}
              </div>
            </div>
        </div>
    </div>
</div>