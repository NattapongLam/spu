<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลไซต์งาน</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="job_code">รหัสไซต์งาน</label>
                            <input type="text" 
                            class="form-control @error('job_code') is-invalid @enderror" 
                            placeholder="รหัสไซต์งาน" 
                            wire:model="job_code">
                          @error('job_code')
                          <div id="job_code_validation" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="job_name">ชื่อไซต์งาน</label>
                            <input type="text" 
                            class="form-control @error('job_name') is-invalid @enderror" 
                            placeholder="ชื่อไซต์งาน" 
                            wire:model="job_name">
                            @error('job_name')
                            <div id="job_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="job_status">สถานะ</label>
                            <select class="form-control" wire:model="job_status">
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