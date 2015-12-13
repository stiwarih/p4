<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitorController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /monitor
    */
    public function getIndex(Request $request) {
        /*
        $monitor = \DB::table('code_entries')->get();
        return view('monitor.index2')->with('branch_names',$monitor);
        */
        /*
        $monitor = \DB::table('code_entries')->get();
        dd($monitor);
        foreach($monitor as $m) {
            echo $m[0]."<br>";
        }
        return 'hi';
        */

        //\Session::put('user_id', \Auth::id());
        $codes = \App\CodeEntry::orderBy('id','DESC')->get();
        $approved = \App\Approval::orderBy('id','DESC')->get();
        $testrun = \App\TestRun::orderBy('id','DESC')->get();
        $users = \App\User::orderBy('id','DESC')->get();
        $user_names = [];
        foreach($users as $user) {
            $user_names[$user->id] = $user->name;
        }

        //dd($monitor);
        //dd($approved);
        //dd($testrun);
        //foreach($branches as $m) {
        //    echo $m['id']. ", " . $m['last_sha']. ", " .$m['comments'] ."<br>";
        //}
            //dump($monitor->toArray());
        return view('monitor.index')->with('codes',$codes)->with('user_names', $user_names);
    }

    public function inputSelector() {
        //http://p4/input?code=1&type=1&id=1

        $code_id = (\Input::get('code'));
        \Session::put('code_id', $code_id);
        $id = \Input::get('id');
        $url = null;
        switch(\Input::get('type'))
        {
            case 1:
                $url = '/monitor/createupdateapproval/';
                $url .= ($id > 0 )? $id : '';
                return redirect($url);
                break;
            case 2:
                $url = '/monitor/createupdatetest/';
                $url .= ($id > 0 )? $id : '';
                return redirect($url);
                break;
        }
        //dump(\Input::all());
        return;

    }

    /**
    * Responds to requests to GET /monitor/edit/{$id}
    */
    public function getCodeCreateUpdate($id = null) {

        $code = \App\CodeEntry::find($id);
        $test = \App\TestRun::orderby('id','ASC')->get();
        $approval = \App\Approval::orderby('id','ASC')->get();
        $users = \App\User::orderBy('id','DESC')->get();
        $user_names = [];
        foreach($users as $user) {
            $user_names[$user->id] = $user->name;
        }
        \Session::put('code_id',$id);
        //dump(\Session::get('code_id'));

        if(is_null($code)) {
            \Session::flash('flash_message','Code Entry not found.');
            return redirect('/monitor');
        }
        //$request->session()->put('code_id',$id);

        //dump($user);
        return view('monitor.createupdatecode')->with('code', $code)->with('user_names', $user_names);
    }

    public function postCodeCreateUpdate(Request $request) {

        $code = \App\CodeEntry::find($request->id);

        $code->branch_name = $request->branch_name;
        $code->last_sha = $request->last_sha;
        $code->comments = $request->comments;
        $code->developer = \Auth::id();
        $code->save();

        \Session::flash('flash_message','Your code monitor was updated.');
        return redirect('/monitor/createupdatecode/'.$request->id);

    }

    public function getTestCreateUpdate($id = null) {
        $test = null;
        if($id == null){
            $test = new \App\TestRun();
        }else {
            $test = \App\TestRun::find($id);
        }
        $users = \App\User::orderBy('id','DESC')->get();
        $user_names = [];
        foreach($users as $user) {
            $user_names[$user->id] = $user->name;
        }
        //$test = \App\TestRun::find($id);
        //$code = \App\CodeEntry::find(\Session::id);
        //echo (\App\User::find($test->tester_id));
        if(is_null($test)) {
            \Session::flash('flash_message','Test not found.');
            return redirect('/monitor');
        }

        return view('monitor.createupdatetest')->with('test', $test)->with('user_names', $user_names);
    }

    public function postTestCreateUpdate(Request $request) {
        $test = null;
        if($request->id == null){
            $test = new \App\TestRun();
        }else {
            $test = \App\TestRun::find($request->id);
        }

        //$test = \App\TestRun::find($request->id);

        $test->passed = $request->passed;
        $test->comments = $request->comments;
        $test->merged_up_to_master = $request->merged;
        $test->tester_id = \Auth::id();
        $test->save();

        $code = \App\CodeEntry::find(\Session::get('code_id'));
        $code->test_run_id = $test->id;
        $code->save();

        \Session::flash('flash_message','Your Test was updated.');
        return redirect('/monitor/createupdatetest/'.$test->id);

    }

    public function getApprovalCreateUpdate($id = null) {

        $approval = null;
        if($id == null){
            $approval = new \App\Approval();
        }else {
            $approval = \App\Approval::find($id);
        }
        $users = \App\User::orderBy('id','DESC')->get();
        $user_names = [];
        foreach($users as $user) {
            $user_names[$user->id] = $user->name;
        }
        if(is_null($approval)) {
            \Session::flash('flash_message','Approval not found.');
            return redirect('/monitor');
        }

        return view('monitor.createupdateapproval')->with('approval', $approval)->with('user_names', $user_names);
    }

    public function postApprovalCreateUpdate(Request $request) {

        $approval = null;
        if($request->id == null){
            $approval = new \App\Approval();
        }else {
            $approval = \App\Approval::find($request->id);
        }

        //$approval = \App\Approval::find($request->id);

        $approval->comments = $request->comments;
        $approval->approver_id = \Auth::id();
        $approval->save();

        $code = \App\CodeEntry::find(\Session::get('code_id'));
        $code->approval_id = $approval->id;
        $code->save();

        \Session::flash('flash_message','Your Approval was updated.');
        return redirect('/monitor/createupdateapproval/'.$approval->id);

    }

    public function getEdit($id = null) {

        $branch = \App\CodeEntry::find($id);
        $authors = \App\Author::orderby('last_name','ASC')->get();


        return view('monitor.edit');

        $book = \App\Book::find($id);

        $authors = \App\Author::orderby('last_name','ASC')->get();

        $authors_for_dropdown = [];
        foreach($authors as $author) {
            $authors_for_dropdown[$author->id] = $author->last_name.', '.$author->first_name;
        }

        dump($authors_for_dropdown);

        if(is_null($book)) {
            \Session::flash('flash_message','Book not found.');
            return redirect('\books');
        }

        return view('books.edit')->with(['book'=>$book, 'authors_for_dropdown' => $authors_for_dropdown]);

    }

    /**
    * Responds to requests to POST /monitor/edit
    */
    public function postEdit(Request $request) {


        \Session::flash('flash_message','Your code monitor was updated.');
        return redirect('/monitor/edit/'.$request->id);

    }

    /**
     * Responds to requests to GET /monitor/create
     */
    public function getCreate() {

        return view('monitor.create');
    }

    /**
     * Responds to requests to POST /monitor/create
     */
    public function postCreate(Request $request) {

        $this->validate(
            $request,
            [
                'branch_name' => 'required|min:5',
                'last_sha' =>    'required|min:6',
            ]
        );

        # Enter Code into the database
        $code = new \App\CodeEntry();
        $code->branch_name = $request->branch_name;
        $code->last_sha = $request->last_sha;
        $code->comments = $request->comments;
        $code->developer = \Auth::id();
        $code->save();

        \Session::flash('flash_message','Your monitor was added!');
        return redirect('/monitor');

    }

    /**
     * Responds to requests to GET /monitor/show/{branch_name}
     */
    public function getShow($title = null) {

        return view('monitor.show')->with('branch_name', $branch_name);

    }

}
