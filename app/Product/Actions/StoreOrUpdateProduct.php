<?php

namespace App\Product\Actions;

use App\Models\Product;
use Ccantimbuhan\LaravelActions\Actions\Action;
use Ccantimbuhan\LaravelActions\Actions\HasFillable;
use Ccantimbuhan\LaravelActions\Actions\HasFillableTrait;
use Ccantimbuhan\LaravelActions\Actions\HasModel;
use Ccantimbuhan\LaravelActions\Actions\HasModelTrait;
use Ccantimbuhan\LaravelActions\Actions\HasRequestTrait;
use Ccantimbuhan\LaravelActions\Contracts\RequestAware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreOrUpdateProduct extends Action implements HasModel, RequestAware, HasFillable
{
    use HasModelTrait;
    use HasRequestTrait;
    use HasFillableTrait;

    /**
     * Create new action instance.
     *
     * @param \App\Models\Product|null
     */
    public function __construct(?Product $product = null)
    {
        $this->setModel($product ?? new Product);
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
            $this->getModel()->save();
        });

        $this->afterModelSave();

        return $this->getModel();
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
     * Set actions after model save.
     *
     * @return void
     */
    protected function afterModelSave()
    {
        // Logic here
    }

    /**
     * Set values from request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function requestWasSet(Request $request)
    {
        $this->requestWasSetFromHasRequestTrait($request);
    }
}
