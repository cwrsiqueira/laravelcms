<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;
use App\Page;
use App\User;

class HomeController extends Controller
{
    // QUERY + SUBQUERY + JOIN + ORDER BY + PAGINATION (QUERY TOP COMPLETA)
    // $posts = DB::table('friends') 
    //     ->select('posts.dt_hr', 'posts.descr', 'name',
    //     (DB::raw("(SELECT u1.name FROM users u1 WHERE u1.id = friends.id_friend) AS name")))
    //     ->join('users', 'users.id', '=', 'friends.id_user')
    //     ->join('posts', 'posts.id_user', '=', 'friends.id_friend')
    //     ->where('users.id', $id_user)
    //     ->orderBy('posts.dt_hr', 'desc')
    //     ->paginate(10);
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $visitCount = 0;
        $onlineCount = 0;
        $pageCount = 0;
        $userCount = 0;
        $interval = $request->input('interval', 30);
        if ($interval > 120) {
            $interval = 120;
        } elseif ($interval < 30) {
            $interval = 30;
        }

        $datePeriod = date('Y-m-d H:i:s', strtotime('-'.$interval.' days'));
        $visitList = Visitor::select('ip')
            ->where('updated_at', '>=', $datePeriod)
            ->groupBy('ip')
            ->get();
        $visitCount = count($visitList); 
        
        $timeLimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineList = Visitor::select('ip')
            ->where('updated_at', '>=', $timeLimit)
            ->groupBy('ip')
            ->get();
        $onlineCount = count($onlineList);
        
        $pageCount = Page::count();

        $userCount = User::count();

        $pagePie = [];
        $visitAll = Visitor::selectRaw('page, count(page) as c')
            ->where('updated_at', '>=', $datePeriod)
            ->groupBy('page')
            ->get();
        foreach ($visitAll as $visit ) {
            $pagePie[ $visit['page'] ] = intval($visit['c']);
        }

        if (empty($pagePie)) {
            $pagePie = [
                'Nenhum acesso até o momento' => 1,
            ];
        }

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));

        return view('admin.home', [
            'visitCount' => $visitCount,
            "onlineCount" => $onlineCount,
            "pageCount" => $pageCount,
            "userCount" => $userCount,
            "pageLabels" => $pageLabels,
            "pageValues" => $pageValues,
            'interval' => $interval
        ]);
    }
}
