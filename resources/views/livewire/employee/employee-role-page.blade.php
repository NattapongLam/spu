<div class="mt-4"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">กำหนดสิทธิ</h3>
              </div>
              <div class="card-body">
                <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="status">สิทธิ</label>
                            <select class="form-control" wire:model="role" id="role" name="role">
                                <option value="">กรุณาเลือกสิทธิ</option>
                                @foreach ($roles as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </div>
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

