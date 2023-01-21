<?php

namespace Modules\AccessLevel\Http\Controllers\API;

use Modules\AccessLevel\Http\Requests\API\CreateRoleAPIRequest;
use Modules\AccessLevel\Http\Requests\API\UpdateRoleAPIRequest;
use Modules\AccessLevel\Models\Role;
use Modules\AccessLevel\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RoleController
 * @package Modules\AccessLevel\Http\Controllers\API
 */

class RoleAPIController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
        $this->middleware('auth:sanctum')->except(['export']);
//         $this->middleware('check.access:14');
    }

    /**
     * Display a listing of the Role.
     * GET|HEAD /roles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $rolesCount = $this->roleRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$rolesCount,'total_pages'=>intval($rolesCount/$limit)],'items'=>$roles->toArray()], 'Roles retrieved successfully');
    }

    /**
     * Store a newly created Role in storage.
     * POST /roles
     *
     * @param CreateRoleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleAPIRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);
        @set_time_limit(0);
        $role->storeAbilities($input['permissions']);

        return $this->sendResponse($role->toArray(), 'Role saved successfully');
    }

    /**
     * Display the specified Role.
     * GET|HEAD /roles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        return $this->sendResponse($role->toArray(), 'Role retrieved successfully');
    }

    /**
     * Update the specified Role in storage.
     * PUT/PATCH /roles/{id}
     *
     * @param int $id
     * @param UpdateRoleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        $role = $this->roleRepository->update($input, $id);
        @set_time_limit(0);
        $role->storeAbilities($input['permissions']);

        return $this->sendResponse($role->toArray(), 'Role updated successfully');
    }

    /**
     * Remove the specified Role from storage.
     * DELETE /roles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        $role->deleteAbilities();
        $role->delete();

        return $this->sendSuccess('Role deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $rolesCount = $this->roleRepository->count();
        return $this->sendResponse(['count'=>$rolesCount,'total_pages'=>intval($rolesCount/$limit)], 'Roles Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->roleRepository->multiDelete($ids)], 'Selected Roles Deleted');
    }
    public function export()
    {
        return $this->roleRepository->export()->download("Roles-".date("Y-m-d").".xlsx");
    }
}
