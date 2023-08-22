<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Contact;
use App\Models\Application;
use App\Models\Category;
use App\Models\CVuser;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

          
            if ($usertype === 'client') {
                return $this->index();
            } elseif ($usertype === 'admin') {
                $totalUsers = User::count();
                $totalJobs = Job::count();
                $totalAcceptedApplications = Application::where('status', 'approved')->count();
                $totalRefusedApplications = Application::where('status', 'refused')->count();
               
                return view('admin.home', compact('totalUsers', 'totalJobs', 'totalAcceptedApplications', 'totalRefusedApplications'));
            }
        }

        return redirect()->back();
    }

    public function index()
    {
        $totaljobs = Job::count();
        $totalusers = User::count();
        $acceptedApplications = Application::where('status', 'approved')->count();
        $jobs = Job::all();
       
       
            return view('user.home',compact('totaljobs', 'totalusers','jobs','acceptedApplications'));
        
    }
    public function index2()
    {
        $totaljobs = Job::count();
        $totalusers = User::count();
        $acceptedApplications = Application::where('status', 'approved')->count();

   
        $jobs = Job::all();
            return view('user.home',compact('totaljobs', 'totalusers','jobs','acceptedApplications'));
        
    }
   
    
    
    

    public function about(){
        return view('user.about');
    }

    public function contact(){
        return view('user.contact');
    }

    public function post_job(){
        return view('user.post-job');
    }

    public function job_single($id ){
        $job=Job::find($id)  ;
        $totaljobs = Job::count();
        $totalusers = User::count();
    
        $categories = Category::all();
   
        $jobs = Job::all();
    
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found.');
        }
       
        return view('user.job_single',compact('job','totaljobs', 'totalusers','jobs','categories'));
    }

    public function job($id){
     $jobs=Job::find($id)  ;
        return view('user.job_single',compact('jobs'));
    }

    public function messages(){
        if (Auth::check()) {
            $user = Auth::user();
            $applications = $user->applications()->with('job')->get(); // Retrieve applications with related job information
    
            return view('user.messages', compact('applications'));
        } else {
            return redirect()->back();
        }
        
    }
    public function favourites()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $myFavorites = $user->savedJobs; // Retrieving the saved jobs using the relationship.
    
            return view('user.favourites', compact('myFavorites'));
        } else {
            return redirect()->back();
        }
    }

    public function upload_cv(){
        return view('user.upload_cv');
    }

    public function store_cv(Request $request)
{
    $user = Auth::user();

    // Validate the uploaded file (ensure it's a PDF, you can add more validation if needed)
    $request->validate([
        'cv' => 'required|mimes:pdf|max:2048',
    ]);

    // Store the uploaded CV file in the 'cv_uploads' directory
    $path = $request->file('cv')->store('cv_uploads');

    // Create or update the CVUser record for the current user
    $cvUser = CVUser::updateOrCreate(['user_id' => $user->id], ['cv_path' => $path]);

    return redirect()->back()->with('success', 'CV uploaded successfully!');
}

public function showProfile()
{
    // Get the CVUser record for the authenticated user (assuming you are using authentication)
    $cvUser = CVUser::where('user_id', auth()->user()->id)->first();

    // Check if the CVUser record exists
    if ($cvUser) {
        // If the CVUser record exists, you can access the CV path and other data like this:
        $cvPath = $cvUser->cv_path;

        // If you have a relationship set up, you can access user information like this:
        // $user = $cvUser->user; // Assuming you have a 'user' relationship in the CVUser model

        // Pass the $cvUser and $cvPath variables to the view
        return view('user.profile', compact('cvUser', 'cvPath'));
    } else {
        // If the CVUser record does not exist, redirect the user to the CV upload page with an error message
        return redirect()->route('upload_cv')->with('error', 'Please upload your CV to access the profile page.');
    }
}


   
    }

    



