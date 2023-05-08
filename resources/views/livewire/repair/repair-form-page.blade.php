<div>
    <br>    
    <div class="row">
        <div class="col-12">
        <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-6"><h3 class="card-title">บันทึกแจ้งซ่อม</h3></div>
                    <div class="col-6">
                        <div class="form-group">
                            {{-- <label for="sta_id">สถานะ</label> --}}
                            <select class="form-control" wire:model="sta_id">
                                @foreach ($sta as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
              </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="rep_date">วันที่</label>
                                <input type="date" class="form-control @error('rep_date') is-invalid @enderror" 
                                name="rep_date" 
                                id="rep_date" 
                                wire:model="rep_date"
                                readonly>
                                @error('rep_date')
                                <div id="rep_date_validation" class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="rep_docuno">เลขที่เอกสาร</label>
                                <input type="text" class="form-control @error('rep_docuno') is-invalid @enderror" 
                                name="rep_docuno" 
                                id="rep_docuno" 
                                wire:model="rep_docuno"
                                readonly>
                                @error('rep_docuno')
                                <div id="rep_docuno_validation" class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror
                                <input type="hidden" 
                                name="rep_number" 
                                id="rep_number" 
                                wire:model="rep_number"
                                readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="job_id">ไซต์งาน</label>
                                <select class="form-control @error('job_id') is-invalid @enderror" wire:model="job_id">   
                                    @foreach ($job as $item)
                                    <option value="{{$item->id}}">{{$item->job_name}}</option>   
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
                                <label for="equ_id">วัสดุอุปกรณ์</label>
                                <select class="form-control @error('equ_id') is-invalid @enderror" wire:model="equ_id">
                                    <option value="">กรุณาเลือกวัสดุอุปกรณ์</option>     
                                    @foreach ($equ as $item)
                                    <option value="{{$item->id}}">{{$item->equ_code}}/{{$item->equ_name}}</option>   
                                    @endforeach                             
                                </select>
                                @error('equ_id')
                                <div id="equ_id_validation" class="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-12 col-md-12">
                            <label for="rep_desc">รายละเอียด</label>
                            <textarea class="form-control @error('rep_desc') is-invalid @enderror" id="rep_desc" name="rep_desc" wire:model="rep_desc"></textarea>
                            @error('rep_desc')
                            <div id="rep_desc_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            บันทึกข้อมูล
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