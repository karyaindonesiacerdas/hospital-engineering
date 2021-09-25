<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (auth()->user()->role == 'visitor') {
                $consultations = auth()->user()->consultations->load(['visitor:id,name,institution_name', 'exhibitor:id,company_name']);
            }
            if (auth()->user()->role == 'exhibitor') {
                $consultations = auth()->user()->consultations_exhibitor->load(['visitor:id,name,institution_name', 'exhibitor:id,company_name']);
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
                $consultations->where('exhibitor_id', $request->exhibitor_id);
            }
            $consultations = $consultations->where('status', 1);
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
            $consultation = auth()->user()->consultations_exhibitor()->create([
                'date' => $request->date,
                'time' => $request->time,
                'status' => 1,
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
                    'message' => 'Book failed',
                    'data' => 'Book failed',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Book succeed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function show(Consultation $consultation)
    {
        //
    }

    public function visitorBook(Request $request, Consultation $consultation)
    {
        try {
            $consultation = $consultation->update([
                'visitor_id' => auth()->id(),
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

    public function updateStatus(Request $request, Consultation $consultation)
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
