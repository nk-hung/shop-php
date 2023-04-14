<?php

if (!function_exists('createMenu1')) {
  function createMenu($menus, $parent_id = 0, $char = '')
  {
    $html = '';
    foreach ($menus as $key => $menu) {
      if ($menu->parent_id == $parent_id) {
        $html .= '
        <tr>
          <td> ' . $menu->id . '</td>
          <td> ' . $char . $menu->name . '</td>
          <td> ' . $menu->active . '</td>
          <td> ' . $menu->updated_at . '</td>
          <td>
            <a class="btn btn-primary btn-sm" href="">
              <i class="fas fa-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_' . $menu->id . '" >
              <i class="fas fa-trash"></i>
            </a>
            </td>
            <div class="modal fade" id="myModal_' . $menu->id . '" role="dialog">
             <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body mt-4">
                    <p class="pt-8">Bạn có thực sự muốn xóa bản ghi này?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="ajaxRemove(' . $menu->id . ', \'/admin/menus/destroy\')" >Xác nhận</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                  </div>
                </div>
                
              </div>
            </div>
        </tr>
        ';

        unset($menus[$key]);
        $html .= createMenu($menus, $menu->id, $char . '| -- ');
      };
    };
    return $html;
  };
}
