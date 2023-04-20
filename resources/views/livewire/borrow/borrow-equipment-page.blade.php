<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลวัสดุอุปกรณ์</h4>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" class="form-control float-right" style="width: 400px;" placeholder="Search" wire:model="searchTerm"/>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">           
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>รหัสวัสดุอุปกรณ์</th>
                            <th>ชื่อวัสดุอุปกรณ์</th>
                            <th>จำนวน</th>
                            <th>เลือก</th>
                        </tr>         
                    </thead>
                    <tbody>
                        @foreach ($equs as $key => $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->equ_code}}</td>
                          <td>{{$item->equ_name}} ({{$item->equ_unit}})</td>
                          <td>{{$item->equ_qty}}</td>
                          <td>
                            <button 
                              type="button" 
                              class="btn btn-info"
                              wire:click.prevent="$emit('selectedEqu',{{$item->id}})">
                              <i class="fas fa-check"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
          </div>
        </div>
      </div>
    </div>