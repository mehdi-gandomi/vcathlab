<?php

namespace Modules\AccessLevel\Http\Controllers\API;

use Modules\AccessLevel\Http\Requests\API\CreateMenuAPIRequest;
use Modules\AccessLevel\Http\Requests\API\UpdateMenuAPIRequest;
use Modules\AccessLevel\Models\Menu;
use Modules\AccessLevel\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\User;
use Modules\AccessLevel\Http\Controllers\LoginController;
use Modules\AccessLevel\Models\Base\User as BaseUser;
use Modules\AccessLevel\Models\Base\Ability;

/**
 * Class MenuController
 * @package Modules\AccessLevel\Http\Controllers\API
 */

class MenuAPIController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the Menu.
     * GET|HEAD /menus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $menus = $this->menuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        $limit=$request->get('limit',10);
        $menusCount = $this->menuRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$menusCount,'total_pages'=>intval($menusCount/$limit)],'items'=>$menus->toArray()], 'Menus retrieved successfully');
    }

    /**
     * Store a newly created Menu in storage.
     * POST /menus
     *
     * @param CreateMenuAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuAPIRequest $request)
    {
        $input = $request->all();

        $menu = $this->menuRepository->create($input);

        return $this->sendResponse($menu->toArray(), 'Menu saved successfully');
    }

    /**
     * Display the specified Menu.
     * GET|HEAD /menus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        return $this->sendResponse($menu->toArray(), 'Menu retrieved successfully');
    }

    /**
     * Update the specified Menu in storage.
     * PUT/PATCH /menus/{id}
     *
     * @param int $id
     * @param UpdateMenuAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuAPIRequest $request)
    {
        $input = $request->all();

        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        $menu = $this->menuRepository->update($input, $id);

        return $this->sendResponse($menu->toArray(), 'Menu updated successfully');
    }

    /**
     * Remove the specified Menu from storage.
     * DELETE /menus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Menu $menu */
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            return $this->sendError('Menu not found');
        }

        $menu->delete();

        return $this->sendSuccess('Menu deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $menusCount = $this->menuRepository->count();
        return $this->sendResponse(['count'=>$menusCount,'total_pages'=>intval($menusCount/$limit)], 'Menus Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->menuRepository->multiDelete($ids)], 'Selected Menus Deleted');
    }
    public function export()
    {
        return $this->menuRepository->export()->download("Menus-".date("Y-m-d").".xlsx");
    }

	public function available()
	{
		$user = BaseUser::getCurrent(User::class);
		if(!$user) {
			if(auth()->check()){
                app(LoginController::class)->logout();
            }
			return [];
		}

		$permissions = $user->getAbilities();

		if(gettype($permissions) != 'array')
			$permissions = Ability::toRoutes($permissions,"id");

		return $permissions;
	}
}
