<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $permissions;

    protected $allowedRoutes = [
        'staff.user.confirm',
        'staff.location.switch',
        "staff.order.create",
        "staff.order.store",
        "staff.order.edit",
        "staff.order.update",
        "staff.order.destroy",
        "staff.kiosk.edit",
        "staff.kiosk.create",
        "staff.kiosk.store",
        "staff.kiosk.show",
        "staff.kiosk.update",
        "staff.kiosk.destroy",
    ];


    public function setPermissions()
    {
        $this->permissions = $this->routes();
    }

    public function permission()
    {
        return [
            'admin' => [
                'create_product' => true,
            ],
            'staff' => [
                'create_product' => true,
            ]

        ];
    }

    public function routes(){
        $app = app();
        $allRoutes = collect($app->routes->getRoutes())->pluck('action.as');
        $allowedRoutes = [];
        foreach ($allRoutes as $route){
            if (str_contains($route, 'staff.') && !in_array($route, $this->allowedRoutes) ){
                $allowedRoutes[] = $route;
            }
        }
        return $allowedRoutes;
    }
}
