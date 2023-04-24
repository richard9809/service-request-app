<?php

namespace App\Filament\Resources\JobResource\Pages;

use App\Filament\Resources\JobResource;
use App\Models\Job;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListJobs extends ListRecords
{
    protected static string $resource = JobResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        $user = Auth::user();

        $query = Job::query()
            ->leftJoin('users', 'jobs.user_id', '=', 'users.id')
            ->leftJoin('services', 'jobs.service_id', '=', 'services.id')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->select('jobs.*', 'users.name as user', 'services.reportedBy as reportedBy');

        if($user->hasRole('User')){
            $query->where('model_has_roles.role_id', '=', 3)
                ->where('jobs.user_id', $user->id)
                ->latest();
        }

        return $query;
    }
}
