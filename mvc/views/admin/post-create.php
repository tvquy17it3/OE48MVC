<div class="content">
    <div class="page-title">
        <div class="title_left">
            <h3>Đăng bài mới<small></small></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        <div class="form-group">
                            <label for="title" class="control-label">Tiêu đề</label>
                            <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                            
                        </div>

                        <div class="form-group">
                            <label for="title">Thumbnail</label>
                            <div class="input-group">
                              <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                  <i class="fa fa-picture-o"></i> Choose
                                  </a>
                              </span>
                              <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contents</label>
                            <textarea class="form-control" id="ckeditorContemt" rows="3" name="body"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputState">Chọn chế độ</label>
                              <select id="inputState" class="form-control" name="published">
                                <option selected value="0">Ẩn bài viết</option>
                                <option value="1">Xuất bản</option>
                              </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Tạo bài viết mới
                                </button>
                                <a href="" class="btn btn-danger">
                                    Hủy bỏ
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>