<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'firstname',
        'middle',
        'lastname',
        'address',
        'city',
        'mobile',
        'email',
        'dateofbirth',
        'gender',
        'maritalstatus',
        'image_path'
    ];

    public static $disk='public';

    protected static function boot(): void
    {
        parent::boot();

    

        static::deleting(function ($contact) {
            if($contact->image_path)
            Storage::disk(self::$disk)->delete($contact->image_path);

            

        });
    }

    public function getFullNameAttribute()
        {
            return $this->firstname .' '.$this->middle. ' ' . $this->lastname;
        }

    public function getGender()
        {
            if($this->gender == 0)
            return 'Male';
            else
            return 'Female';
        }

        public function getMaritalStatus()
        {
            if($this->maritalstatus == 0)
            return 'single';
            else if($this->maritalstatus == 1)
            return 'married';
            else
            return 'divorced';

        }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
