<?php

namespace App\Policies;

use App\User;
use App\Url;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any urls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the url.
     *
     * @param  \App\User  $user
     * @param  \App\Url  $url
     * @return mixed
     */
    public function view(User $user, Url $url)
    {
        //
    }

    /**
     * Determine whether the user can create urls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the url.
     *
     * @param  \App\User  $user
     * @param  \App\Url  $url
     * @return mixed
     */
    public function update(User $user, Url $url)
    {
        //
    }

    /**
     * Determine whether the user can delete the url.
     *
     * @param  \App\User  $user
     * @param  \App\Url  $url
     * @return mixed
     */
    public function delete(User $user, Url $url)
    {
        return $user->id == $url->user_id;
    }

    /**
     * Determine whether the user can restore the url.
     *
     * @param  \App\User  $user
     * @param  \App\Url  $url
     * @return mixed
     */
    public function restore(User $user, Url $url)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the url.
     *
     * @param  \App\User  $user
     * @param  \App\Url  $url
     * @return mixed
     */
    public function forceDelete(User $user, Url $url)
    {
        //
    }
}
