<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRegistrationRequest;
use App\Jobs\CreateTenantAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tenant;

class RegisterTenantController extends Controller
{
    // public function registerTenant(Request $request)
    public function registerTenant(TenantRegistrationRequest $request)
    {
        // dd($request);
        // $tenant = Tenant::create(['id' => Str::uuid()]);
        // $tenant->domains()->create(['domain' => $request->domain.'.'. config('tenancy.central_domains')[1]]);
        $tenant = Tenant::create($request->validated());
        $tenant->domains()->create(['domain' => $request->domain]);

        return redirect(tenant_route($tenant->domains->first()->domain, 'home.index'));
    }
}
