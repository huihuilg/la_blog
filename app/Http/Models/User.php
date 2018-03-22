<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model{
	use SoftDeletes;
    protected $table = 'user';
    protected $dates = ['created_at','updated_at','deleted_at'];
    //protected $fillable=['title','content','uid'];
    protected $guarded=[];
    public function article()
    {
        return $this->hasMany('App\Http\Models\article','uid','id');
    }
}