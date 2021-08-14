<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function isActive()
    {
        return $this->demission === null ? true : false;
    }

    public function readmit()
    {
        $now = new \DateTime();
        $this->admission = $now->format("Y-m-d");
        $this->demission = null;
        $this->save();
    }

    public function demit()
    {
        $now = new \DateTime();
        $this->demission = $now->format("Y-m-d");
        $this->save();
    }

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function congregation()
    {
        return $this->belongsTo('App\Congregation');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }
}
