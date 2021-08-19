
<div class="row" style="display: inline-block;" >
  <!-- <h1></h1> -->
</div>
<!-- /top tiles -->

<div class="row" style="margin: 50px;">
  <div class="col-md-12 col-sm-12 " >
    <div style="text-align: center;font-size: 26px">
      <p><h1>TÀI KHOẢN BỊ KHÓA</h1></p>
    </div>
    <table class="table">
      <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên</th>
          <th scope="col">Email</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Ngày tạo</th>
          <th scope="col">Cập nhật</th>
          <th scope="col">XÓA/SỬA</th>
        </tr>
      </thead>
      <tbody>
        <?php

          foreach ($data['user'] as $value) {
            echo "<tr>";
            echo "<th scope='row'>$value->id</th>";
            echo "<td>$value->name</td>";
            echo "<td>$value->email</td>";
            echo "<td>$value->phone</td>";
            echo "<td>$value->created_at</td>";
            echo "<td>$value->updated_at</td>";
            echo "<td>
                   <a href='".BASE_URL."user/delete/".$value->id."'><button type='button' class='btn btn-danger' onclick='return confirm_delete()'>Xóa</button></a>
                    <a href='".BASE_URL."user/role_user/".$value->id."/3'><button type='button' class='btn btn-warning' onclick='return confirm_block()'>Khôi phục</button></a>
                    <a href='<?php?>'><button type='button' class='btn btn-primary'>Chỉnh sửa</button></a>
                </td>";
            echo "</tr>";
          }
          ?>
      </tbody>
    </table>
  </div>