<form id="Login" method="POST" action="/admin/file/upload" class="form-horizontal">
  <div class="form-group"><label class="col-sm-2 control-label">Tên tệp tin</label>
    <div class="col-sm-10"><input type="text" name="username" class="form-control" autocomplete="off" required /></div>
  </div>
  <div class="form-group"><label class="col-sm-2 control-label">Link tải</label>
    <div class="col-sm-10"><div class="input-group"><input type="url" name="url" class="form-control" required /><span class="input-group-btn"> <button type="button" class="btn btn-primary">Rút gọn link
                                        </button> </span></div></div>
  </div>
  <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>
    <div class="col-sm-10">
      <textarea rows="5" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
      <button id="lgbtn" class="btn btn-primary" value="submit" name="submit" type="submit">Upload</button>
    </div>
  </div>
</form>
