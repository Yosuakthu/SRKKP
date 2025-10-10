<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $nama
 * @property string $nik
 * @property string $alamat
 * @property string|null $konsumen_pengguna
 * @property string|null $jenis_usaha
 * @property string|null $nama_kapal
 * @property string|null $jenis_alat_mesin
 * @property int|null $jumlah_alat_mesin
 * @property string|null $daya_alat_mesin
 * @property int|null $lama_penggunaan_jam_per_hari
 * @property string|null $lama_operasi
 * @property string|null $usulan_volume_konsumsi
 * @property string|null $estimasi_sisa_jbkp
 * @property string|null $sertifikat_mesin_path
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereDayaAlatMesin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereEstimasiSisaJbkp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereJenisAlatMesin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereJenisUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereJumlahAlatMesin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereKonsumenPengguna($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereLamaOperasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereLamaPenggunaanJamPerHari($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereNamaKapal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereSertifikatMesinPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RekomRequests whereUsulanVolumeKonsumsi($value)
 */
	class RekomRequests extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string|null $phone
 * @property string $password
 * @method bool hasRole(string|array $roles, string|null $guard = null)
 * @method bool hasAnyRole(string|array $roles, string|null $guard = null)
 * @method bool hasAllRoles(string|array $roles, string|null $guard = null)
 * @method $this assignRole(...$roles)
 * @method $this removeRole(string $role)
 * @method bool hasPermissionTo(string|array $permission, string|null $guard = null)
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RekomRequests> $requests
 * @property-read int|null $requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

