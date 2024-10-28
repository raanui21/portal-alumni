<?php

namespace App\Http\Controllers\FrontOffice;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyAnswerRequest;
use App\Models\Survey;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TracerStudyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tracerStudy = $user->survey;

        return view('frontoffice.tracer-study.index',['user'=>$user,'tracerStudy'=>$tracerStudy]);
    }

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

        return redirect()->back()->with('success', 'Form has been submitted successfully');
    }
}
