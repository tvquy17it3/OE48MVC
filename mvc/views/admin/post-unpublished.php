
<!-- page content -->
<div class="content">
    <div class="page-title">
        <div class="title_left">
            <h3>Bài đăng đang chờ xuất bản!<small></small></h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div> -->
            </div>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Mã bài viết</th>
                                            <th>Tiêu đề</th>
                                            <th>Tác giả</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data['posts'] as $value) { ?>
                                            <tr>
                                                <td><?php echo $value->id;?></td>
                                                <td><?php echo $value->title;?></td>
                                                <td><?php echo $value->name." | ".$value->email?></td>
                                                <td><?php echo $value->created_at;?></td>
                                                <td>
                                                    <a href="<?php echo BASE_URL."admin/post_publish/".$value->id.'/1';?>"  onclick="return confirm_post()"><button type="button" class="btn btn-info btn-sm"><span class="badge badge-info">Xuất bản</span></button></a> 
                                                    <a href="<?php echo BASE_URL."admin/post_edit/".$value->id;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> 
                                                    <a href="<?php echo BASE_URL."admin/post_delete/".$value->id;?>" onclick="return confirm_post()"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a> 
                                                </td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
