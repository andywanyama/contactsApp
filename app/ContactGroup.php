<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactGroup extends Model {

    protected $fillable = ['name'];
    protected $table = 'contactgroups';

    /**
     * Get the contacts for the blog post.
     */
    public function contacts() {
        return $this->hasMany('App\Contact');
    }

}
