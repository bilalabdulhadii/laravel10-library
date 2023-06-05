<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
        'role', 'gender', 'brith_date'
    ];


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->role === "Admin")
        {
            return true;
        }
    }
    public function isLibrarian()
    {
        if ($this->role === "Librarian")
        {
            return true;
        }
    }
    public function isMember()
    {
        if ($this->role === "Member")
        {
            return true;
        }
    }



    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $pendingLoans = 'pendingLoans';
    protected $overdueOrActiveLoans = 'overdueLoans';
    protected $returnedLoans = 'returnedLoans';
    protected $messages = 'messages';

    public function pendingLoans()
    {
        $this->pendingLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'Pending')
            ->get();
        return $this->pendingLoans;
    }
    public function overdueOrActiveLoans()
    {
        /*$this->overdueOrActiveLoans = Loan::where('user_id', Auth::user()->getId())->get();*/
        $this->overdueOrActiveLoans = Loan::where('user_id', Auth::user()->getId())
            ->where(function ($query) {
                $query->where('status', 'Active')
                    ->orWhere('status', 'Overdue');
            })->get();
        return $this->overdueOrActiveLoans;
    }
    public function returnedLoans()
    {
        $this->returnedLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'Returned')
            ->get();
        return $this->returnedLoans;
    }

    public function getMessages()
    {
        $this->messages = Message::where('email', Auth::user()->getEmail())->get();
        return $this->messages;
    }

    public function getImage()
    {
        if ($this->profile_photo_path)
        {
            return $this->profile_photo_path;
        }
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
