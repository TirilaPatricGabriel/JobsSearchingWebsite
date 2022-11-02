<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Domain;
use App\Models\Experience;
use App\Models\Study;
use App\Models\Type;
use App\Models\User;
use App\Models\Company;


class Job extends Model
{
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function publisher(){
        return $this->belongsTo(User::class);
    }

    public function domains(){
        return $this->belongsToMany(Domain::class);
    }

    public function locations(){
        return $this->belongsToMany(Location::class);
    }

    public function experiences(){
        return $this->belongsToMany(Experience::class);
    }

    public function studies(){
        return $this->belongsToMany(Study::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
