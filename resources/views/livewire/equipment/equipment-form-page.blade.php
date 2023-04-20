<div>
    <br>    
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ข้อมูลวัสดุอุปกรณ์</h3>
              </div>
              <div class="card-body">
                <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="equ_code">รหัสวัสดุอุปกรณ์</label>
                            <input type="text" class="form-control @error('equ_code') is-invalid @enderror" 
                            name="equ_code" 
                            id="equ_code" 
                            placeholder="รหัสวัสดุอุปกรณ์"
                            wire:model="equ_code">
                            @error('equ_code')
                            <div id="equ_code_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="equ_name">ชื่อวัสดุอุปกรณ์</label>
                            <input type="text" class="form-control @error('equ_name') is-invalid @enderror" 
                            name="equ_name" 
                            id="equ_name" 
                            placeholder="ชื่อวัสดุอุปกรณ์"
                            wire:model="equ_name">
                            @error('equ_name')
                            <div id="equ_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="equ_unit">หน่วยนับ</label>
                            <input type="text" class="form-control @error('equ_unit') is-invalid @enderror" 
                            name="equ_unit" 
                            id="equ_unit" 
                            placeholder="หน่วยนับ"
                            wire:model="equ_unit">
                            @error('equ_unit')
                            <div id="equ_unit_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="equ_cost">ราคาวัสดุอุปกรณ์</label>
                            <input type="text" class="form-control @error('equ_cost') is-invalid @enderror" 
                            name="equ_cost" 
                            id="equ_cost" 
                            placeholder="ราคาวัสดุอุปกรณ์"
                            wire:model="equ_cost">
                            @error('equ_cost')
                            <div id="equ_cost_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="job_id">ไชต์ที่จัดเก็บ</label>
                            <select class="form-control @error('job_id') is-invalid @enderror" 
                            name="job_id" 
                            id="job_id" 
                            wire:model="job_id">
                            <option value="">-- เลือกไชต์ที่จัดเก็บ --</option>
                            @foreach ($job as $job)
                            <option value="{{$job->id}}">{{$job->job_name}}</option>
                            @endforeach
                            </select>
                            @error('job_id')
                            <div id="job_id_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="group_id">กลุ่มวัสดุอุปกรณ์</label>
                            <select class="form-control @error('group_id') is-invalid @enderror" 
                            name="group_id" 
                            id="group_id" 
                            wire:model="group_id">
                            <option value="">-- เลือกกลุ่มวัสดุอุปกรณ์ --</option>
                            @foreach ($eqgroup as $grou)
                            <option value="{{$grou->id}}">{{$grou->grou_name}}</option>
                            @endforeach
                            </select>
                            @error('group_id')
                            <div id="group_id_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="equ_status">สถานะ</label>
                            <select class="form-control" wire:model="equ_status">
                                <option value="1">ใช้งาน</option>
                                <option value="0">ยกเลิก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="equ_picture">รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="equ_picture" wire:model="equ_picture">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div> 
                    </div>
                    <div class="col-12 col-md-12">
                        <label for="equ_desc">รายละเอียด</label>
                        <textarea class="form-control" id="equ_desc" name="equ_desc" wire:model="equ_desc"></textarea>
                    </div>                                    
                </div>  <br>           
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">บันทึกข้อมูล</button>
                </div>
                </form>
              </div>
              <div wire:loading wire:target="save" wire:loading.class="overlay" wire:loading.flex>
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>