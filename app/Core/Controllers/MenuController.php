<?php
namespace App\Core\Controllers;

use App\Modules\Auth\Models\User;
use App\Modules\Auth\Models\MenuOption; // <— Make sure you have a model for the menu_options table

class MenuController
{
    public function getMenu()
    {
        // 1) Get the logged-in user
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(["error" => "Not logged in"]);
            exit;
        }

        // 2) Load user from DB
        $user = User::find($userId);
        if (!$user) {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(["error" => "User not found"]);
            exit;
        }

        // 3) Get the menu options assigned to this user via pivot
        $menuOptions = $user->menuOptions()
            ->with('children')
            ->orderBy('sort_order', 'asc')
            ->get();

        // 4) Filter top-level vs. children
        $topLevelItems = $menuOptions->where('parent_id', null);

        // 5) Convert to the front-end's nested array structure
        $menuArray = [];
        foreach ($topLevelItems as $item) {
            $childItems = $menuOptions->where('parent_id', $item->id);

            $links = [];
            foreach ($childItems as $child) {
                $links[] = [
                    'label' => $child->label,
                    'link'  => $child->link
                ];
            }

            $menuArray[] = [
                'id'    => 'menu_' . $item->id, // or just (string) $item->id
                'label' => $item->label,
                'icon'  => $item->icon ?? 'fa-folder', // fallback
                'children' => [
                    [
                        'sectionTitle' => $item->label . ' Links',
                        'links'        => $links
                    ]
                ]
            ];
        }

        // 6) Return as JSON
        header('Content-Type: application/json');
        echo json_encode($menuArray);
        exit;
    }
}
