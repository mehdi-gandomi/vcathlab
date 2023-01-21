<?php

namespace Modules\Admin\Http\Controllers\API;

use Modules\Admin\Http\Requests\API\CreateCommentAPIRequest;
use Modules\Admin\Http\Requests\API\UpdateCommentAPIRequest;
use Modules\Admin\Models\Comment;
use Modules\Admin\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CommentController
 * @package Modules\Admin\Http\Controllers\API
 */

class CommentAPIController extends AppBaseController
{
    /** @var  CommentRepository */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the Comment.
     * GET|HEAD /comments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comments = $this->commentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $commentsCount = $this->commentRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$commentsCount,'total_pages'=>ceil($commentsCount/$limit)],'items'=>$comments->toArray()], 'Comments retrieved successfully');
    }

    /**
     * Store a newly created Comment in storage.
     * POST /comments
     *
     * @param CreateCommentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentAPIRequest $request)
    {
        $input = $request->all();

        $comment = $this->commentRepository->create($input);

        return $this->sendResponse($comment->toArray(), 'Comment saved successfully');
    }

    /**
     * Display the specified Comment.
     * GET|HEAD /comments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comment $comment */
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        return $this->sendResponse($comment->toArray(), 'Comment retrieved successfully');
    }

    /**
     * Update the specified Comment in storage.
     * PUT/PATCH /comments/{id}
     *
     * @param int $id
     * @param UpdateCommentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comment $comment */
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        $comment = $this->commentRepository->update($input, $id);

        return $this->sendResponse($comment->toArray(), 'Comment updated successfully');
    }
    /**
     * Update the specified Comment in storage.
     * PUT/PATCH /comments/{id}
     *
     * @param int $id
     * @param UpdateCommentAPIRequest $request
     *
     * @return Response
     */
    public function confirm($id)
    {
        /** @var Comment $comment */
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        $comment->approve();

        return $this->sendResponse($comment->toArray(), 'Comment updated successfully');
    }

    /**
     * Remove the specified Comment from storage.
     * DELETE /comments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comment $comment */
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        $comment->delete();

        return $this->sendSuccess('Comment deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $commentsCount = $this->commentRepository->count();
        return $this->sendResponse(['count'=>$commentsCount,'total_pages'=>ceil($commentsCount/$limit)], 'Comments Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->commentRepository->multiDelete($ids)], 'Selected Comments Deleted');
    }
    public function export()
    {
        return $this->commentRepository->export()->download("Comments-".date("Y-m-d").".xlsx");
    }
}
