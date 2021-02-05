<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateservicioRequest;
use App\Http\Requests\UpdateservicioRequest;
use App\Repositories\servicioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class servicioController extends AppBaseController
{
    /** @var  servicioRepository */
    private $servicioRepository;

    public function __construct(servicioRepository $servicioRepo)
    {
        $this->servicioRepository = $servicioRepo;
    }

    /**
     * Display a listing of the servicio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $servicios = $this->servicioRepository->all();

        return view('servicios.index')
            ->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new servicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created servicio in storage.
     *
     * @param CreateservicioRequest $request
     *
     * @return Response
     */
    public function store(CreateservicioRequest $request)
    {
        $input = $request->all();

        $servicio = $this->servicioRepository->create($input);

        Flash::success('Servicio saved successfully.');

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified servicio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        return view('servicios.show')->with('servicio', $servicio);
    }

    /**
     * Show the form for editing the specified servicio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        return view('servicios.edit')->with('servicio', $servicio);
    }

    /**
     * Update the specified servicio in storage.
     *
     * @param int $id
     * @param UpdateservicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateservicioRequest $request)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        $servicio = $this->servicioRepository->update($request->all(), $id);

        Flash::success('Servicio updated successfully.');

        return redirect(route('servicios.index'));
    }

    /**
     * Remove the specified servicio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        $this->servicioRepository->delete($id);

        Flash::success('Servicio deleted successfully.');

        return redirect(route('servicios.index'));
    }
}
