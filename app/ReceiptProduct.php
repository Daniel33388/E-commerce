<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptProduct extends Model
{
    public $table = 'receiptsproducts';
    public $timestamps = false;
    public $guarded = [];
}
