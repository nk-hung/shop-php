<?php

if (!function_exists('createMenu')) {
  function createMenu($menus, $parent_id = 0, $char = '')
  {
    $html = '';
    foreach ($menus as $key => $menu) {
      if ($menu->parent_id == $parent_id) {
        $html .= '
        <tr>
          <td> ' . $menu->id . '</td>
          <td> ' . $char . $menu->name . '</td>
          <td> 
            <span> 
              <button  class="btn ' . ($menu->active == 1 ? "btn-success" : "btn-danger") . ' ">
                ' . ($menu->active == 1 ? "YES" : "NO") . '
              </button>
            </span>
          </td>
          <td> ' . $menu->updated_at . '</td>
          <td>
            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
              <i class="fas fa-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#edit_modal_' . $menu->id . '" >
              <i class="fas fa-trash"></i>
            </a>
            </td>
            <div class="modal fade" id="edit_modal_' . $menu->id . '" role="dialog">
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

if (!function_exists('createSidebarMenu')) {
  function createSidebarMenu($items)
  {
    $html = '';
    foreach ($items as $item) {
      $html .= '
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
              ' . $item->title . ' 
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">' . (function ($item) {
        $submenu = '';
        foreach ($item->submenu as $key => $submenu) {
          $submenu .= '<li class="nav-item">
                <a href="/admin/menus/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>' . $submenu->title . '</p>
                </a>
              </li>';
        }
        return $submenu;
      })() . '
          </ul>
          </li>';
    }
    return $html;
  }
}
