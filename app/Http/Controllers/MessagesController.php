<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageUpdateRequest;
use App\Repositories\MessageRepository;
use App\Validators\MessageValidator;

/**
 * Class MessagesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MessagesController extends Controller
{
    /**
     * @var MessageRepository
     */
    protected $repository;

    /**
     * @var MessageRepository
     */
    protected $contactRepository;

    /**
     * @var MessageValidator
     */
    protected $validator;

    /**
     * MessagesController constructor.
     *
     * @param MessageRepository $repository
     * @param MessageValidator $validator
     */
    public function __construct(MessageRepository $repository, ContactRepository $contactRepository, MessageValidator $validator)
    {
        $this->repository = $repository;
        $this->contactRepository = $contactRepository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        if (request()->wantsJson() || request()->isJson()) {
            $messages = $this->repository->all();

            return response()->json([
                'data' => $messages,
            ]);
        }

        $messages = $this->repository->with('contact')->all();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = $this->contactRepository->all(['id', 'nome'])->pluck('nome', 'id')->toArray();

        return view('messages.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MessageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MessageCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $message = $this->repository->create($request->all());

            $response = [
                'message' => 'Message created.',
                'data'    => $message->toArray(),
            ];

            if ($request->wantsJson() || request()->isJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson() || request()->isJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (request()->wantsJson() || request()->isJson()) {
            $message = $this->repository->find($id);

            return response()->json([
                'data' => $message,
            ]);
        }

        $message = $this->repository->with('contact')->find($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showByContact($id)
    {
        $message = $this->repository->findByField('contact_id', $id);

        if (request()->wantsJson() || request()->isJson()) {

            return response()->json([
                'data' => $message,
            ]);
        }

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = $this->repository->find($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MessageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MessageUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $message = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Message updated.',
                'data'    => $message->toArray(),
            ];

            if ($request->wantsJson() || request()->isJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson() || request()->isJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson() || request()->isJson()) {

            return response()->json([
                'message' => 'Message deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Message deleted.');
    }
}
