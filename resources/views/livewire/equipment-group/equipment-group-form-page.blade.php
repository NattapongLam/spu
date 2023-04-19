<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลกลุ่มวัสดุอุปกรณ์</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="grou_code">รหัสกลุ่มวัสดุอุปกรณ์</label>
                            <input type="text" 
                            class="form-control @error('grou_code') is-invalid @enderror" 
                            placeholder="รหัสกลุ่มวัสดุอุปกรณ์" 
                            wire:model="grou_code">
                          @error('grou_code')
                          <div id="grou_code_validation" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="grou_name">ชื่อกลุ่มวัสดุอุปกรณ์</label>
                            <input type="text" 
                            class="form-control @error('grou_name') is-invalid @enderror" 
                            placeholder="ชื่อกลุ่มวัสดุอุปกรณ์" 
                            wire:model="grou_name">
                            @error('grou_name')
                            <div id="grou_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="grou_status">สถานะ</label>
                            <select class="form-control" wire:model="grou_status">
                                <option value="1">ใช้งาน</option>
                                <option value="0">ยกเลิก</option>
                            </select>
                        </div>
                    </div>
                </div>               
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
    
