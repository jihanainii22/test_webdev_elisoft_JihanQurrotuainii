<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = [
            ['id' => 1, 'nama' => 'Menu 1', 'parent_id' => 0],
            ['id' => 2, 'nama' => 'Menu 1.1', 'parent_id' => 1],
            ['id' => 3, 'nama' => 'Menu 1.2', 'parent_id' => 1],
            ['id' => 4, 'nama' => 'Menu 2', 'parent_id' => 0],
            ['id' => 5, 'nama' => 'Menu 2.1', 'parent_id' => 4],
            ['id' => 6, 'nama' => 'Menu 2.2', 'parent_id' => 4],
            ['id' => 7, 'nama' => 'Menu 2.1.1', 'parent_id' => 5],
            ['id' => 8, 'nama' => 'Menu 3', 'parent_id' => 0],
        ];
        $hierarchy = $this->buildMenuHierarchy($menus);
        
        return view('menu', compact('hierarchy'));
    }
    private function buildMenuHierarchy($menus, $parentId = 0)
    {
        $hierarchy = [];
        
        foreach ($menus as $menu) {
            if ($menu['parent_id'] === $parentId) {
                $menu['children'] = $this->buildMenuHierarchy($menus, $menu['id']);
                $hierarchy[] = $menu;
            }
        }
        
        return $hierarchy;
    }
}
