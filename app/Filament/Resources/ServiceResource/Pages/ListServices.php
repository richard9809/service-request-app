<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Service;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class ListServices extends ListRecords
{

    protected static string $resource = ServiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        $user = Auth::user();

        $query = Service::query()
            ->leftJoin('users', 'services.user', '=', 'users.id')
            ->leftJoin('departments', 'services.department', '=', 'departments.id')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->select('services.*', 'users.name as user', 'departments.name as department');

        if($user->hasRole('User')){
            $query->where('model_has_roles.role_id', '=', 3)
                ->where('services.user', $user->id)
                ->latest();
        }

        return $query;
    }
}
