<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model{
	use SoftDeletes;
    protected $table = 'comment';
    protected $dates = ['created_at','updated_at','deleted_at'];
    //protected $fillable=['title','content','uid'];
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('App\Http\Models\User','uid','id');
    }
}