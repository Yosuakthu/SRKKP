<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\RekomRequests;
use Illuminate\Auth\Access\HandlesAuthorization;

class RekomRequestsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:RekomRequests');
    }

    public function view(AuthUser $authUser, RekomRequests $rekomRequests): bool
    {
        return $authUser->can('View:RekomRequests');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:RekomRequests');
    }

    public function update(AuthUser $authUser, RekomRequests $rekomRequests): bool
    {
        return $authUser->can('Update:RekomRequests');
    }

    public function delete(AuthUser $authUser, RekomRequests $rekomRequests): bool
    {
        return $authUser->can('Delete:RekomRequests');
    }

    public function restore(AuthUser $authUser, RekomRequests $rekomRequests): bool
    {
        return $authUser->can('Restore:RekomRequests');
    }

    public function forceDelete(AuthUser $authUser, RekomRequests $rekomRequests): bool
    {
        return $authUser->can('ForceDelete:RekomRequests');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:RekomRequests');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:RekomRequests');
    }

    public function replicate(AuthUser $authUser, RekomRequests $rekomRequests): bool
    {
        return $authUser->can('Replicate:RekomRequests');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:RekomRequests');
    }

}