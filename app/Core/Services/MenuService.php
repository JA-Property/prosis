// app/Core/MenuModel.php (or app/Services/MenuService.php)
class MenuModel
{
    private $masterMenu = [
        [
            "id" => "people",
            "label" => "People",
            "icon" => "fa-user",
            "requiredPermission" => "view_people",
            "children" => [
                [
                    "sectionTitle" => "General People Links",
                    "links" => [
                        [
                            "label" => "Staff Directory",
                            "link" => "#",
                            "requiredPermission" => "view_staff_directory"
                        ],
                        [
                            "label" => "Students",
                            "link" => "#",
                            "requiredPermission" => "view_students"
                        ]
                    ]
                ]
            ]
        ],
        // ...
    ];

    /**
     * Return the unfiltered menu items (i.e. the master config).
     */
    public function getMasterMenu(): array
    {
        return $this->masterMenu;
    }
}
