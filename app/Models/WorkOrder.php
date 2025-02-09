<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $table = 'work_order';
    public $timestamps = true;
    protected $primaryKey = "work_order_no";
    protected $fillable = [
        'sales_id',
        'mat_ordered_id',
        'work_order_status',
        'planned_start_date',
        'planned_end_date',
        'real_start_date',
        'real_end_date',
        'product_code',
        'component_code',
    ];

    public function item(){
        // Returns the product relationship if the work order has a product code
        // otherwise returns the component relationship which is assigned to the work order
        return ($this->product_code != null) ?
               $this->belongsTo(ManufacturingProducts::class, 'product_code', 'product_code') :
               $this->belongsTo(Component::class, 'component_code', 'component_code');
    }
}
