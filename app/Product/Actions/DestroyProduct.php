<?php

namespace App\Product\Actions;

use App\Models\Product;
use Ccantimbuhan\LaravelActions\Actions\Action;
use Ccantimbuhan\LaravelActions\Actions\HasModel;
use Ccantimbuhan\LaravelActions\Actions\HasModelTrait;
use Illuminate\Support\Facades\DB;

class DestroyProduct extends Action implements HasModel
{
    use HasModelTrait;

    /**
     * Create new action instance.
     *
     * @param \App\Models\Product
     */
    public function __construct(Product $product)
    {
        $this->setModel($product);
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->before();

        DB::transaction(function () {
            $this->getModel()->delete();
        });

        $this->afterModelDelete();
    }

    /**
     * Set actions before model save.
     *
     * @return void
     */
    protected function before()
    {
        // Logic here
    }

    /**
     * Set actions after model delete.
     *
     * @return void
     */
    protected function afterModelDelete()
    {
        // Logic here
    }
}
