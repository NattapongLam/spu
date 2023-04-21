<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">บริษัท สหรุ่งเรืองก่อสร้าง(1993) จำกัด</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="save">
                <center>
                  <h3>กดบันทึกเพื่อส่งคืนวัสดุอุปกรณ์</h3>
                </center>                
                {{-- <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ชื่อวัสดุอุปกรณ์</th>
                                <th>จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if($equs)
                            @foreach ($equs as $item)
                            <tr>
                              <td>{{$item['equ_name']}}</td>
                              <td>{{$item['equ_qty']}}</td>
                            </tr>                            
                            @endforeach
                          @endif                           
                        </tbody>
                    </table>               
                </div>                --}}
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-primary" wire:click="save">บันทึก</button>
            </div>
          </div>
        </div>
      </div>
    </div>
