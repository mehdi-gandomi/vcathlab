<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Modules\User\Models\ComplexCase;
use App\Models\User;
use Modules\Admin\Models\Physician;
use Modules\Admin\Repositories\UserRepository;
use Modules\User\Models\ComplexCaseCategory;

class PageController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
        $complexCasesCategories=ComplexCaseCategory::whereNull("parent_id")->with("children")->get();
        $usersCount=user::count();
        $expertsCount=User::count();
        $casesCount=ComplexCase::count();
        View::share("complexCasesCategories",$complexCasesCategories);
        View::share("usersCount",$usersCount);
        View::share("expertsCount",$expertsCount);
        View::share("casesCount",$casesCount);

    }
    public function home()
    {
        $complexCases=ComplexCase::with("complexCaseCategory")->limit(8)->orderBy("created_at","DESC")->get();
        $nightmares=ComplexCase::with("complexCaseCategory")->where("nightmare",1)->orderBy("created_at","DESC")->get();


        return view('front.home',['complexCases'=>$complexCases,'nightmares'=>$nightmares]);
    }
    public function issue(Request $request,$slug)
    {
        $issue=ComplexCase::where("slug",$slug)->with("complexCaseCategory")->first();
        abort_unless($issue,404);
        $issue=$issue->append("related_cases");
        $categories=ComplexCaseCategory::all();
        $recentIssues=ComplexCase::latest()->limit(4)->get();
        return view('front.issue',compact("issue","categories","recentIssues"));
    }
    public function cases(Request $request,$category=null)
    {
        $cases=ComplexCase::query();
        if($category){
            $cases=$cases->where("complex_case_category_id",$category);
        }
        if($request->has('q')){
            $cases=$cases->where("title","LIKE","%".$request->get("q")."%");
        }
        if($request->has('nightmare')){
            if($request->get("nightmare") !== ""){
                $cases=$cases->where("nightmare",$request->get("nightmare"));
            }
        }
        $cases=$cases->orderBy("created_at","DESC")->paginate(10);
        return view('front.cases',compact('cases'));
    }
    public function physicians(Request $request)
    {
        // $physicians=$this->userRepository->allQuery()->withCount("comments","complex_cases")->where("master",0)->where("state",1)->paginate(10);
        $physicians=Physician::all();

        return view('front.physicians',compact('physicians'));
    }
    public function products(Request $request,$key)
    {
        $titles=[
            'niffr'=>[
                'title'=>"Non-invasive FFR",
                "key"=>"products_niffr"
            ],
            'ct_ffr'=>[
                'title'=>"CT - FFR",
                "key"=>"products_ctffr"
            ],
            'wall_shear_stress'=>[
                'title'=>"Wall Shear Stress",
                "key"=>"products_wallshearstress"
            ],
            'imr'=>[
                'title'=>"Microvascular (IMR)",
                "key"=>"products_imr"
            ],
        ];
        // $physicians=$this->userRepository->allQuery()->withCount("comments","complex_cases")->where("master",0)->where("state",1)->paginate(10);
        $page=$titles[$key];
        $title=$page['title'];
        $content=setting($page['key']);
        return view('front.product',compact('content','title'));
    }
    public function aboutUs(Request $request)
    {
        return view('front.about-us');
    }
    public function collaboration(Request $request)
    {
        return view('front.collaboration');
    }
    public function privacyPolicy(Request $request)
    {
        return view('front.privacy-policy');
    }

    public function physician(Request $request,$email){
        $physician=User::where("email",$email)->withCount("complex_cases")->firstOrFail();
        return view('front.physician',compact('physician'));
    }
}
