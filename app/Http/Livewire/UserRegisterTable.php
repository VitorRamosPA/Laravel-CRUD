<?php

namespace App\Http\Livewire;

use App\Models\UserRegister;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridColumns,
    Tests\Models\Dish};

final class UserRegisterTable extends PowerGridComponent
{
    use ActionButton;

    public array $nome;
    public array $rg;
    public array $cpf;
    public array $nascimento;
    public array $sexo;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\UserRegister>
     */
    public function datasource(): Builder
    {
        return UserRegister::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('nome')
            ->addColumn('cpf')
            ->addColumn('rg')
            ->addColumn('sexo')
            ->addColumn('nascimento', fn (UserRegister $model) => Carbon::parse($model->nascimento)->format('d/m/Y'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Nome', 'nome')
                ->searchable()
                ->editOnClick()
                ->sortable(),

            Column::make('Nascimento', 'nascimento')
                ->searchable()
                ->editOnClick()
                ->sortable(),

            Column::make('CPF', 'cpf')
                ->searchable()
                ->editOnClick()
                ->sortable(),

            Column::make('RG', 'rg')
                ->searchable()
                ->editOnClick()
                ->sortable(),

            Column::make('Sexo', 'sexo')
                ->searchable()
                ->editOnClick()
                ->sortable(),


        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('nome'),
            Filter::inputText('nascimento'),
            Filter::inputText('cpf'),
            Filter::inputText('rg'),
            Filter::inputText('sexo'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid UserRegister Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
       return [
//           Button::make('edit', 'Editar')
//               ->class('flex px-5 bg-indigo-500 cursor-pointer text-white px-1 py-2.5 m-1 rounded text-sm')
//               ->route('lista.update', ['user_register' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('flex bg-red-500 cursor-pointer text-white px-5 py-2 m-1 rounded text-sm')
               ->route('lista.destroy', ['user_register' => 'id'])
               ->target('')
               ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid UserRegister Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
       return [];
    }

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        UserRegister::query()->find($id)->update([
            $field => $value,
        ]);
    }
}
