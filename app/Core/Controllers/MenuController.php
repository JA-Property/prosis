<?php

class MenuController
{
    protected $menuModel;
    protected $userModel;

    public function __construct(MenuModel $menuModel, UserModel $userModel)
    {
        $this->menuModel = $menuModel;
        $this->userModel = $userModel;
    }

    public function getMenu()
    {
        // 1) get the master menu
        $menu = $this->menuModel->getMasterMenu();

        // 2) get the user from session or Auth
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            // not logged in, return empty or throw an error
            return [];
        }
        $userPermissions = $this->userModel->getUserPermissions($userId);

        // 3) filter the menu
        $filteredMenu = $this->filterMenuByPermissions($menu, $userPermissions);

        // 4) return as JSON
        header('Content-Type: application/json');
        echo json_encode($filteredMenu);
        exit;
    }

    private function filterMenuByPermissions(array $menu, array $userPermissions)
    {
        $filtered = [];
        foreach ($menu as $menuItem) {
            if (isset($menuItem['requiredPermission']) &&
                !in_array($menuItem['requiredPermission'], $userPermissions)) {
                continue;
            }
            if (!empty($menuItem['children'])) {
                foreach ($menuItem['children'] as $i => $section) {
                    $filteredLinks = [];
                    foreach ($section['links'] as $link) {
                        if (isset($link['requiredPermission']) &&
                            !in_array($link['requiredPermission'], $userPermissions)) {
                            continue;
                        }
                        $filteredLinks[] = $link;
                    }
                    $menuItem['children'][$i]['links'] = $filteredLinks;
                }
            }
            $filtered[] = $menuItem;
        }
        return $filtered;
    }
}
