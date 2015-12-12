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
        $codes = \App\CodeEntry::orderBy('id','DESC')->get();
        $approved = \App\Approval::orderBy('id','DESC')->get();
        $testrun = \App\TestRun::orderBy('id','DESC')->get();
        //dd($monitor);
        //dd($approved);
        //dd($testrun);
        //foreach($branches as $m) {
        //    echo $m['id']. ", " . $m['last_sha']. ", " .$m['comments'] ."<br>";
        //}
            //dump($monitor->toArray());
        return view('monitor.index')->with('codes',$codes);
    }

    /**
    * Responds to requests to GET /monitor/edit/{$id}
    */
    public function getCodeCreateUpdate($id = null) {

        $code = \App\CodeEntry::find($id);
        $test = \App\TestRun::orderby('id','ASC')->get();
        $approval = \App\Approval::orderby('id','ASC')->get();

        if(is_null($code)) {
            \Session::flash('flash_message','Book not found.');
            return redirect('\code');
        }

        return view('monitor.createupdatecode')->with('code', $code);
    }

    public function postCodeCreateUpdate(Request $request) {
        \Session::flash('flash_message','Your code monitor was updated.');
        return redirect('/monitor/createupdatecode/'.$request->id);

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
