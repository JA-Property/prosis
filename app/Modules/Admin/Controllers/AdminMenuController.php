<?php
namespace App\Modules\Admin\Controllers;

use App\Core\Controllers\BaseController;
use App\Modules\Auth\Models\MenuOption;

class AdminMenuController extends BaseController
{
    public function renderAllMenuOptions()
    {
        // 1) Fetch ALL menu options (you can also order by sort_order, etc.)
        $allOptions = MenuOption::with('children')->get();

        // 2) Build a tree starting from top-level (where parent_id is null)
        $topLevel = $allOptions->where('parent_id', null);
        $menuTree = $this->buildMenuTree($topLevel, $allOptions);

        // 3) Render the view, passing the nested tree
        $this->render(__DIR__ . '/../Views/AllMenuOptions.php', [
            'menuTree' => $menuTree
        ]);
    }

    /**
     * Recursively build a nested array from Eloquent relations.
     * @param \Illuminate\Support\Collection $items - top-level items
     * @param \Illuminate\Support\Collection $all - all items, to avoid repeated queries
     */
    private function buildMenuTree($items, $all)
    {
        $tree = [];

        foreach ($items as $item) {
            // We already eager-loaded "children", but let's be sure
            // or we can find them from $all->where('parent_id', $item->id)
            $children = $all->where('parent_id', $item->id);

            $tree[] = [
                'id'       => $item->id,
                'label'    => $item->label,
                'icon'     => $item->icon,
                'link'     => $item->link,
                'children' => $this->buildMenuTree($children, $all)
            ];
        }

        return $tree;
    }
}
