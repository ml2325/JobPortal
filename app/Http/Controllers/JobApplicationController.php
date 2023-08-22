<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\CVUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function apply(Job $job)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the user's CV from the cv_user table
        $cvUser = CVuser::where('user_id', $user->id)->first(); // Update the model name to CVuser

        if (!$cvUser) {
            return redirect()->back()->with('error', 'You must upload your CV before applying.');
        }

        // Create a new job application and associate it with the user's CV and the job
        DB::beginTransaction(); // Start a transaction
        try {
            $jobApplication = new Application();
            $jobApplication->user_id = $user->id;
            $jobApplication->job_id = $job->id;
            // Set the default value of status to "in progress"
            $jobApplication->status = 'in progress';
            // Optionally, you can include other job-related information here
            $jobApplication->save();

            DB::commit(); // Commit the transaction
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction if an error occurs
            return redirect()->back()->with('error', 'An error occurred while processing your application.');
        }

        // Optionally, you can notify the user or perform other actions here

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }


    public function applications(){
        $applications=Application::all();
        return view('applications.applications',compact('applications'));
    }

    public function approved($id)
    {
        $application = Application::find($id);
        $application->status = 'approved';
        $application->save();

        return redirect()->back();
    }


    public function canceled($id)
    {
        $application = Application::find($id);
        $application->status = 'refused';
        $application->save();

        return redirect()->back();
    
    }

    public function viewCV($userId)
    {
        $cvUser = CVUser::where('user_id', $userId)->first();

        if (!$cvUser || !Storage::exists($cvUser->cv_path)) {
            abort(404); // CV not found or doesn't exist in the specified directory
        }

        // Optionally, you can perform further actions like logging the CV access

        return Storage::download($cvUser->cv_path);
    }
    
}
