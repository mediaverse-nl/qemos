<?php

namespace App\Policies;

use App\Product;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class StaffProduct
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkRole(['manager']);
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkRole(['manager']);
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        if (!in_array($product->location_id, $user->locationIds()))
        {
            return false;
        }

        return $user->checkRole(['manager']);
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
//        dd($user->locations());
//        if (!in_array($product->location_id,  $user->locations())){
//            return false;
//        }

        return $user->checkRole(['manager']);
    }
}
