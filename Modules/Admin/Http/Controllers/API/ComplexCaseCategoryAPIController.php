<?php

namespace Modules\Admin\Http\Controllers\API;

use Modules\Admin\Http\Requests\API\CreateComplexCaseCategoryAPIRequest;
use Modules\Admin\Http\Requests\API\UpdateComplexCaseCategoryAPIRequest;
use Modules\Admin\Models\ComplexCaseCategory;
use Modules\Admin\Repositories\ComplexCaseCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComplexCaseCategoryController
 * @package Modules\Admin\Http\Controllers\API
 */

class ComplexCaseCategoryAPIController extends AppBaseController
{
    /** @var  ComplexCaseCategoryRepository */
    private $complexCaseCategoryRepository;

    public function __construct(ComplexCaseCategoryRepository $complexCaseCategoryRepo)
    {
        $this->complexCaseCategoryRepository = $complexCaseCategoryRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the ComplexCaseCategory.
     * GET|HEAD /complexCaseCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $complexCaseCategories = $this->complexCaseCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $complexCaseCategoriesCount = $this->complexCaseCategoryRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$complexCaseCategoriesCount,'total_pages'=>ceil($complexCaseCategoriesCount/$limit)],'items'=>$complexCaseCategories->toArray()], 'Complex Case Categories retrieved successfully');
    }

    /**
     * Store a newly created ComplexCaseCategory in storage.
     * POST /complexCaseCategories
     *
     * @param CreateComplexCaseCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComplexCaseCategoryAPIRequest $request)
    {
        $input = $request->all();

        $complexCaseCategory = $this->complexCaseCategoryRepository->create($input);

        return $this->sendResponse($complexCaseCategory->toArray(), 'Complex Case Category saved successfully');
    }

    /**
     * Display the specified ComplexCaseCategory.
     * GET|HEAD /complexCaseCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ComplexCaseCategory $complexCaseCategory */
        $complexCaseCategory = $this->complexCaseCategoryRepository->find($id);

        if (empty($complexCaseCategory)) {
            return $this->sendError('Complex Case Category not found');
        }

        return $this->sendResponse($complexCaseCategory->toArray(), 'Complex Case Category retrieved successfully');
    }

    /**
     * Update the specified ComplexCaseCategory in storage.
     * PUT/PATCH /complexCaseCategories/{id}
     *
     * @param int $id
     * @param UpdateComplexCaseCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplexCaseCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ComplexCaseCategory $complexCaseCategory */
        $complexCaseCategory = $this->complexCaseCategoryRepository->find($id);

        if (empty($complexCaseCategory)) {
            return $this->sendError('Complex Case Category not found');
        }

        $complexCaseCategory = $this->complexCaseCategoryRepository->update($input, $id);

        return $this->sendResponse($complexCaseCategory->toArray(), 'ComplexCaseCategory updated successfully');
    }

    /**
     * Remove the specified ComplexCaseCategory from storage.
     * DELETE /complexCaseCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ComplexCaseCategory $complexCaseCategory */
        $complexCaseCategory = $this->complexCaseCategoryRepository->find($id);

        if (empty($complexCaseCategory)) {
            return $this->sendError('Complex Case Category not found');
        }

        $complexCaseCategory->delete();

        return $this->sendSuccess('Complex Case Category deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $complexCaseCategoriesCount = $this->complexCaseCategoryRepository->count();
        return $this->sendResponse(['count'=>$complexCaseCategoriesCount,'total_pages'=>ceil($complexCaseCategoriesCount/$limit)], 'Complex Case Categories Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->complexCaseCategoryRepository->multiDelete($ids)], 'Selected Complex Case Categories Deleted');
    }
    public function export()
    {
        return $this->complexCaseCategoryRepository->export()->download("Complex Case Categories-".date("Y-m-d").".xlsx");
    }
}
