<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    protected $fillable = ['name', 'email', 'number', 'contactgroup_id'];

    /**
     * Get the group that owns the contact
     */
    public function contact_group() {
        return $this->belongsTo('App\ContactGroup');
    }

}
