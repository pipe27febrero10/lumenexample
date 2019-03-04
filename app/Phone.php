<?php namespace App;

use Illuminate\Database\Eloquent\Model;
 

class Phone extends Model {

    protected $fillable = ['numero','pais','ciudad','user_id'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships


  public function user()
    {
        return $this->belongsTo('App\User');
    }

}
