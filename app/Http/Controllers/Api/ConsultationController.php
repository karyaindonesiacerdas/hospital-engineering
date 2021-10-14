<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (auth()->user()->role == 'admin') {
                $consultations = Consultation::get()->load(['visitor:id,name,institution_name,mobile', 'exhibitor:id,company_name']);
            }
            if (auth()->user()->role == 'visitor') {
                $consultations = auth()->user()->consultations->load(['visitor:id,name,institution_name,mobile', 'exhibitor:id,company_name']);
            }
            if (auth()->user()->role == 'exhibitor') {
                $consultations = auth()->user()->consultations_exhibitor->load(['visitor:id,name,institution_name,mobile', 'exhibitor:id,company_name']);
            }
            if ($request->status) {
                $consultations = $consultations->where('status', $request->status)->values();
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully fetched',
                'data' => $consultations,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function available(Request $request)
    {
        try {
            $consultations = Consultation::query();
            if ($request->exhibitor_id) {
                $consultations = $consultations->where('exhibitor_id', $request->exhibitor_id);
            }
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully fetched',
                'data' => $consultations->get(['id', 'date', 'time']),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $consultationAlreadyExist = Consultation::where(['date' => $request->date, 'time' => $request->time, 'exhibitor_id' => $request->exhibitor_id])->first();
            if ($consultationAlreadyExist) {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'You have already registered, a maximum of one',
                ], 400);
            } else {
                if (auth()->user()->consultations->where('exhibitor_id', $request->exhibitor_id)->first()) {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'You have already registered, a maximum of one',
                    ], 400);
                } else {
                    $consultation = auth()->user()->consultations()->create([
                        'date' => $request->date,
                        'time' => $request->time,
                        'status' => 1,
                        'exhibitor_id' => $request->exhibitor_id,
                    ]);
                    if ($consultation) {
                        return response()->json([
                            'code' => 200,
                            'type' => 'success',
                            'message' => 'Book succeed',
                            'data' => $consultation,
                        ], 200);
                    } else {
                        return response()->json([
                            'code' => 400,
                            'type' => 'danger',
                            'message' => 'You have already registered, a maximum of one',
                        ], 400);
                    }
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function storeGuest(Request $request)
    {
        try {
            // REGISTER OR CHECK USER FIRST
            $dataUser = [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ];

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $user = User::create($dataUser);
            }

            $consultationAlreadyExist = Consultation::where(['date' => $request->date, 'time' => $request->time, 'exhibitor_id' => $request->exhibitor_id])->first();
            if ($consultationAlreadyExist) {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'You have already registered, a maximum of one',
                ], 400);
            } else {
                if ($user->consultations->where('exhibitor_id', $request->exhibitor_id)->first()) {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'You have already registered, a maximum of one',
                    ], 400);
                } else {
                    $consultation = $user->consultations()->create([
                        'date' => $request->date,
                        'time' => $request->time,
                        'status' => 1,
                        'exhibitor_id' => $request->exhibitor_id,
                    ]);
                    if ($consultation) {
                        return response()->json([
                            'code' => 200,
                            'type' => 'success',
                            'message' => 'Book succeed',
                            'data' => $consultation,
                        ], 200);
                    } else {
                        return response()->json([
                            'code' => 400,
                            'type' => 'danger',
                            'message' => 'You have already registered, a maximum of one',
                        ], 400);
                    }
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function show(Consultation $consultation)
    {
        //
    }

    public function update(Request $request, Consultation $consultation)
    {
        try {
            $consultation = $consultation->update([
                'status' => $request->status,
            ]);
            if ($consultation) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully updated',
                    'data' => $consultation,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Failed to post',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function destroy(Consultation $consultation)
    {
        try {
            if ($consultation->delete()) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully deleted',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}
