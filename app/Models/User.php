<?php

namespace App\Models;

use App\Filters\Users\FilterByRole;
use App\Filters\Users\FilterBySearchTerm;
use App\Traits\ScopeFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable([
    'fullname',
    'nickname',
    'role', 
    'email', 
    'password'
])]
#[Hidden(['password', 'remember_token'])]
#[Table('users')]
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, ScopeFilter;   

    // user roles
    const ADMIN_ROLE = 'admin';
    const SCRUM_MASTER_ROLE = 'scrum_master';
    const COLLABORATOR_ROLE = 'collaborator';
    const VIEWER_ROLE = 'viewer';

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $filters = [
        'role' => FilterByRole::class,
        'search' => FilterBySearchTerm::class
    ];
}
