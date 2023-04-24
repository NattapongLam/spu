<div>
  <br>    
  <div class="row">
      <div class="col-12">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">ส่งคืนวัสดุอุปกรณ์</h3>
            </div>
          <div class="card-body">
              <form wire:submit.prevent="save">
                  @csrf
                  <div class="row">
                      <div class="col-12 col-md-6">
                          <div class="form-group">
                              <label for="borr_hd_date">วันที่</label>
                              <input type="date" class="form-control @error('borr_hd_date') is-invalid @enderror" 
                              name="borr_hd_date" 
                              id="borr_hd_date" 
                              wire:model="borr_hd_date"
                              readonly>
                              @error('borr_hd_date')
                              <div id="borr_hd_date_validation" class="invalid-feedback">
                              {{$message}}
                              </div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-12 col-md-6">
                          <div class="form-group">
                              <label for="borr_hd_docuno">เลขที่เอกสาร</label>
                              <input type="text" class="form-control @error('borr_hd_docuno') is-invalid @enderror" 
                              name="borr_hd_docuno" 
                              id="borr_hd_docuno" 
                              wire:model="borr_hd_docuno"
                              readonly>
                              @error('borr_hd_docuno')
                              <div id="borr_hd_docuno_validation" class="invalid-feedback">
                              {{$message}}
                              </div>
                              @enderror
                              <input type="hidden" 
                              name="borr_hd_number" 
                              id="borr_hd_number" 
                              wire:model="borr_hd_number"
                              readonly>
                          </div>
                      </div>
                      <div class="col-12 col-md-6">
                          <div class="form-group">
                              <label for="emp_name">ผู้บันทึก</label>
                              <input type="text" class="form-control @error('emp_name') is-invalid @enderror" 
                              name="emp_name" 
                              id="emp_name" 
                              wire:model="emp_name"
                              readonly>
                              @error('emp_name')
                              <div id="emp_name_validation" class="invalid-feedback">
                              {{$message}}
                              </div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-12 col-md-6">
                          <div class="form-group">
                              <label for="req_job_id">ไซต์ที่ยืม</label>
                              <select class="form-control" wire:model="req_job_id" >
                                  <option value="">กรุณาเลือกไซต์ที่ยืม</option>     
                                  @foreach ($req as $item)
                                  <option value="{{$item->id}}">{{$item->job_name}}</option>   
                                  @endforeach                             
                              </select>
                          </div>
                      </div>                      
                  </div>
                  <div class="row">
                      <div class="col-12">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>ชื่อวัสดุอุปกรณ์</th>
                                      {{-- <th>จำนวนยืม</th> --}}
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($equs as $key => $item)
                                  <tr>
                                      <td>
                                          {{$item['equ_name']}}                                          
                                      </td>
                                      {{-- <td>
                                          {{$item['equ_qty']}}                                           
                                      </td>                                          --}}
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                      <div class="col-12 col-md-12">
                          <label for="borr_hd_desc">รายละเอียด</label>
                          <textarea class="form-control" id="borr_hd_desc" name="borr_hd_desc" wire:model="borr_hd_desc" readonly></textarea>
                      </div>
                      <div class="col-12 col-md-12">
                          <label for="app_reamrk">หมายเหตุอนุมัติ</label>
                          <textarea class="form-control" id="app_reamrk" name="app_reamrk" wire:model="app_reamrk" ></textarea>
                      </div>
                      <div class="col-12 col-md-12">
                          <label for="send_remark">รายละเอียดส่งคืน</label>
                          <textarea class="form-control" id="send_remark" name="send_remark" wire:model="send_remark" ></textarea>
                      </div>
                  </div><br>
                  <div class="form-group">
                      <button type="submit" class="btn btn-block btn-primary">
                         อนุมัติข้อมูล
                      </button>
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