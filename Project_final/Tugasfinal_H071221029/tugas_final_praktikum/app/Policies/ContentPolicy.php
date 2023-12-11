<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{

    use HandlesAuthorization;

    public function update(User $user, Content $content)
    {
        // Admin bisa melakukan update
        return $user->role === 'admin';
        return $user->role === 'teacher';

    }

    public function delete(User $user, Content $content)
    {
        // Admin bisa melakukan delete
        return $user->role === 'admin';
        return $user->role === 'teacher';
    }
}
