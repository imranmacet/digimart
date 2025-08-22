<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorSale;
use App\Models\Item;
use App\Models\KycVerification;
use App\Models\Purchase;
use App\Models\Subscription;
use App\Models\Withdraw;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index(Request $request) : View
    {

        $year = $request->get('year', Carbon::now()->year);
        $monthsRange = [];

        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::createFromDate($year, $month, 1);
            $monthKey = $date->format('Y-m');
            $monthsRange[$monthKey] = [
                'month_name' => $date->format('F'),
                'year' => $year,
                'month' => $month,
                'total_sales' => 0,
                'total_author_earnings' => 0,
                'platform_revenue' => 0
            ];
        }
        
        $startDate = Carbon::createFromDate($year, 1, 1);
        $endDate = Carbon::createFromDate($year, 12, 31);

        $monthlyData = AuthorSale::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total_sales'),
            DB::raw('SUM(author_earning) as total_author_earnings'),
            DB::raw('SUM(amount - author_earning) as platform_revenue')
        )->where('created_at', '>=', $startDate)
        ->where('created_at', '<=', $endDate)
        ->groupBy('year', 'month')
        ->orderBy('month')
        ->get();

        foreach ($monthlyData as $data) {
            $monthKey = $data->year . '-' . str_pad($data->month, 2, '0', STR_PAD_LEFT);
            if(isset($monthsRange[$monthKey])) {
                $monthsRange[$monthKey]['total_sales'] = round($data->total_sales, 2);
                $monthsRange[$monthKey]['total_author_earnings'] = round($data->total_author_earnings, 2);
                $monthsRange[$monthKey]['platform_revenue'] = round($data->platform_revenue, 2);
            }
        }

        $months = [];
        $totalSales = [];
        $authorEarnings = [];
        $platformRevenue = [];

        foreach ($monthsRange as $data) {
            $months[] = $data['month_name'];
            $totalSales[] = $data['total_sales'];
            $authorEarnings[] = $data['total_author_earnings'];
            $platformRevenue[] = $data['platform_revenue'];
        }

        $chartData = [
            'months' => $months,
            'series' => [
                [
                    'name' => 'Total Sales',
                    'type' => 'column',
                    'data' => $totalSales
                ],
                [
                    'name' => 'Author Commissions',
                    'type' => 'line',
                    'data' => $authorEarnings
                ],
                [
                    'name' => 'Platform Revenue',
                    'type' => 'area',
                    'data' => $platformRevenue
                ],

            ],
            'year' => $year
        ];

        $years = AuthorSale::query()
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');
        
        $sales = [
            'day' => AuthorSale::whereDate('created_at', Carbon::today())->sum('amount'),
            'week' => AuthorSale::whereBetween('created_at',[
                Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()
                ])->sum('amount'),
            'month' => AuthorSale::whereMonth('created_at', Carbon::now()->month)->sum('amount'),
            'year' => AuthorSale::whereYear('created_at', Carbon::now()->year)->sum('amount'),
        ];

        $statusCount = Item::query()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $kycCount = KycVerification::where('status', 'pending')->count();
        $orderCount = Purchase::count();
        $withdrawalCount = Withdraw::where('status', 'pending')->count();
        $subscriberCount = Subscription::count();

        $withdrawRequests = Withdraw::where('status', 'pending')->latest()->limit(10)->get();
        $orders = Purchase::with(['user:id,name', 'transaction', 'purchaseItems'])->latest()->limit(10)->get();
        return view('admin.dashboard.index', compact(
            'chartData',
            'years',
            'sales',
            'statusCount',
            'kycCount',
            'orderCount', 
            'withdrawalCount',
            'subscriberCount',
            'withdrawRequests',
            'orders'
        ));
    }
}
