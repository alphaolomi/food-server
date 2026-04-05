<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\OrganizationRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @return HasMany<Order, $this>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return BelongsToMany<Organization, $this>
     */
    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function organizationRole(Organization $organization): ?OrganizationRole
    {
        $row = $this->organizations()->where('organizations.id', $organization->id)->first();

        return $row?->pivot->role !== null
            ? OrganizationRole::tryFrom((string) $row->pivot->role)
            : null;
    }

    public function hasOrganizationRole(Organization $organization, OrganizationRole ...$roles): bool
    {
        $current = $this->organizationRole($organization);

        return $current !== null && in_array($current, $roles, true);
    }

    public function canManageCatalogForStore(Store $store): bool
    {
        $org = $store->organization;

        return $this->hasOrganizationRole(
            $org,
            OrganizationRole::Owner,
            OrganizationRole::Admin,
        );
    }

    public function canViewStoreOperations(Store $store): bool
    {
        $org = $store->organization;

        return $this->hasOrganizationRole(
            $org,
            OrganizationRole::Owner,
            OrganizationRole::Admin,
            OrganizationRole::Staff,
        );
    }
}
