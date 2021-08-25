<!-- page content -->
<div class="content">
    <div class="page-title">
        <div class="title_left">
            <h3>Xem bài viết<small></small></h3>
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
                    <h5><b>Tác giả:</b> <?php echo $data['author']->name.' | '.$data['author']->email; ?></h5>
                    <h5><b>Ngày tạo:</b> <?php echo $data['post']->created_at; ?></h5>
                    <h5><b>Cập nhật:</b> <?php echo $data['post']->updated_at; ?></h5>
                    <form class="form-horizontal" role="form" method="POST" action="">
                        <div class="form-group">
                            <label for="title" class="control-label">Tiêu đề</label>
                            <input id="title" type="text" class="form-control" name="title" value="<?php echo $data['post']->title; ?>" readonly>
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
                            <!-- <label>Thumbnail</label> -->
=======
                            <label>Thumbnail</label>
>>>>>>> ab9d09cea1b576fb4e80d4f17f407d5d6804d5e9
                            <div class="input-group">
                                <span class="input-group-btn">
                                </span>
                            </div>
                            <img src="<?php echo $data['post']->thumbnail; ?>" style="height: 20rem;">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nội dung</label>
<<<<<<< HEAD
                            <textarea class="form-control" id="ckeditorContemt" rows="10" name="body" readonly=""><?php echo $data['post']->body; ?></textarea>
=======
                            <textarea class="form-control" id="ckeditorContemt" rows="3" name="body"><?php echo $data['post']->body; ?></textarea>
>>>>>>> ab9d09cea1b576fb4e80d4f17f407d5d6804d5e9
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <?php
                                    if (!$data['post']->published) {
                                        echo "<a href='".BASE_URL."admin/post_publish/".$data['post']->id."/1' class='btn btn-success'>Xuất bản</a>";
                                    }else{
                                        echo "<a href='".BASE_URL."admin/post_publish/".$data['post']->id."/0' class='btn btn-success'>Ẩn bài viết</a>";
                                    }

                                    echo "<a href='".BASE_URL."admin/post_delete/".$data['post']->id."' class='btn btn-danger' onclick='return confirm_post()'>Xóa</a>";
                                 ?>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
<<<<<<< HEAD
                        <!-- <label for="exampleFormControlTextarea1">Status</label> -->
=======
                        <label for="exampleFormControlTextarea1">Status</label>
>>>>>>> ab9d09cea1b576fb4e80d4f17f407d5d6804d5e9
                        <h2></h2>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>