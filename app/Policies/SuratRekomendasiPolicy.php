<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SuratRekomendasi;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuratRekomendasiPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SuratRekomendasi');
    }

    public function view(AuthUser $authUser, SuratRekomendasi $suratRekomendasi): bool
    {
        return $authUser->can('View:SuratRekomendasi');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SuratRekomendasi');
    }

    public function update(AuthUser $authUser, SuratRekomendasi $suratRekomendasi): bool
    {
        return $authUser->can('Update:SuratRekomendasi');
    }

    public function delete(AuthUser $authUser, SuratRekomendasi $suratRekomendasi): bool
    {
        return $authUser->can('Delete:SuratRekomendasi');
    }

    public function restore(AuthUser $authUser, SuratRekomendasi $suratRekomendasi): bool
    {
        return $authUser->can('Restore:SuratRekomendasi');
    }

    public function forceDelete(AuthUser $authUser, SuratRekomendasi $suratRekomendasi): bool
    {
        return $authUser->can('ForceDelete:SuratRekomendasi');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SuratRekomendasi');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SuratRekomendasi');
    }

    public function replicate(AuthUser $authUser, SuratRekomendasi $suratRekomendasi): bool
    {
        return $authUser->can('Replicate:SuratRekomendasi');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SuratRekomendasi');
    }

}