<?php

namespace App\Http\Controllers\Processor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\maker\LoanApplication;
use App\ApplicantData;
use App\KIVRemarks;
use App\User;
use Auth;
use DB;

class ProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::id() == 1) {
            $where = "la_serial_no is not NULL and la_serial_id is not NULL";
        } else {
            $where = "la_serial_no is not NULL and la_serial_id is not NULL 
                      and loan_applications.user_id=" . Auth::id();
        }
        $where .= " and loan_applications.status is not NULL";

        $arr["loan_applications"] = LoanApplication::selectRaw("loan_applications.*,users.username, applicant_data.name, group_concat(applicant_id,'') as applicants")
            ->leftjoin('applicant_data', function ($join) {
                $join->on("applicant_data.id", "=", 'loan_applications.la_applicant_id');
            })
            ->leftjoin('users', function ($join) {
                $join->on("applicant_data.user_id", "=", 'users.id');
            })
            ->whereRaw($where)
            ->orderby("id", "desc")
            ->groupby(DB::raw('concat(la_serial_no,"_",la_serial_id)'))->paginate(5);
        return view("processor.index")->with($arr);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workInProgress()
    {
        if (Auth::id() == 1) {
            $where = "la_serial_no is not NULL and la_serial_id is not NULL";
        } else {

            $sql = "SELECT U2.*
        FROM (
            SELECT
                @r AS _id,
                (SELECT @r := parent_id FROM users WHERE id = _id) AS parent_id,
                @l := @l + 1 AS lvl
            FROM
                (SELECT @r := " . Auth::id() . ", @l := 0) vars,
                users m
            WHERE @r <> 0) U1
        JOIN users U2
        ON U1._id = U2.id
        ORDER BY U1.lvl DESC limit 1";
            $parent_user = DB::connection()->select($sql);


            $sql = "select id from
        (select * from users order by parent_id, id) p_users, (select @pv :=" . $parent_user[0]->id . ")
        initialisation where   bank='" . Auth::user()->bank . "' and 
        find_in_set(parent_id, @pv) and length(@pv := concat(@pv, ',', id))";
            $results = json_decode(json_encode(DB::connection()->select($sql)), true);
            foreach ($results as $row) {
                $private_access[] = $row["id"];
            }

            $sql = "select id from users where bank='" . Auth::user()->bank . "'";
            $results = json_decode(json_encode(DB::connection()->select($sql)), true);
            foreach ($results as $row) {
                $public_access[] = $row["id"];
            }


            $where = "la_serial_no is not NULL and la_serial_id is not NULL 
                  and 
                    (
                       ( loan_applications.accessability='private' and loan_applications.user_id in (" . implode(",", $private_access) . ") )
                        OR
                        ( loan_applications.accessability='public' and loan_applications.user_id in (" . implode(",", $public_access) . ") )
                    )
                  ";
        }

        // $where .= " and loan_applications.status in (\"Open\",\"Processing\",\"kiv\",\"checker\")";

        $arr["loan_applications"] = LoanApplication::selectRaw("loan_applications.*,users.username, applicant_data.name, group_concat(applicant_id,'') as applicants")
            ->leftjoin('applicant_data', function ($join) {
                $join->on("applicant_data.id", "=", 'loan_applications.la_applicant_id');
            })
            ->leftjoin('users', function ($join) {
                $join->on("applicant_data.user_id", "=", 'users.id');
            })
            ->whereRaw($where)
            ->orderby("id", "desc")
            ->groupby(DB::raw('concat(la_serial_no,"_",la_serial_id)'))->paginate(5);

        return view("processor.index")->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if ($id == 0) {
                $inputs = $request->all();
                $la_id = explode("_", $inputs['la_id']);
                $serial_no = $la_id[0];
                $serial_id = $la_id[1];

                $loan_application = LoanApplication::where("la_serial_no", "=", $serial_no)
                    ->where("la_serial_id", "=", $serial_id)
                    ->where("la_applicant_id", "=", $inputs["la_applicant_id"])
                    ->first();
                //print_r($loan_application);
                $loan_application->update($inputs);
                echo "Loan Application Successfully " . $inputs["status"];
            }
        } catch (\Exception $exception) {
            echo "error";
        }
    }


    public function updateKIV(Request $request)
    {
        try {
            $inputs = $request->all();
            $inputs["user_id"] = Auth::id();
            $kiv_remarks = KIVRemarks::create($inputs);
            echo "KIV remarks add successfully for " . $inputs['kiv_cat'];
        } catch (\Exception $e) {
            echo "error";
        }


    }

    public function addKIV(Request $request)
    {
        try {
            $inputs = $request->all();
            $la_id = explode("_", $inputs['la_id']);
            $serial_no = $la_id[0];
            $serial_id = $la_id[1];
            $loan_application = LoanApplication::where("la_serial_no", "=", $serial_no)
                ->where("la_serial_id", "=", $serial_id)
                ->where("applicant_id", "=", $inputs["la_applicant_id"])
                ->where("la_applicant_id", "=", $inputs["la_applicant_id"])
                ->first();
            $loan_application->status = "kiv";
            $loan_application->save();
            echo "Application marked as KIV successfully";
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
