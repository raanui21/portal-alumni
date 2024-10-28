<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditSurveyAnswerRequest;
use App\Http\Requests\SurveyAnswerRequest;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function create(SurveyAnswerRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        // jangan return raw query builder
        // Check if the user already has a survey
        $survey = Survey::where('user_id', $user->id)->first();

        if ($survey) {
            // Update existing survey
            $survey->fill($data);
        } else {
            // Create a new survey
            $survey = new Survey($data);
            $survey->id = Str::uuid();
            $survey->user_id = $user->id;
        }

        $survey->save();

        return (new SurveyResource($survey))->response()->setStatusCode(201);
    }

    public function update(EditSurveyAnswerRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        $survey = Survey::where('user_id', $user->id)->first();

        if (!$survey) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => [
                        "Survey not found"
                    ],
                ]
            ], 404));
        }

        $survey->update($data);

        return (new SurveyResource($survey))->response()->setStatusCode(200);
    }
}
