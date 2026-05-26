<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Models\BuySaleGold;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Currency;
use App\Customer;
use App\ExchangeRate;
use App\Jobs\SendGoldAlertJob;
use App\Events\RateUpdated;
use App\Exchange;
use App\ExchangeMulti;

class ExchangeGoldController extends Controller
{
    public function report(Request $request)
    {
        $selcomid = Session('log_into_company_id');
        $current = Carbon::now();
        $current->timezone('Asia/Phnom_Penh');
        $dd = date("y-m-d", strtotime($current));
        $userid = Auth::user()->id;
        $sumexchanges = DB::table('buy_sale_gold')
            ->join('currencies', 'buy_sale_gold.currency_id', '=', 'currencies.id')
            ->join('customers', 'buy_sale_gold.customer_id', '=', 'customers.id')

            ->select(
                'buy_sale_gold.currency_id',
                'buy_sale_gold.customer_id',
                'currencies.no',
                'currencies.shortcut',
                'currencies.sk',
                'currencies.curname',
                'currencies.optsign',
                'currencies.tuochek',
                'customers.name as customer',
                DB::raw("CASE WHEN buy_sale_gold.qty > 0 THEN 'positive' ELSE 'negative' END as type"),
                DB::raw("SUM(buy_sale_gold.qty) as total_product"),

                DB::raw("SUM(buy_sale_gold.amount) as total_amount"),
                DB::raw("COUNT(*) as qty")
            )
            ->whereDate('buy_sale_gold.dd', $dd)
            ->where('buy_sale_gold.status', 1)
            ->where('buy_sale_gold.is_ptr', 0)

            ->groupBy('buy_sale_gold.currency_id', 'buy_sale_gold.customer_id', 'currencies.shortcut', 'currencies.sk', 'currencies.no', 'currencies.curname', 'currencies.optsign', 'currencies.tuochek', 'customers.name', 'type')
            ->orderBy('currencies.no')
            ->orderBy('type', 'desc')
            ->get();

        $exchanges = BuySaleGold::whereDate('dd', $dd)->where('status', 1)->where('is_ptr', 0)->orderBy('id')->get();
        $sumByCurrency = BuySaleGold::selectRaw('currency_id, SUM(qty) as total_qty, SUM(amount) as total_amount')
            ->whereDate('dd', $dd)
            ->where('status', 1)
            ->where('is_ptr', 0)
            ->groupBy('currency_id')
            ->get();
        $users = User::where('active', 1)->where('role_id', 0)->get();

        return view('exchangeapps.goldlist', compact('exchanges', 'sumByCurrency', 'sumexchanges', 'users'));
    }
    public function search(Request $request)
    {
        //return $request->all();

        $d1 = date('Y-m-d', strtotime($request->d1));
        $d2 = date('Y-m-d', strtotime($request->d2));
        if ($request->alldate == 'true') {
            $mindate = BuySaleGold::where('status', 1)->where('is_ptr', 0)->min('dd');
            $d1 = $mindate;
        }
        $sumexchanges = DB::table('buy_sale_gold')
            ->join('currencies', 'buy_sale_gold.currency_id', '=', 'currencies.id')
            ->join('customers', 'buy_sale_gold.customer_id', '=', 'customers.id')

            ->select(
                'buy_sale_gold.currency_id',
                'buy_sale_gold.customer_id',
                'currencies.no',
                'currencies.shortcut',
                'currencies.sk',
                'currencies.curname',
                'currencies.optsign',
                'currencies.tuochek',
                'customers.name as customer',
                DB::raw("CASE WHEN buy_sale_gold.qty > 0 THEN 'positive' ELSE 'negative' END as type"),
                DB::raw("SUM(buy_sale_gold.qty) as total_product"),

                DB::raw("SUM(buy_sale_gold.amount) as total_amount"),
                DB::raw("COUNT(*) as qty")
            )
            ->whereBetween(DB::raw('DATE(buy_sale_gold.dd)'), [$d1, $d2])
            ->where('buy_sale_gold.status', 1)
            ->where('buy_sale_gold.is_ptr', 0)

            ->groupBy('buy_sale_gold.currency_id', 'buy_sale_gold.customer_id', 'currencies.shortcut', 'currencies.sk', 'currencies.no', 'currencies.curname', 'currencies.optsign', 'currencies.tuochek', 'customers.name', 'type')
            ->orderBy('currencies.no')
            ->orderBy('type', 'desc')
            ->get();

        $exchanges = BuySaleGold::whereBetween(DB::raw('DATE(dd)'), [$d1, $d2])->where('status', 1)->where('is_ptr', 0)->orderBy('id')->get();
        $sumByCurrency = BuySaleGold::selectRaw('currency_id, SUM(qty) as total_qty, SUM(amount) as total_amount')
            ->whereBetween(DB::raw('DATE(dd)'), [$d1, $d2])
            ->where('status', 1)
            ->where('is_ptr', 0)
            ->groupBy('currency_id')
            ->get();

        return view('exchangeapps.searchlist', compact('exchanges', 'sumByCurrency', 'sumexchanges'));
    }
    public function search1(Request $request)
    {
        //return $request->all();

        $d1 = date('Y-m-d', strtotime($request->d1));
        $d2 = date('Y-m-d', strtotime($request->d2));
        if ($request->alldate == 'true') {
            $mindate = BuySaleGold::where('status', 1)->where('is_ptr', 0)->min('dd');
            $d1 = $mindate;
        }

        $exchanges = BuySaleGold::whereBetween(DB::raw('DATE(dd)'), [$d1, $d2])->where('status', 1)->where('is_ptr', 0);
        $sumByCurrency = BuySaleGold::selectRaw('currency_id, SUM(qty) as total_qty, SUM(amount) as total_amount')
            ->whereBetween(DB::raw('DATE(dd)'), [$d1, $d2])
            ->where('status', 1)
            ->where('is_ptr', 0);

        if ($request->cus_id) {
            $exchanges = $exchanges->where('customer_id', $request->cus_id);
            $sumByCurrency = $sumByCurrency->where('customer_id', $request->cus_id);
        }
        if ($request->cur_id) {
            $exchanges = $exchanges->where('currency_id', $request->cur_id);
            $sumByCurrency = $sumByCurrency->where('currency_id', $request->cur_id);
        }
        if ($request->sign) {
            if ($request->sign == '+') {
                $exchanges = $exchanges->where('qty', '>', 0);
                $sumByCurrency = $sumByCurrency->where('qty', '>', 0);
            } else {
                $exchanges = $exchanges->where('qty', '<', 0);
                $sumByCurrency = $sumByCurrency->where('qty', '<', 0);
            }
        }
        $exchanges = $exchanges->orderBy('id')->get();
        $sumByCurrency = $sumByCurrency->groupBy('currency_id')->get();
        return view('exchangeapps.searchlist1', compact('exchanges', 'sumByCurrency'));
    }
    public function setgoldrate(Request $request)
    {
        $selcomid = Session('log_into_company_id');
        $curgold = Currency::where('active', 1)->where('ismain', 0)->where('isgold', 1)->where('company_id', $selcomid)->orderBy('no')->get();
        return view("exchangeapps.setgoldrate", compact('curgold'));
    }
    public function buysalegold(Request $request)
    {
        $selcomid = Session('log_into_company_id');
        $current = Carbon::now();
        $current->timezone('Asia/Phnom_Penh');
        $dd = date("y-m-d", strtotime($current));
        $userid = Auth::user()->id;
        $exchangelists = Exchange::whereDate('dd', $dd)
            ->where('user_id', $userid)
            ->where('status', 1)
            ->where('isexchangelist', 0)
            ->where('company_id', $selcomid)
            ->whereHas('currency', function ($query) {
                $query->where('isgold', 1);
            })
            ->orderBy('id')
            ->get();

        $curgold = Currency::where('active', 1)->where('ismain', 0)->where('isgold', 1)->where('company_id', $selcomid)->orderBy('no')->get();
        $allcur = Currency::where('active', 1)->where('company_id', $selcomid)
            ->where(function ($q) {
                $q->where('ismain', 1)->orWhere('isgold', 1);
            })
            ->orderBy('no')->get();
        $partners = Customer::where('status', 1)->where('company_id', $selcomid)->orderBy('no')->get();
        $users = User::where('active', 1)
            ->where(function ($q) use ($selcomid) {
                $q->where('company_id', $selcomid)
                    ->orWhere('company_id', '')
                    ->orWhereNull('company_id');
            })->get();


        $mex = ExchangeMulti::whereNull('mapcode')->where('user_id', Auth::user()->id)->where('status', 1)->where('company_id', $selcomid)->orderBy('id')->get();
        $totalbuy = DB::table('exchange_multis')->select(DB::raw('sum(buy) as tbuy,curbuy'))
            ->whereNull('mapcode')->where('user_id', Auth::user()->id)->where('company_id', $selcomid)->where('status', 1)
            ->groupBy('curbuy')->get();
        $totalsale = DB::table('exchange_multis')->select(DB::raw('sum(sale) as tsale,cursale'))
            ->whereNull('mapcode')->where('user_id', Auth::user()->id)->where('company_id', $selcomid)->where('status', 1)
            ->groupBy('cursale')->get();
        $c = collect();
        foreach ($totalbuy as $tb) {
            $c = $c->push(['cur' => $tb->curbuy, 'value' => $tb->tbuy]);
        }
        foreach ($totalsale as $ts) {
            $c = $c->push(['cur' => $ts->cursale, 'value' => -1 * $ts->tsale]);
        }

        $groups = $c->groupBy('cur');
        $sumc = $groups->map(function ($group) {
            return [
                'cur' => $group->first()['cur'], // opposition_id is constant inside the same group, so just take the first or whatever.
                'value' => $group->sum('value'),
                // 'won' => $group->where('result', 'won')->count(),
                // 'lost' => $group->where('result', 'lost')->count(),
            ];
        });
        $cashin = $sumc->where('value', '>', '0');
        $cashout = $sumc->where('value', '<', '0');
        return view("exchangeapps.buysalegold", compact('curgold', 'allcur', 'partners', 'users', 'exchangelists', 'mex', 'totalbuy', 'totalsale', 'cashin', 'cashout'));
    }
    public function getexchangegoldlist(Request $request)
    {
        //return $request->all();
        $selcomid = Session('log_into_company_id');
        $d1 = date('Y-m-d', strtotime($request->d1));
        $d2 = date('Y-m-d', strtotime($request->d2));
        $exchangelists = Exchange::whereBetween(DB::raw('DATE(created_at)'), array($d1, $d2))
            ->where('user_id', $request->userid)
            ->where('status', 1)
            ->where('isexchangelist', 0)
            ->where('company_id', $selcomid)
            ->whereHas('currency', function ($query) {
                $query->where('isgold', 1);
            })
            ->orderBy('id')
            ->get();
        return view('exchangeapps.getgoldlist',compact('exchangelists'));
    }
    public function setrate(Request $request)
    {
        //return($request->all());
        $current = Carbon::now();
        $current->timezone('Asia/Phnom_Penh');
        $invtime = date("H:i:s", strtotime($current));
        $count = 0;
        $selcomid = Session('log_into_company_id');
        foreach ($request->curid as $key => $value) {
            $buy       = str_replace(',', '', $request->buy[$key]);
            $sale      = str_replace(',', '', $request->sale[$key]);
            $ratebuy   = str_replace(',', '', $request->ratebuy[$key]);
            $ratesale  = str_replace(',', '', $request->ratesale[$key]);

            $exchangerate = array(
                'currency_id' => $value,
                'user_id' => Auth::id(),
                'dd' => $current,
                'tt' => $invtime,
                'buy' => str_replace(',', '', $request->buy[$key]),
                'sale' => str_replace(',', '', $request->sale[$key]),
                'ratebuy' => str_replace(',', '', $request->ratebuy[$key]),
                'ratesale' => str_replace(',', '', $request->ratesale[$key]),
                'company_id' => $selcomid,
                'created_at' => $current,
                'updated_at' => $current
            );
            ExchangeRate::insert($exchangerate);
            $c = Currency::find($value);
            $c->buy = str_replace(',', '', $request->buy[$key]);
            $c->sale = str_replace(',', '', $request->sale[$key]);
            $c->ratebuy = str_replace(',', '', $request->ratebuy[$key]);
            $c->ratesale = str_replace(',', '', $request->ratesale[$key]);
            $c->save();
            //update buy_sale_gold
            if (config('helper.hasgoldapp') == '1') {
                if ($request->isgold[$key] == 1) {
                    $this->updateBuySaleGoldPL($value, $buy, $sale, $ratebuy, $ratesale);
                }
            }
            ++$count;
        }
        if ($count > 0) {
            //event(new RefreshPageEvent('hi from laravel reverb'));
            broadcast(new RateUpdated('Rate Update Completed'))->toOthers();
            return response()->json(['success' => 'true', 'message' => 'Gold rate have been save successfully.', 'type' => '1']);
        } else {
            return response()->json(['success' => 'true', 'message' => 'no rate set.', 'type' => '0']);
        }
    }
    public function updateBuySaleGoldPL($cur_id, $buy, $sale, $ratebuy, $ratesale)
    {
        DB::beginTransaction();

        try {

            // 1️⃣ Update price_last depending on qty
            // DB::table('buy_sale_gold')->update([
            //     'price_last' => DB::raw("
            //         CASE
            //             WHEN qty > 0 THEN $buy
            //             ELSE $sale
            //         END
            //     "),
            // ]);

            // 2️⃣ Update PL using updated price_last
            // DB::table('buy_sale_gold')->update([
            //     'pl' => DB::raw("qty * rate - qty * price_last")
            // ]);
            // DB::table('buy_sale_gold')->where('is_close',0)->update([
            //     'price_last' => DB::raw("
            //         CASE
            //             WHEN qty > 0 THEN $buy
            //             ELSE $sale
            //         END
            //     "),
            //     'pl' => DB::raw("
            //         qty *
            //         (CASE
            //             WHEN qty > 0 THEN $buy
            //             ELSE $sale
            //         END) - qty * rate
            //     "),
            // ]);


            $plFormula = "
                qty *
                (CASE
                    WHEN qty > 0 THEN $sale
                    ELSE $buy
                END) - qty * rate
            ";

            DB::table('buy_sale_gold')
                ->where('is_close', 0)
                ->where('currency_id', $cur_id)
                ->update([
                    'price_last' => DB::raw("
                        CASE
                            WHEN qty > 0 THEN $sale
                            ELSE $buy
                        END
                    "),
                    'pl' => DB::raw($plFormula),
                    'is_close' => DB::raw("
                        CASE
                            WHEN (($plFormula + deposit) <= 0)
                                OR (created_at <= DATE_SUB(NOW(), INTERVAL 15 DAY))
                            THEN 1
                            ELSE 0
                        END
                    "),
                ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // 3️⃣ Get customers where pl <= 200
        // $customerIds = DB::table('buy_sale_gold')
        //     ->where('pl', '<=', 200)
        //     ->pluck('customer_id')
        //     ->unique()
        //     ->toArray();

        $warningCustomerIds = DB::table('buy_sale_gold')
            ->whereRaw('(pl + deposit) > 0')
            ->whereRaw('(pl + deposit) <= 200')
            ->pluck('customer_id')
            ->unique()
            ->toArray();
        // 2️⃣ Customers: total <= 0
        $emptyCustomerIds = DB::table('buy_sale_gold')
            ->whereRaw('(pl + deposit) <= 0')
            ->pluck('customer_id')
            ->unique()
            ->toArray();

        if (!empty($warningCustomerIds)) {
            $tokens = \App\Models\User::whereIn('id', $warningCustomerIds)
                ->whereNotNull('fcm_token')
                ->pluck('fcm_token')
                ->toArray();

            if (!empty($tokens)) {
                SendGoldAlertJob::dispatch($tokens, 'Your money deposit is less than 200 USD.');
            }
        }
        if (!empty($emptyCustomerIds)) {
            $tokens = \App\Models\User::whereIn('id', $emptyCustomerIds)
                ->whereNotNull('fcm_token')
                ->pluck('fcm_token')
                ->toArray();

            if (!empty($tokens)) {
                SendGoldAlertJob::dispatch($tokens, 'Your money deposit is empty');
            }
        }

        return response()->json(['success' => true]);
    }
}
