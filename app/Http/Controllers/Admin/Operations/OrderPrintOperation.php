<?php

namespace App\Http\Controllers\Admin\Operations;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

trait OrderPrintOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupOrderPrintRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/order-print', [
            'as'        => $routeName.'.orderPrint',
            'uses'      => $controller.'@orderPrint',
            'operation' => 'orderPrint',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupOrderPrintDefaults()
    {
        CRUD::allowAccess('orderPrint');

        CRUD::operation('orderPrint', function () {
            CRUD::loadDefaultOperationSettingsFromConfig();
        });

        CRUD::operation('list', function () {

             CRUD::addButton('top', 'order_print', 'view', 'crud::buttons.order_print');
            // CRUD::addButton('line', 'order_print', 'view', 'crud::buttons.order_print');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function orderPrint()
    {
        CRUD::hasAccessOrFail('orderPrint');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = CRUD::getTitle() ?? 'Order Print '.$this->crud->entity_name;

        // load the view
        return view('crud::operations.order_print', $this->data);
    }
}
