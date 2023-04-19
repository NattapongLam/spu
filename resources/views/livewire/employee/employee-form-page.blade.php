<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลพนักงาน</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name">ชื่อ - นามสกุล</label>
                            <input type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="ชื่อ - นามสกุล" 
                            wire:model="name">
                          @error('name')
                          <div id="name_validation" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="email">อีเมล</label>
                            <input type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="อีเมล" 
                            wire:model="email">
                            @error('email')
                            <div id="email_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="password">รหัสผ่าน</label>
                            <input type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="รหัสผ่าน" 
                            wire:model="password">
                            @error('password')
                            <div id="password_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="status">สถานะ</label>
                            <select class="form-control" wire:model="status">
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
    